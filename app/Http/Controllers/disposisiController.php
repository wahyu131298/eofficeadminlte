<?php

namespace App\Http\Controllers;
use App\Models\Log;
use App\Models\Forwardsurat;
use App\Models\Surat;
use App\Models\Forward;
use App\Models\setting;
use App\Models\detailkpd;
use App\Models\detailcc;
use App\Models\User;
use App\Models\memoModel;
use App\Models\Jabatan;
use App\Models\Disposisi;
use App\Models\detailDisposisi;
use Codedge\Fpdf\Fpdf\Fpdf;
use Alert;
use Auth;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use File;

class disposisiController extends Controller
{
    
    protected $fpdf;
    public function __construct()
    {
        $this->fpdf = new Fpdf('P','mm','A5');
       
        
    }
    public function index($id)
    {
        $auth = Auth::user()->jabatan_id;
        $setting = setting::first();
        $query = memoModel::join('tb_jabatan','tb_memo.jabatan_pengirim','=','tb_jabatan.id')
                            ->join('tb_user','tb_jabatan.id','=','tb_user.jabatan_id')
                            ->where('id_memo',$id)
                            ->first();

        $query_user = User::join('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')
                            ->where('tb_user.level','kabag')
                            ->whereNotIn('tb_user.jabatan_id', [$auth,'-','admin'])
                            ->get();

        $no = $query->no_surat;

        $data = ['disposisi' => $query,
                'user' => $query_user,
                'logo' => $setting,
                'nomor' => $no
        ];
        return view('memo2.masuk.disposisi',$data);
    }
    public function insert(Request $request)
    {
        $nama = Auth::user()->Nama;
        $auth = Auth::user()->jabatan_id;
        $kode_disposisi = IdGenerator::generate(['table' => 'tb_disposisi','field' => 'id_disposisi','length' => 6, 'prefix' => date('ym')]);
        $today = date('Y-m-d');
        $jam = date('G:i:s');
        $validate = $request->validate([
            'no_memo' => 'required',
            'sifat' => 'required',
            'perihal' => 'required',
            'pengirim' => 'required',
            'jabatan' => 'required',
            'tgl_memo' => 'required',
            'kepada' => 'required',
            'isi_disposisi' => 'required'
        ]);

        $disposisi_count = Disposisi::where('id_memo_disposisi',$request->input('idmemo'))
                                    ->count();
        if ($disposisi_count > 0) {
            Alert::error('Gagal...', 'Disposisi Gagal Dikirim, Memo Sudah Pernah Di Disposisikan');
            return back();
        }else {
            $query_insert = Disposisi::create([
                'id_disposisi' => $kode_disposisi,
                'id_memo_disposisi' => $request->input('idmemo'),
                'no_surat' => $request->input('no_memo'),
                'sifat' => $request->input('sifat'),
                'perihal' => $request->input('perihal'),
                'pengirim_memo' => $request->input('jabatan_pengirim'),
                'jabatan' => $request->input('jabatan'),
                'tgl_surat' => $request->input('tgl_memo'),
                'tgl_disposisi' => $today,
                'pengirim_disposisi' => $auth,
                'isi' => $request->input('isi_disposisi')
                
            ]);
            $kepada = $request->input('kepada');
            foreach ($kepada as $value) {
                $query = detailDisposisi::create([
                    'id_disposisi_detail' => $kode_disposisi,
                    'no_surat' => $request->input('no_memo'),
                    'kepada_disposisi' => $value
                ]);
            }
            //Membuat Log Baru 
            $namajabatan = Jabatan::where('id',$auth)->first();        
            \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Disposisi Memo '.$request->input('no_memo').'');

    
            //Firebase
            //$firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();  
            $SERVER_API_KEY = 'AAAAS8ba2qA:APA91bGFWrSXZC7vIx8MkI0M-0I5zdxRI2UOKq9FqWNprORt9XQ2cXzgz3B7Gwyd8yeKFNyiy71D5byzVxjrnEGai73_SNRsKzFNlbK72MSBc028qyNSU07jk071h3qnyY3oK9d_U85P';
            
            $namafire = Jabatan::where('id',$auth)->select('jabatan')->get();
            $kepada = "";
            foreach ($namafire as $value) {
                $kepada .= "$value->jabatan";
            }
            $kpd = $kepada;
    
            $kepada = $request->input('kepada');
            foreach ($kepada as $value) {
                $firebaseToken = User::where('jabatan_id',$value)->whereNotNull('device_token')->pluck('device_token')->all();
                $data = [
                    "registration_ids" => $firebaseToken,
                    "notification" => [
                        "title" => 'DISPOSISI MEMO MASUK',
                        "body" => $kpd.' Mengirim Disposisi Memo, Silahkan Dicek', 
                        "icon" => '/image/setting/1652259000879-cropped-logo-300x300.png', 
                    ]
                ];
                $dataString = json_encode($data);
            }
           
        
            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json',
            ];
        
            $ch = curl_init();
          
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                   
            $response = curl_exec($ch);
      
            // dd($response);
          
        }
        if ($query_insert) {
            Alert::success('Berhasil...','Disposisi Berhasil Dikirim');
            return back();
        }else {
            Alert::error('Gagal...', 'Disposisi Gagal Dikirim');
            return back();
        }

        
    }
    public function disposisiMasuk(Request $request)
    {
        $pagination = 5;
        $setting = setting::first();
        if (Auth::user()->level == 'admin') {
            $query_masuk = detaildisposisi::
            join('tb_disposisi','tb_detail_disposisi.id_disposisi_detail','=','tb_disposisi.id_disposisi')
            ->join('tb_memo','tb_disposisi.id_memo_disposisi','=','tb_memo.id_memo')
            ->join('tb_jabatan','tb_disposisi.pengirim_disposisi','=','tb_jabatan.id')
            ->groupBy('tb_disposisi.id_disposisi')
            ->Orderby('tb_disposisi.created_at','desc')
            ->get();
        }else {
            $auth = Auth::user()->jabatan_id;
            $query_masuk = detaildisposisi::
            join('tb_disposisi','tb_detail_disposisi.id_disposisi_detail','=','tb_disposisi.id_disposisi')
            ->join('tb_memo','tb_disposisi.id_memo_disposisi','=','tb_memo.id_memo')
            ->join('tb_jabatan','tb_disposisi.pengirim_disposisi','=','tb_jabatan.id')
            ->where('tb_detail_disposisi.kepada_disposisi','=',$auth)
            ->groupBy('tb_disposisi.id_disposisi')
            ->Orderby('tb_disposisi.created_at','desc')
            ->get();
        }
        
       

        $data = ['dismasuk' => $query_masuk, 'logo' => $setting];
        return view('memo2.disposisi.masuk',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function disposisiKeluar(Request $request)
    {
        $pagination = 5;
        $setting = setting::first();
        $auth = Auth::user()->jabatan_id;
        $query_keluar = detaildisposisi::join('tb_disposisi','tb_detail_disposisi.no_surat','=','tb_disposisi.no_surat')
        ->where('tb_disposisi.pengirim_disposisi','=',$auth)
        ->groupBy('tb_disposisi.no_surat')
        ->Orderby('tb_disposisi.created_at','desc')
        ->get();

        $data = ['disposisi' => $query_keluar, 'logo' => $setting];
        return view('memo2.disposisi.keluar',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function detaildisposisi(Request $request, $id)
    {
        $pagination = 5;
        $setting = setting::first();
        $query_detail = Disposisi::join('tb_detail_disposisi','tb_disposisi.no_surat','=','tb_detail_disposisi.no_surat')
        ->join('tb_jabatan','tb_detail_disposisi.kepada_disposisi','=','tb_jabatan.id')
        ->join('tb_user','tb_jabatan.id','=','tb_user.jabatan_id')
        ->where('tb_disposisi.id_disposisi','=',$id)
        ->get();

        $forward = Forward::join('tb_jabatan','tb_forward_disposisi.tujuan','=','tb_jabatan.id')
        ->join('tb_user','tb_forward_disposisi.tujuan','=','tb_user.jabatan_id')
        ->where('id_disposisi_frw',$id)->get();

        $data = [
            'detaildisposisi' => $query_detail,
            'detailfrw' => $forward,
            'logo' => $setting
        ];
        return view('memo2.disposisi.detail',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }

    public function viewdisposisi($id)
    {
        //update status
        $jabatanid = Auth::user()->jabatan_id;
        $today = date('Y-m-d');

        $quert_update_status = detaildisposisi::join('tb_disposisi','tb_detail_disposisi.id_disposisi_detail','=','tb_disposisi.id_disposisi')
        ->where('tb_detail_disposisi.kepada_disposisi',$jabatanid)
        ->where('tb_disposisi.id_disposisi',$id)
        ->update([
            'tgl_disposisi_dilihat' => $today
        ]);

         //view pdf Disposisi Memo Masuk
        $query_header = setting::all();
        $query_memo = Disposisi::where('id_disposisi',$id)
        ->join('tb_jabatan','tb_disposisi.pengirim_memo','=','tb_jabatan.id')
        ->join('tb_detail_disposisi','tb_disposisi.id_disposisi','=','tb_detail_disposisi.id_disposisi_detail')
        ->get();

        $query_pengirim = Disposisi::where('id_disposisi',$id)
        ->join('tb_jabatan','tb_disposisi.pengirim_disposisi','=','tb_jabatan.id') 
        ->get();

        $query_tujuan = detailDisposisi::where('id_disposisi_detail',$id)
        ->join('tb_jabatan','tb_detail_disposisi.kepada_disposisi','=','tb_jabatan.id')->get();

        //DOM PDF
        $nosurat = "";
        foreach ($query_memo as $value) {
            $no = $value->no_surat;
        }
        $nosurat = $no;
        $data= [
            'setting' => $query_header,
            'disposisi' => $query_memo,
            'pengirim' => $query_pengirim,
            'tujuan' => $query_tujuan,
            'title' => "Disposisi Masuk Memo $nosurat"
        ];
        

        $pdf =  PDF::loadview('memo2.disposisipdf.disposisimasuk',$data);
        $pdf->setPaper('A5');
        return $pdf->stream("Disposisi Masuk Memo $nosurat.pdf");

    }
    public function viewdisposisi2($id)
    {
        //view pdf Disposisi Memo Keluar
        $query_header = setting::all();
        $query_memo = Disposisi::where('id_disposisi',$id)
        ->join('tb_jabatan','tb_disposisi.pengirim_memo','=','tb_jabatan.id')
        ->join('tb_detail_disposisi','tb_disposisi.no_surat','=','tb_detail_disposisi.no_surat')
        ->get();

        $query_pengirim = Disposisi::where('id_disposisi',$id)
        ->join('tb_jabatan','tb_disposisi.pengirim_disposisi','=','tb_jabatan.id') 
        ->get();

        $query_tujuan = detailDisposisi::where('id_disposisi_detail',$id)
        ->join('tb_jabatan','tb_detail_disposisi.kepada_disposisi','=','tb_jabatan.id')->get();

        
        //DOM PDF
        $nosurat = "";
        foreach ($query_memo as $value) {
            $no = $value->no_surat;
        }
        $nosurat = $no;
        $data= [
            'setting' => $query_header,
            'disposisi' => $query_memo,
            'pengirim' => $query_pengirim,
            'tujuan' => $query_tujuan,
            'title' => "Disposisi Memo $nosurat"
        ];
        

        $pdf =  PDF::loadview('memo2.disposisipdf.disposisikeluar',$data);
        $pdf->setPaper('A5');
        return $pdf->stream("Disposisi Memo $nosurat.pdf");
    }
    public function forwarddisposisi($id)
    {
        $auth = Auth::user()->jabatan_id;
        $setting = setting::first();
        $query = Disposisi::where('id_disposisi',$id)->first();

        $query_user = User::join('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')
        ->whereNotIn('tb_user.jabatan_id', [$auth,'-','admin'])->get();

        $data = ['disposisi' => $query,
                'user' => $query_user,
                'logo' => $setting
        ];
        return view('memo2.forward.forward',$data);
    }
    public function inserforward(Request $request)
    {
        //Insert Forward Memo Internal
        $kode_forward = IdGenerator::generate(['table' => 'tb_forward_disposisi','field' => 'id_forward','length' => 6, 'prefix' => date('y')]);
        $auth = Auth::user()->jabatan_id;
        $nama = Auth::user()->Nama;
        $today = date('Y-m-d');
        $jam = date('G:i:s');
        $validated = $request->validate([
            'no_memo' => 'required',
            'tujuan' => 'required',
            'isi' => 'required'
        ]);
       
        $tujuan = $request->input('tujuan');
        foreach ($tujuan as $val) {
            $forward_count = Forward::where('id_disposisi_frw',$request->input('id_disposisi'))
                                    ->where('tujuan',$val)
                                    ->count();
        }
       
        if ($forward_count > 0) {
            Alert::error('Disposisi Gagal Diteruskan', 'Sudah Pernah Melakukan Forward dengan No Surat Yang Sama');
            return back();
        }else {
         //input ke Tabel Forward
        foreach ($tujuan as $value) {
            $query_forward = Forward::create([
                'id_forward' => $kode_forward,
                'no_surat' => $request->input('no_memo'),
                'pengirim' =>  $auth,
                'tujuan' => $value,
                'status' => '1',
                'isi_disposisi' =>  $request->input('isi'),
                'id_disposisi_frw' => $request->input('id_disposisi')
            ]);
           
        }

        //Membuat Log Baru 
        $namajabatan = Jabatan::where('id',$auth)->first();        
        \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Forward Disposisi Memo Instern '.$request->input('no_memo').'');

       //Firebase
        //$firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();  
        $SERVER_API_KEY = 'AAAAS8ba2qA:APA91bGFWrSXZC7vIx8MkI0M-0I5zdxRI2UOKq9FqWNprORt9XQ2cXzgz3B7Gwyd8yeKFNyiy71D5byzVxjrnEGai73_SNRsKzFNlbK72MSBc028qyNSU07jk071h3qnyY3oK9d_U85P';
        
        $namafire = Jabatan::where('id',$auth)->select('jabatan')->get();
        $kepada = "";
        foreach ($namafire as $value) {
            $kepada .= "$value->jabatan";
        }
        $kpd = $kepada;

        $tujuan = $request->input('tujuan');
        foreach ($tujuan as $value) {
            $firebaseToken = User::where('jabatan_id',$value)->whereNotNull('device_token')->pluck('device_token')->all();
            $data = [
                "registration_ids" => $firebaseToken,
                "notification" => [
                    "title" => 'FORWARD DISPOSISI MEMO MASUK',
                    "body" => $kpd.' Mengirim Forward Disposisi Memo, Silahkan Dicek', 
                    "icon" => '/image/setting/1652259000879-cropped-logo-300x300.png', 
                ]
            ];
            $dataString = json_encode($data);
        }
       
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
  
        // dd($response);
        }
        if ($query_forward) {
                Alert::success('Berhasil...','Disposisi Berhasil Diteruskan');
                return back();
            }else {
                Alert::error('Gagal...', 'Disposisi Gagal Diteruskan');
                return back();
            }
    }
    public function forwardkeluar(Request $request)
    {
        $pagination = 5;
        $setting = setting::first();
        $auth = Auth::user()->jabatan_id;
        $query = Forward::where('pengirim',$auth)
                        ->join('tb_disposisi','tb_forward_disposisi.id_disposisi_frw','=','tb_disposisi.id_disposisi')
                        ->join('tb_memo','tb_disposisi.id_memo_disposisi','=','tb_memo.id_memo')
                        ->join('tb_jabatan as jabpengirim','tb_disposisi.pengirim_disposisi','=','jabpengirim.id')
                        
                        ->join('tb_jabatan as jabpenerima','tb_forward_disposisi.tujuan','=','jabpenerima.id')
                        
                        ->select('tb_forward_disposisi.no_surat','tb_memo.id_memo','tb_memo.lampiran','tb_forward_disposisi.id_forward',
                                'tb_forward_disposisi.id_disposisi_frw','jabpengirim.jabatan as jabatan','jabpenerima.jabatan as jabatan_penerima',
                                'tb_forward_disposisi.status','tb_forward_disposisi.tgl_dibaca')
                        ->Orderby('tb_forward_disposisi.created_at','desc')
                        ->get();

        $data =[
            'forwardkeluar' => $query,
            'logo' => $setting
        ];
        return view('memo2.forward.keluar',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function forwardmasuk(Request $request)
    {
        $pagination = 5;
        $setting = setting::first();
        $auth = Auth::user()->jabatan_id;
        if (Auth::user()->level == 'admin') {
            $query = Forward::join('tb_disposisi','tb_forward_disposisi.id_disposisi_frw','=','tb_disposisi.id_disposisi')
            ->join('tb_jabatan','tb_forward_disposisi.pengirim','=','tb_jabatan.id')
            ->join('tb_memo','tb_disposisi.id_memo_disposisi','=','tb_memo.id_memo')
            ->Orderby('tb_forward_disposisi.created_at','desc')
            ->get();
    
        }else {
            $query = Forward::where('tujuan',$auth)
            ->join('tb_disposisi','tb_forward_disposisi.id_disposisi_frw','=','tb_disposisi.id_disposisi')
            ->join('tb_jabatan','tb_forward_disposisi.pengirim','=','tb_jabatan.id')
            ->join('tb_memo','tb_disposisi.id_memo_disposisi','=','tb_memo.id_memo')
            ->Orderby('tb_forward_disposisi.created_at','desc')
            ->get();
    
        }
       
        $data =[
            'forwardmasuk' => $query,
            'logo' => $setting
        ];
        return view('memo2.forward.masuk',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    // public function detailForward(Request $request, $id)
    // {
    //     $pagination = 5;
    //     $setting = setting::first();
    //     $query = detailForward::where('id_forward',$id)
    //     ->join('tb_jabatan','tb_detail_forward.tujuan_disposisi','=','tb_jabatan.id')
    //     ->get();
    //     $data =['detail' => $query,'logo' => $setting];
    //     return view('memo2.forward.detail',$data)->with('i',($request->input('page',1)-1)*$pagination);
    // }
    public function hapusdisposisifrw($id)
    {
        $nama = Auth::user()->Nama;
        $auth = Auth::user()->jabatan_id;
        $today = date('Y-m-d');
        $jam = date('G:i:s');

        $query_first= Forward::where('id_forward',$id)->first();

        $query = Forward::where('id_forward',$id)->delete();

        //Membuat Log Baru 
        $namajabatan = Jabatan::where('id',$auth)->first();        
        \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Hapus Forward Disposisi Memo Intern '.$query_first->no_surat.'');

      
        if ($query) {
            Alert::success('Berhasil...','Forward Disposisi Berhasil Dihapus');
            return back();
        }else {
            Alert::error('Gagal...', 'Forward Disposisi Gagal Dihapus');
            return back();
        }
    }
    public function forward_dis_keluar($id)
    {
      //view pdf Forward Disposisi
      $query_header = setting::all();
      $query_memo = Disposisi::where('id_disposisi',$id)
      ->join('tb_jabatan','tb_disposisi.pengirim_memo','=','tb_jabatan.id')
      ->join('tb_detail_disposisi','tb_disposisi.id_disposisi','=','tb_detail_disposisi.id_disposisi_detail')
      ->get();

      $query_pengirim = Disposisi::where('id_disposisi',$id)
      ->join('tb_jabatan','tb_disposisi.pengirim_disposisi','=','tb_jabatan.id') 
      ->get();

      $query_tujuan = detailDisposisi::where('id_disposisi_detail',$id)
      ->join('tb_jabatan','tb_detail_disposisi.kepada_disposisi','=','tb_jabatan.id')->get();

      $query_forward = Forward::where('id_disposisi_frw',$id)
        ->join('tb_jabatan','tb_forward_disposisi.tujuan','=','tb_jabatan.id')
        ->orderBy('tb_forward_disposisi.created_at','asc')
        ->get();
        
         //DOM PDF
         $nosurat = "";
         foreach ($query_memo as $value) {
             $no = $value->no_surat;
         }
         $nosurat = $no;
         $data = [
            'setting' => $query_header,
            'disposisi' => $query_memo,
            'pengirim' => $query_pengirim,
            'tujuan' => $query_tujuan,
            'forward' => $query_forward,
            'title' => "Forward Disposisi Memo $nosurat"
            ];
         $pdf =  PDF::loadview('memo2.disposisipdf.forward.keluar',$data);
         $pdf->setPaper('A5');
         return $pdf->stream("Forward Disposisi Memo $nosurat.pdf");

    
    }
    public function viewforward($id)
    {
        $auth = Auth::user()->jabatan_id;
        $today = date('Y-m-d');
        // $query_acc = detailForward::
        // join('tb_forward_disposisi','tb_detail_forward.id_forward','=','tb_forward_disposisi.id_forward')
        // ->join('tb_disposisi','tb_forward_disposisi.id_disposisi_frw','=','tb_disposisi.id_disposisi')
        // ->where('tujuan_disposisi',$auth)
        // ->where('tb_disposisi.id_disposisi',$id)
        // ->update([
        //    'status'=> '2',
        //    'tgl_dibaca'=> $today
        //    ]);
        $query_acc = Forward::where('tujuan',$auth)
                            ->where('id_disposisi_frw',$id)
                            ->update([
                            'status'=> '2',
                            'tgl_dibaca'=> $today
                            ]);
       //view pdf Forward Disposisi
      $query_header = setting::all();
      $query_memo = Disposisi::where('id_disposisi',$id)
      ->join('tb_jabatan','tb_disposisi.pengirim_memo','=','tb_jabatan.id')
      ->join('tb_detail_disposisi','tb_disposisi.id_disposisi','=','tb_detail_disposisi.id_disposisi_detail')
      ->get();

      $query_pengirim = Disposisi::where('id_disposisi',$id)
      ->join('tb_jabatan','tb_disposisi.pengirim_disposisi','=','tb_jabatan.id') 
      ->get();

      $query_tujuan = detailDisposisi::where('id_disposisi_detail',$id)
      ->join('tb_jabatan','tb_detail_disposisi.kepada_disposisi','=','tb_jabatan.id')->get();

      $query_forward = Forward::where('id_disposisi_frw',$id)
        ->join('tb_jabatan','tb_forward_disposisi.tujuan','=','tb_jabatan.id')
        ->orderBy('tb_forward_disposisi.created_at','asc')
        ->get();

        //DOM PDF
        $nosurat = "";
        foreach ($query_memo as $value) {
            $no = $value->no_surat;
        }
        $nosurat = $no;
        $data = [
           'setting' => $query_header,
           'disposisi' => $query_memo,
           'pengirim' => $query_pengirim,
           'tujuan' => $query_tujuan,
           'forward' => $query_forward,
           'title' => "Forward Disposisi Memo $nosurat"
           ];

        $pdf =  PDF::loadview('memo2.disposisipdf.forward.masuk',$data);
        $pdf->setPaper('A5');
        return $pdf->stream("Forward Disposisi Memo $nosurat.pdf");
    }
    public function hapusdisposisi($id)
    {
        $nama = Auth::user()->Nama;
        $auth = Auth::user()->jabatan_id;
        $today = date('Y-m-d');
        $jam = date('G:i:s');

        $query_first= Disposisi::where('id_disposisi',$id)->first();

        $query = Disposisi::where('id_disposisi',$id)->delete();

        //Membuat Log Baru 
        $namajabatan = Jabatan::where('id',$auth)->first();        
        \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Hapus Disposisi Memo Intern '.$query_first->no_surat.'');
        
        
      
        if ($query) {
            Alert::success('Berhasil...','Disposisi Berhasil Dihapus');
            return back();
        }else {
            Alert::error('Gagal...', 'Disposisi Gagal Dihapus');
            return back();
        }

    }
    public function disposisiluar()
    {
        $jabatanid = Auth::user()->jabatan_id;
        $setting = setting::first();
        $query_user = User::join('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')
                            ->where('tb_user.level','kabag')
                            ->whereNotIn('tb_user.jabatan_id', [$jabatanid,'admin'])
                            ->get();
       
        $data2 = [
            'user' => $query_user,
            'logo' => $setting
        ];
        return view('disposisi2.createdisposisi',$data2);
    }
    public function insertDisposisi(Request $request)
    {
        $auth = Auth::user()->jabatan_id;
        $nama = Auth::user()->Nama;
        $kode_surat = IdGenerator::generate(['table' => 'tb_surat','field' => 'id_surat','length' => 6, 'prefix' => date('ym')]);
        $today = date('Y-m-d');
        $jam = date('G:i:s');
        $validate = $request->validate([
            'no_surat' => 'required',
            'sifat' => 'required',
            'pengirim' => 'required',
            'alamat' => 'required',
            'perihal' => 'required',
            'kepada' => 'required',
            'lampiran' => 'required',
            'isi_disposisi' => 'required',
            'lampiran.*' => 'mimes:doc,docx,pdf|max:10000'
        ]);

        //Kepada
        $kpd = "";
        $kepada = $request->input('kepada');
        foreach($kepada as $value){
            $kpd .= "$value". ",";
        }
        $kpd = substr($kpd,0,-1);
        //Mencari NO Surat
        $surat_count = Surat::where('no_surat',$request->input('no_surat'))->count();

        if ($surat_count > 0) {
            Alert::error('Gagal...', 'Disposisi Gagal Dikirim, No Surat Sudah Pernah Di Disposisikan');
            return back();
        }else {
            if ($request->hasfile('lampiran')) {
                $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('lampiran')->getClientOriginalName());
                $request->file('lampiran')->move(public_path('file/surat'), $filename);
                $query_insert = Surat::create([
                    'id_surat' => $kode_surat,
                    'no_surat' => $request->input('no_surat'),
                    'sifat' => $request->input('sifat'),
                    'pengirim' => $request->input('pengirim'),
                    'alamat' => $request->input('alamat'),
                    'tgl' => $request->input('tgl'),
                    'perihal' => $request->input('perihal'),
                    'kepada' => $kpd,
                    'file' => $filename,
                    'isi' => $request->input('isi_disposisi'),
                    'pengirim_disposisi' => $auth
                ]);
    
            }
        }
        //Firebase
        //$firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();  
        $SERVER_API_KEY = 'AAAAS8ba2qA:APA91bGFWrSXZC7vIx8MkI0M-0I5zdxRI2UOKq9FqWNprORt9XQ2cXzgz3B7Gwyd8yeKFNyiy71D5byzVxjrnEGai73_SNRsKzFNlbK72MSBc028qyNSU07jk071h3qnyY3oK9d_U85P';
        

        $kepada = $request->input('kepada');
        
            $firebaseToken = User::where('jabatan_id',$kepada)->whereNotNull('device_token')->pluck('device_token')->all();
            $data = [
                "registration_ids" => $firebaseToken,
                "notification" => [
                    "title" => 'DISPOSISI SURAT MASUK',
                    "body" => 'Direktur Disposisi Surat, Silahkan Dicek',
                    "icon" => '/image/setting/1652259000879-cropped-logo-300x300.png',  
                ]
            ];
            $dataString = json_encode($data);

            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json',
            ];
        
            $ch = curl_init();
          
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                   
            $response = curl_exec($ch);
        
        // dd($response);

        //Membuat Log Baru 
        $namajabatan = Jabatan::where('id',$auth)->first();        
        \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Disposisi Surat Dari Luar Rumah Sakit '.$request->input('no_surat').'');

        //Jika Berhasil
        if ($query_insert) {
            Alert::success('Berhasil...','Disposisi Berhasil Dikirim');
            return back();
        }else {
            Alert::error('Gagal...', 'Disposisi Gagal Dikirim');
            return back();
        }

    }
    public function disposisiterkirim(Request $request)
    {
        $setting = setting::first();
        $pagination = 5;
        $auth = Auth::user()->jabatan_id;

        if (Auth::user()->level != 'admin'){
            $query = Surat::where('pengirim_disposisi',$auth)
            ->Orderby('tb_surat.created_at','desc')
            ->get(); 
        }else {
            $query = Surat::get();
        }
       
        $data = ['terkirim' => $query, 'logo' => $setting];
        return view('disposisi2.keluar',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function disposuratmasuk(Request $request)
    {
        $pagination = 5;
        $setting = setting::first();
        $auth = Auth::user()->jabatan_id;
        $query = Surat::join('tb_jabatan','tb_surat.pengirim_disposisi','=','tb_jabatan.id')
                        ->where('kepada',$auth)
                        ->orderBy('tb_surat.created_at','desc')
                        ->get();
        $data = ['masuk' => $query,'logo' => $setting];
       
        return view('disposisi2.masuk',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function lihatdisposisiterkirim($id)
    {
       //view pdf Disposisi Surat Masuk
      $query_header = setting::all();

      $query_surat = Surat::join('tb_jabatan','tb_surat.kepada','=','tb_jabatan.id')
      ->where('id_surat',$id)->get();

      $pengirim_disposisi = Surat::join('tb_jabatan','tb_surat.pengirim_disposisi','=','tb_jabatan.id')
      ->where('id_surat',$id)->get();

      $this->fpdf->AddPage();
      $this->fpdf->SetFont('Times','',12);
     

        foreach($query_header as $header){
          $this->fpdf->image('image/setting/'.$header->logo,10,8,15,15);
          $this->fpdf->Cell(17,1,'',0,0,'L');
          $this->fpdf->SetFont('Times','',12);
          $this->fpdf->Cell(50,2,'RUMAH SAKIT',0,1,'L');
          $this->fpdf->Cell(17,1,'',0,0,'L');
          $this->fpdf->SetFont('Times','B',14);
          $this->fpdf->Cell(150,7,strtoupper($header->nama_instansi),0,1,'L');
          $this->fpdf->Cell(18,1,'',0,0,'L');
          $this->fpdf->Cell(82,0,'',1,1,'C');
          $this->fpdf->SetFont('Times','B',8.5);
          $this->fpdf->Cell(17,0,'',0,0,'L');
          $this->fpdf->Cell(150,4,strtoupper($header->motto),0,1,'L');
          // Memberikan space kebawah agar tidak terlalu rapat
        }  
          //Header
          $this->fpdf->ln(2);
          $this->fpdf->SetFont('Times','B',14);
          $this->fpdf->Cell(135,0,'',1,1,'C');
          $this->fpdf->ln(0.1);
          $this->fpdf->SetFont('Times','B',14);
          $this->fpdf->Cell(135,0,'',1,1,'C');
          $this->fpdf->ln(0.1);
          $this->fpdf->SetFont('Times','',14);
          $this->fpdf->Cell(135,0,'',1,1,'C');
          $this->fpdf->ln(0.7);
          $this->fpdf->SetFont('Times','B',14);
          $this->fpdf->Cell(135,0,'',1,1,'C');
          $this->fpdf->SetFont('Times','B',12);
          $this->fpdf->ln(4);
          $this->fpdf->Cell(135,6,'LEMBAR DISPOSISI',0,1,'C');
          $this->fpdf->Cell(47,1,'',0,0,'L');
          $this->fpdf->Cell(41,0,'',1,1,'C'); 

          foreach ($query_surat as $data) {
              $this->fpdf->ln(5);
              $this->fpdf->SetFont('Times','',12);
              $this->fpdf->Cell(47,6,'Tanggal Penerimaan Surat',0,0,'L');
              $this->fpdf->Cell(2,6,':',0,0,'L');
              $this->fpdf->Cell(10,6,date("d-F-Y", strtotime($data->tgl)),0,0,'L');
      
              $this->fpdf->ln(5);
              $this->fpdf->SetFont('Times','',12);
              $this->fpdf->Cell(47,6,'Nama Pengirim',0,0,'L');
              $this->fpdf->Cell(2,6,':',0,0,'L');
              $this->fpdf->Cell(10,6,$data->pengirim,0,0,'L');
      
              $this->fpdf->ln(5);
              $this->fpdf->SetFont('Times','',12);
              $this->fpdf->Cell(47,6,'Alamat Pengirim',0,0,'L');
              $this->fpdf->Cell(2,6,':',0,0,'L');
              $this->fpdf->Cell(10,6,$data->alamat,0,0,'L');
      
              $this->fpdf->ln(5);
              $this->fpdf->SetFont('Times','',12);
              $this->fpdf->Cell(47,6,'Perihal',0,0,'L');
              $this->fpdf->Cell(2,6,':',0,0,'L');
              $this->fpdf->Cell(10,6,$data->perihal,0,0,'L');
            }
              $this->fpdf->ln(10);
              $this->fpdf->SetFont('Times','B',12);
              $this->fpdf->Cell(135,6,'PERJALANAN MEMO',0,1,'L');
              
          
              $this->fpdf->ln(2);
              $this->fpdf->SetFont('Times','',12);
              $this->fpdf->Cell(47,6,'Disposisi Dari',0,0,'L');
              $this->fpdf->Cell(2,6,':',0,0,'L');
              foreach ($pengirim_disposisi as $data1) {
                $this->fpdf->Cell(10,6,$data1->jabatan,0,0,'L');
              }
             
              $this->fpdf->ln(5);
              $this->fpdf->SetFont('Times','',12);
              $this->fpdf->Cell(47,6,'Disampaikan Kepada',0,0,'L');
              $this->fpdf->Cell(2,6,':',0,0,'L');
              foreach ($query_surat as $data2) {
              $this->fpdf->Cell(10,6,$data2->jabatan,0,0,'L');
              
   
              $this->fpdf->ln(5);
              $this->fpdf->SetFont('Times','',12);
              $this->fpdf->Cell(47,6,'Isi Disposisi',0,0,'L');
              $this->fpdf->Cell(2,6,':',0,0,'L');
              $this->fpdf->Cell(10,6,$data2->isi,0,0,'L');
              }
              

          $this->fpdf->Output();
          exit();
    }
    public function viewdisposisisurat($id)
    {
        //Update Status
        $auth = Auth::user()->jabatan_id;
        $today = date('Y-m-d');
        $update = Surat::
        where('id_surat',$id)
        ->where('kepada',$auth)
        ->update([
            'tgl_dilihat' => $today
        ]);

        //view pdf Disposisi Surat Masuk
      $query_header = setting::all();

      $query_surat = Surat::join('tb_jabatan','tb_surat.kepada','=','tb_jabatan.id')
      ->where('id_surat',$id)->get();

      $pengirim_disposisi = Surat::join('tb_jabatan','tb_surat.pengirim_disposisi','=','tb_jabatan.id')
      ->where('id_surat',$id)->get();
     
      //DOM PDF
      $nosurat = "";
      foreach ($query_surat as $value) {
         $no = $value->no_surat;
      }
      $nosurat = $no;

      $data = [
          'setting' => $query_header,
          'surat' => $query_surat,
          'pengirim' =>$pengirim_disposisi,
          'title' => "Disposisi $nosurat"
      ];

      $pdf =  PDF::loadview('disposisi2.pdfview',$data);
      $pdf->setPaper('A5');
      return $pdf->stream("Disposisi Surat $nosurat.pdf");

    }
    public function Forwardsurat($id)
    {
        $auth = Auth::user()->jabatan_id;
        $setting = setting::first();
        $query = Surat::where('id_surat',$id)->first();

        $query_user = User::join('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')
        ->whereNotIn('tb_user.jabatan_id', [$auth,'admin'])->get();

        $data = [
                'surat' => $query,
                'user' => $query_user,
                'logo' => $setting
            ];
        return view('disposisi2.forward',$data);
    }
    public function insertforward(Request $request)
    {
        $auth = Auth::user()->jabatan_id;
        $nama = Auth::user()->Nama;
        $kode_forward = IdGenerator::generate(['table' => 'tb_forward_surat','field' => 'id_forward','length' => 6, 'prefix' => date('y')]);
        $today = date('Y-m-d');
        $jam = date('G:i:s');
        $validasi = $request->validate([
            'idsurat' => 'required',
            'no_surat' => 'required',
            'tujuan' => 'required',
            'isi' => 'required',
            
        ]);
        //Kepada
        $tujuan = "";
        $kepada = $request->input('tujuan');
        foreach($kepada as $value){
            $tujuan .= "$value". ",";
        }
        $tujuan = substr($tujuan,0,-1);

        $pen ="";
        foreach ($kepada as $val) {
           $pen .= $val;
        }
        $penerima = $pen;
        $tujuan_count = Forwardsurat::where('penerima',$penerima)->where('no_surat',$request->input('no_surat'))->count();
        if ($tujuan_count > 0) {
            Alert::error('Surat Gagal Diteruskan','Sudah Pernah Melakukan Forward dengan NOMOR surat yang sama');
            return back();
        }else {
        $query = Forwardsurat::create([
            'id_forward' => $kode_forward,
            'id_surat' => $request->input('idsurat'),
            'no_surat' => $request->input('no_surat'),
            'pengirim' => $auth,
            'penerima' => $tujuan,
            'isi_forward' => $request->input('isi'),
            'tgl_dibaca' => null,
            'tgl_forward' => $today
        ]);

         //Membuat Log Baru 
         $namajabatan = Jabatan::where('id',$auth)->first();        
         \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Forward Disposisi Surat Dari Luar Rumah Sakit '.$request->input('no_surat').'');

        //Firebase
        //$firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();  
        $SERVER_API_KEY = 'AAAAS8ba2qA:APA91bGFWrSXZC7vIx8MkI0M-0I5zdxRI2UOKq9FqWNprORt9XQ2cXzgz3B7Gwyd8yeKFNyiy71D5byzVxjrnEGai73_SNRsKzFNlbK72MSBc028qyNSU07jk071h3qnyY3oK9d_U85P';
        
        $namafire = Jabatan::where('id',$auth)->select('jabatan')->get();
        $pengirim = "";
        foreach ($namafire as $value) {
            $pengirim .= "$value->jabatan";
        }
        $peng = $pengirim;

        $kepada = $request->input('tujuan');
        $namatujuan = Jabatan::where('id',$kepada)->select('jabatan')->get();
        $tujuan = "";
        foreach ($namatujuan as $value) {
            $tujuan .= "$value->jabatan";
        }
        $tuj = $tujuan;

        foreach ($kepada as $value) {
            $firebaseToken = User::where('jabatan_id',$value)->whereNotNull('device_token')->pluck('device_token')->all();
            $data = [
                "registration_ids" => $firebaseToken,
                "notification" => [
                    "title" => 'FORWARD DISPOSISI SURAT MASUK',
                    "body" => $peng.' Mengirim Forward Disposisi Surat Kepada '.$tuj,
                    "icon" => '/image/setting/1652259000879-cropped-logo-300x300.png',
                    // "click_action" => "http://lokasi-web-yang-di-tuju-bila-di-klik" 
                ]
            ];
            $dataString = json_encode($data);
        }
       
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
    }
        // dd($response);
         //Jika Berhasil
         if ($query) {
            Alert::success('Berhasil...','Surat Berhasil Diteruskan');
            return back();
        }else {
            Alert::error('Gagal...', 'Surat Gagal Diteruskan');
            return back();
        }
        
    }
    public function forwardsuratkeluar(Request $request)
    {
        $setting = setting::first();
        $pagination = 5;
        $auth = Auth::user()->jabatan_id;
        $query = Forwardsurat::join('tb_jabatan','tb_forward_surat.penerima','=','tb_jabatan.id')
        ->join('tb_surat','tb_forward_surat.id_surat','=','tb_surat.id_surat')
        ->where('tb_forward_surat.pengirim',$auth)->orderBy('tb_forward_surat.created_at','desc')->get();

        $data = ['keluar' => $query ,'logo' => $setting];
        return view('disposisi2.forward.keluar',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function forwardsuratmasuk(Request $request)
    {
        $pagination = 5;
        $setting = setting::first();
        $auth = Auth::user()->jabatan_id;
        $query = Forwardsurat::join('tb_jabatan','tb_forward_surat.pengirim','=','tb_jabatan.id')
        ->join('tb_surat','tb_forward_surat.id_surat','=','tb_surat.id_surat')
        ->where('tb_forward_surat.penerima',$auth)->orderBy('tb_forward_surat.created_at','desc')->get();

        $data = ['masuk' => $query , 'logo' => $setting];
        return view('disposisi2.forward.masuk',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function detailterkirim($id, Request $request)
    {
       $setting = setting::first();
        $disampaikan = Surat::where('id_surat',$id)
        ->join('tb_jabatan','tb_surat.kepada','=','tb_jabatan.id')
        ->join('tb_user','tb_surat.kepada','=','tb_user.jabatan_id')
        ->get();

        $forward = Forwardsurat::where('id_surat',$id)
        ->join('tb_jabatan','tb_forward_surat.penerima','=','tb_jabatan.id')
        ->join('tb_user','tb_forward_surat.penerima','=','tb_user.jabatan_id')
        ->get();
        
        $data =  ['disampaikan' => $disampaikan,'forward'=>$forward, 'logo' => $setting];
        return view('disposisi2.detailterkirim',$data);
    }

    public function disforwardkeluar($id)
    {
    //view pdf Disposisi Forward Surat
      $query_header = setting::first();

      $query_surat = Surat::join('tb_jabatan','tb_surat.kepada','=','tb_jabatan.id')
      ->where('id_surat',$id)->get();

      $pengirim_disposisi = Surat::join('tb_jabatan','tb_surat.pengirim_disposisi','=','tb_jabatan.id')
      ->where('id_surat',$id)->get();

      $forward = Forwardsurat::join('tb_jabatan','tb_forward_surat.penerima','=','tb_jabatan.id')
      ->where('id_surat',$id)->get();

      $nosurat = "";
      foreach ($query_surat as $value) {
         $no = $value->no_surat;
      }
      $nosurat = $no;

      $data = [
          'setting' => $query_header,
          'surat' => $query_surat,
          'pengirim' =>$pengirim_disposisi,
          'forward' => $forward,
          'title' => "Disposisi $nosurat"
      ];

      $pdf =  PDF::loadview('disposisi2.forward.pdf.pdfkeluar',$data);
      $pdf->setPaper('A5');
      return $pdf->stream("Disposisi-Forward-Keluar-$nosurat.pdf");

    
    }
    
    public function viewdissurat($id)
    {
        //Udate tgl Baca / Status
        $auth = Auth::user()->jabatan_id;
        $today = date('Y-m-d');
        $update = Forwardsurat::
        where('id_surat',$id)
        ->where('penerima',$auth)
        ->update([
            'tgl_dibaca' => $today
        ]);
        //view pdf Disposisi
      $query_header = setting::first();

      $query_surat = Surat::join('tb_jabatan','tb_surat.kepada','=','tb_jabatan.id')
      ->where('id_surat',$id)->get();

      $pengirim_disposisi = Surat::join('tb_jabatan','tb_surat.pengirim_disposisi','=','tb_jabatan.id')
      ->where('id_surat',$id)->get();

      $forward = Forwardsurat::join('tb_jabatan','tb_forward_surat.penerima','=','tb_jabatan.id')
      ->where('id_surat',$id)->get();

      $nosurat = "";
      foreach ($query_surat as $value) {
         $no = $value->no_surat;
      }
      $nosurat = $no;

      $data = [
          'setting' => $query_header,
          'surat' => $query_surat,
          'pengirim' =>$pengirim_disposisi,
          'forward' => $forward,
          'title' => "Disposisi $nosurat"
      ];

      $pdf =  PDF::loadview('disposisi2.forward.pdf.pdfmasuk',$data);
      $pdf->setPaper('A5');
      return $pdf->stream("Disposisi-Forward-Masuk-$nosurat.pdf");
    
    }
    public function hapusdisposisiterkirim($id)
    {
        $nama = Auth::user()->Nama;
        $auth = Auth::user()->jabatan_id;
        // $today = date('Y-m-d');
        // $jam = date('G:i:s');

        $query_first= Surat::where('id_surat',$id)->first();
        File::delete(public_path('file/surat/').$query_first->file);
        $delete = Surat::where('id_surat',$id)->delete();

        //Membuat Log Baru 
        $namajabatan = Jabatan::where('id',$auth)->first();        
        \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Hapus Disposisi Surat Dari Luar Rumah Sakit '.$query_first->no_surat.'');

        if ($delete) {
                Alert::success('Berhasil...','Disposisi Berhasil Dihapus');
                return back();
            }else {
                Alert::error('Gagal...', 'Disposisi Gagal Dihapus');
                return back();
            }
    }
    public function forwardterkirim(Request $request)
    {
        $pagination = 5;
        $setting = setting::first();
        $query = Forwardsurat::join('tb_jabatan as jabpenerima','tb_forward_surat.penerima','=','jabpenerima.id')
        ->join('tb_jabatan as jabpengirim','tb_forward_surat.pengirim','=','jabpengirim.id')
        ->join('tb_surat','tb_forward_surat.id_surat','=','tb_surat.id_surat')

        ->select('tb_forward_surat.no_surat','jabpengirim.jabatan as pengirim','jabpenerima.jabatan as penerima'
        ,'tb_forward_surat.tgl_forward','tb_forward_surat.tgl_dibaca','tb_surat.file','tb_forward_surat.id_surat','tb_forward_surat.id_forward')
        ->get();

        $data = ['terkirim' => $query, 'logo' => $setting];
        return view('disposisi2.forward.terkirim',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }

    public function hapusforwardterkirim($id)
    {
        $nama = Auth::user()->Nama;
        $auth = Auth::user()->jabatan_id;

        $query_nosurat= Forwardsurat::where('id_forward',$id)->first();
        $queryhapus = Forwardsurat::where('id_forward',$id)->delete();

        //Membuat Log Baru 
        $namajabatan = Jabatan::where('id',$auth)->first();        
        \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Hapus Forward Disposisi Surat Dari Luar Rumah Sakit '.$query_nosurat->no_surat.'');

        if ($queryhapus) {
            Alert::success('Berhasil...','Forward Disposisi Berhasil Dihapus');
            return back();
        }else {
            Alert::error('Gagal...', 'Forward Disposisi Gagal Dihapus');
            return back();
        }
    }
    public function hapus_frw_memo_terkirim($id)
    {
        $nama = Auth::user()->Nama;
        $auth = Auth::user()->jabatan_id;
        $query_nosurat= Forward::where('id_forward',$id)->first();
        $queryhapus = Forward::where('id_forward',$id)->delete();

        //Membuat Log Baru 
        $namajabatan = Jabatan::where('id',$auth)->first();        
        \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Hapus Forward Disposisi Memo Intern '.$query_nosurat->no_surat.'');
      
        if ($queryhapus) {
            Alert::success('Berhasil...','Forward Disposisi Berhasil Dihapus');
            return back();
        }else {
            Alert::error('Gagal...', 'Forward Disposisi Gagal Dihapus');
            return back();
        }
    }
}  