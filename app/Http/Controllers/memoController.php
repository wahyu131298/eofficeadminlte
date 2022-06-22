<?php

namespace App\Http\Controllers;
use App\Models\Notulen;
use App\Models\Log;
use App\Models\detailkpd;
use App\Models\detailcc;
use App\Models\User;
use App\Models\memoModel;
use App\Models\Jabatan;
use App\Models\setting;
use App\Models\Disposisi;
use App\Models\Forward;
use Illuminate\Http\Request;
use Alert;
use Auth;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use PDF;
use File;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

class memoController extends Controller
{
    
    public function index(Request $request)
    {
        $setting = setting::first();
        $jabatanid = Auth::user()->jabatan_id;
        $query = Auth::user()->nip;
        // $data1 = ['nip' => $query];
        $query_jabatan = Jabatan::whereNotIn('id',[$jabatanid,'admin'])->get();
        $query_mengetahui = User::join('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')->where('tb_user.level','kabag')->whereNotIn('tb_user.nip', [$query])->get();
        $query_user = User::join('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')->whereNotIn('tb_jabatan.id', [$jabatanid,'-','admin'])->get();
        // $query_bagian = User::leftJoin('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')->where('nip', $query)->get();
       
        $data2 = [
            'mengetahui' => $query_mengetahui,
            // 'bagian' => $query_bagian
            'jabatan' =>  $query_jabatan,
            'user' => $query_user,
            'logo' => $setting
        ];
        return view('memo2.creatememo',$data2);
    }

    public function insert(Request $request)
    {
        $kode_memo = IdGenerator::generate(['table' => 'tb_memo','field' => 'id_memo','length' => 6, 'prefix' => date('y')]);
        $jabatanid = Auth::user()->jabatan_id;
        $nama = Auth::user()->Nama;
        $today = date('Y-m-d');
        $jam = date('G:i:s');
        $validated = $request->validate([
            'no_memo' => 'required',
            'sifat' => 'required',
            'perihal' => 'required',
            'kepada' => 'required',
            'cc' => 'required',
            'penerima' => 'required',
            'mengetahui' => 'required',
            'isimemo' => 'required',
            'lampiran.*' => 'mimes:doc,docx,pdf|max:10000'
        ]);
        if ($request->hasfile('lampiran')) {
                $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('lampiran')->getClientOriginalName());
                $request->file('lampiran')->move(public_path('file/lampiran'), $filename);
                //Kepada
                $kpd = "";
                $kepada = $request->input('kepada');
                foreach($kepada as $value){
                    $kpd .= "$value". ",";
                }
                $kpd = substr($kpd,0,-1);
                //Tembusan
                $tembusan="";
                $cc = $request->input('cc');
                foreach ($cc as $value) {
                    $tembusan .= "$value". ",";
                }
                $tembusan = substr($tembusan,0,-1);

                //insert to database
                
                    $query = memoModel::create([
                        'id_memo' => $kode_memo,
                        'jns_memo' => $request->input('kategori'),
                        'no_surat' => $request->input('no_memo'),
                        'sifat' => $request->input('sifat'),
                        'perihal' => $request->input('perihal'),
                        'jabatan_pengirim' => $jabatanid,
                        'tgl_surat' => $today,
                        'isi' => $request->input('isimemo'),
                        'mengetahui' =>  $request->input('mengetahui'),
                        'kepada' => $kpd,
                        'cc' => $tembusan,
                        'status' => '1',
                        'lampiran' => $filename
                    ]);
                
                $penerima = $request->input('penerima');
                foreach ($penerima as $value) {
                $query = detailkpd::create([
                    'no_surat' => $request->input('no_memo'),
                    'jabatan_id' => $value,
                    'status' => 'belum',
                    'id_detail_memo' => $kode_memo
                    
                ]);
                }
        }else {
            //Kepada
            $kpd = "";
            $kepada = $request->input('kepada');
            foreach($kepada as $value){
                $kpd .= "$value". ",";
            }
            $kpd = substr($kpd,0,-1);
            //Tembusan
            $tembusan="";
            $cc = $request->input('cc');
            foreach ($cc as $value) {
                $tembusan .= "$value". ",";
            }
            $tembusan = substr($tembusan,0,-1);
            //insert to database
            $query = memoModel::create([
                'id_memo' => $kode_memo,
                'jns_memo' => $request->input('kategori'),
                'no_surat' => $request->input('no_memo'),
                'sifat' => $request->input('sifat'),
                'perihal' => $request->input('perihal'),
                'jabatan_pengirim' => $jabatanid,
                'tgl_surat' => $today,
                'isi' => $request->input('isimemo'),
                'mengetahui' => $request->input('mengetahui'),
                'kepada' => $kpd,
                'cc' => $tembusan,
                'status' => '1',
            ]);
            $penerima = $request->input('penerima');
            foreach ($penerima as $value) {
            $query = detailkpd::create([
                'no_surat' => $request->input('no_memo'),
                'jabatan_id' => $value, 
                'status' => 'belum',
                'id_detail_memo' => $kode_memo
                
            ]);
            }
        }

        //Membuat Log Baru 
        $namajabatan = Jabatan::where('id',$jabatanid)->first();        
        \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Membuat Memo Intern '.$request->input('no_memo').'');
       
        //Berjalan Jika Mengetahui = '-'
        if ($request->input('mengetahui') == '-') {
            //Firebase
            //$firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();  
            $SERVER_API_KEY = 'AAAAS8ba2qA:APA91bGFWrSXZC7vIx8MkI0M-0I5zdxRI2UOKq9FqWNprORt9XQ2cXzgz3B7Gwyd8yeKFNyiy71D5byzVxjrnEGai73_SNRsKzFNlbK72MSBc028qyNSU07jk071h3qnyY3oK9d_U85P';
            
            $namafire = Jabatan::where('id',$jabatanid)->select('jabatan')->get();
            $kepada = "";
            foreach ($namafire as $value) {
                $kepada .= "$value->jabatan";
            }
            $kpd = $kepada;

            $penerima = $request->input('penerima');
            foreach ($penerima as $value) {
                $firebaseToken = User::where('jabatan_id',$value)->whereNotNull('device_token')->pluck('device_token')->all();
                $data = [
                    "registration_ids" => $firebaseToken,
                    "notification" => [
                        "title" => 'MEMO MASUK',
                        "body" => $kpd.' Mengirim Memo Intern',  
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
            }
       
        }else {
            //Jika Mengetahui Tidak sama dengan -
            //Firebase
            //$firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();  
            $SERVER_API_KEY = 'AAAAS8ba2qA:APA91bGFWrSXZC7vIx8MkI0M-0I5zdxRI2UOKq9FqWNprORt9XQ2cXzgz3B7Gwyd8yeKFNyiy71D5byzVxjrnEGai73_SNRsKzFNlbK72MSBc028qyNSU07jk071h3qnyY3oK9d_U85P';
            
            $namafire = Jabatan::where('id',$jabatanid)->select('jabatan')->get();
            $kepada = "";
            foreach ($namafire as $value) {
                $kepada .= "$value->jabatan";
            }
            $kpd = $kepada;

            $penerima = $request->input('mengetahui');
         
                $firebaseToken = User::where('jabatan_id',$penerima)->whereNotNull('device_token')->pluck('device_token')->all();
                $data = [
                    "registration_ids" => $firebaseToken,
                    "notification" => [
                        "title" => 'MEMO MEMBUTUHKAN KONFIRMASI',
                        "body" => $kpd.' Mengirim Memo Intern', 
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
            
        }
        

        //jika insert berhasil / dijalankan 
            if ($query) {
            Alert::success('Berhasil...','Memo Berhasil Dikirim');
            return back();
            }else {
                Alert::error('Gagal...', 'Memo Gagal Dikirim');
                return back();
            }    
        
            
    }
    public function memoMasuk(Request $request)
    {
        //'tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id'
        $pagination = 5;
        $setting = setting::first();
        if (Auth::user()->level == 'admin') {
            $query_memomasuk = memoModel::join('tb_detail_kepada','tb_memo.id_memo','=','tb_detail_kepada.id_detail_memo')
            ->join('tb_jabatan','tb_memo.jabatan_pengirim','=','tb_jabatan.id')
            ->leftjoin('tb_notulen','tb_memo.id_memo','=','tb_notulen.id_memo_not')
            ->groupBy('tb_memo.id_memo')
            ->Orderby('tb_memo.created_at','desc')
            ->get();
        }else {
            $query = Auth::user()->jabatan_id;
            $query_memomasuk = memoModel::
            join('tb_detail_kepada','tb_memo.id_memo','=','tb_detail_kepada.id_detail_memo')
            ->join('tb_jabatan','tb_memo.jabatan_pengirim','=','tb_jabatan.id')
            ->leftjoin('tb_notulen','tb_memo.id_memo','=','tb_notulen.id_memo_not')
            ->where('tb_detail_kepada.jabatan_id',$query)
            ->where('tb_memo.status_konfirm','=','2')
            //or
            ->orwhere('tb_detail_kepada.jabatan_id',$query)
            ->where('tb_memo.mengetahui','=','-')
            ->where('tb_memo.status_konfirm','=','1')
            
            ->Orderby('tb_memo.created_at','desc')
            ->get();
        }
        
        $data = ['memomasuk' => $query_memomasuk, 'logo' => $setting];
        return view('memo2.masuk.view',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function memoKeluar(Request $request)
    {
        $pagination = 5;
        $setting = setting::first();
        if (Auth::user()->level == 'admin') {
            $query_keluar = memoModel::join('tb_jabatan','tb_memo.mengetahui','=','tb_jabatan.id')
            ->leftjoin('tb_notulen','tb_memo.id_memo','=','tb_notulen.id_memo_not')
            ->Orderby('tb_memo.created_at','desc')
            ->get();
        }else {
            $query = Auth::user()->jabatan_id;
            $query_keluar = memoModel::join('tb_jabatan','tb_memo.mengetahui','=','tb_jabatan.id')
            ->leftjoin('tb_notulen','tb_memo.id_memo','=','tb_notulen.id_memo_not')
            ->leftjoin('tb_disposisi','tb_memo.id_memo','=','tb_disposisi.id_memo_disposisi')
            ->where('tb_memo.jabatan_pengirim','=',$query)
            ->select('tb_memo.id_memo','tb_memo.no_surat','tb_memo.perihal','tb_memo.tgl_surat','tb_memo.lampiran','tb_memo.status_konfirm',
                     'tb_memo.tgl_konfirm','tb_memo.mengetahui','tb_memo.catatan','tb_disposisi.id_disposisi',
                     'tb_jabatan.jabatan','tb_notulen.id_memo_not','tb_memo.jns_memo','tb_notulen.isi')
            ->Orderby('tb_memo.created_at','desc')
            ->get();
        }
       
        $data = ['memokeluar' => $query_keluar, 'logo' => $setting];
        return view('memo2.keluar.view',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function detailMemo(Request $request, $id)
    {
        $pagination = 5;
        $setting = setting::first();
        $query_detail1 = detailkpd::join('tb_memo','tb_detail_kepada.id_detail_memo','=','tb_memo.id_memo')
        ->join('tb_jabatan','tb_detail_kepada.jabatan_id','=','tb_jabatan.id')
        ->join('tb_user','tb_jabatan.id','=','tb_user.jabatan_id')
        ->where('tb_memo.id_memo',$id)
        ->get();

        // $query_detail2 = Disposisi::join('tb_detail_disposisi','tb_disposisi.no_surat','=','tb_detail_disposisi.no_surat')
        // ->join('tb_jabatan','tb_detail_disposisi.kepada_disposisi','=','tb_jabatan.id')
        // ->join('tb_user','tb_jabatan.id','=','tb_user.jabatan_id')
        // ->where('tb_disposisi.id_memo_disposisi','=',$id)
        // ->get();

        // $id_dis = "";
        // foreach ($query_detail2 as $val) {
        //     $id_dis .= $val->id_disposisi;
        // }
        // $id_disposisi = $id_dis;

        // $forward = Forward::join('tb_detail_forward','tb_forward_disposisi.id_forward','=','tb_detail_forward.id_forward')
        // ->join('tb_jabatan','tb_detail_forward.tujuan_disposisi','=','tb_jabatan.id')
        // ->where('id_disposisi_frw',$id_disposisi)->get();

        $data = [
            'detailMemo' => $query_detail1,
            'logo' => $setting,
            // 'detaildisposisi' => $query_detail2,
            // 'detailfrw' => $forward
        ];
        return view('memo2.keluar.detail',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
   
    public function konfirm(Request $request)
    {
        $pagination = 5;
        $query = Auth::user()->jabatan_id;
        $setting = setting::first();
        $query_konfirm = memoModel::join('tb_detail_kepada','tb_memo.id_memo','=','tb_detail_kepada.id_detail_memo')
        ->join('tb_jabatan','tb_memo.jabatan_pengirim','=','tb_jabatan.id')
        ->where('tb_memo.mengetahui',$query)
        ->where('tb_memo.status_konfirm','=','1')
        ->groupBy('tb_memo.id_memo')
        ->Orderby('tb_memo.created_at','desc')
        ->get();

       

        $data = ['konfirm' => $query_konfirm, 'logo' => $setting];
        return view('memo2.korfirmasi',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function accMemo($id)
    {
        $nama = Auth::user()->Nama;
        $query_jabatan = Auth::user()->jabatan_id;
        $today = date('Y-m-d');
        $jam = date('G:i:s');
        $memo = memoModel::find($id);
       
        $SERVER_API_KEY = 'AAAAS8ba2qA:APA91bGFWrSXZC7vIx8MkI0M-0I5zdxRI2UOKq9FqWNprORt9XQ2cXzgz3B7Gwyd8yeKFNyiy71D5byzVxjrnEGai73_SNRsKzFNlbK72MSBc028qyNSU07jk071h3qnyY3oK9d_U85P';
       
        $namafire = Jabatan::where('id',$memo->jabatan_pengirim)->select('jabatan')->get();
        $tujuan = "";
        foreach ($namafire as $value) {
            $tujuan .= "$value->jabatan";
        }
        $to = $tujuan;

        $detailkpd = detailkpd::where('id_detail_memo',$id)->select('jabatan_id')->get();
        foreach ($detailkpd as $value) {
            $firebaseToken = User::where('jabatan_id',$value->jabatan_id)->whereNotNull('device_token')->pluck('device_token')->all();
            $data = [
                "registration_ids" => $firebaseToken,
                "notification" => [
                    "title" => 'MEMO MASUK',
                    "body" => $to.' Mengirim Memo Intern, Silahkan Dicek',
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
        }

        $query_acc = memoModel::where('id_memo',$id)
            ->update([
           'tgl_konfirm'=> $today,
           'status_konfirm'=> '2'
        ]);
        
        
        //Membuat Log Baru 
        $namajabatan = Jabatan::where('id',$query_jabatan)->first();        
        \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Menyetujuai Memo '. $memo->no_surat.'');
        
        if ($query_acc) {
            Alert::success('Disetuji...','Memo Telah disetujui');
            return back();
        }
    }
    public function tolak(Request $request)
    {
        $nama = Auth::user()->Nama;
        $query_jabatan = Auth::user()->jabatan_id;
        $memo = memoModel::find($request->input('nomemo'));
        $catatan = $request->input('catatan');
        $today = date('Y-m-d');
        $jam = date('G:i:s');
        $query_acc = memoModel::where('id_memo',$request->input('nomemo'))
            ->update([
           'tgl_konfirm'=> $today,
           'status_konfirm'=> '3',
           'catatan' => $catatan
           ]);
        
        //Membuat Log Baru 
        $namajabatan = Jabatan::where('id',$query_jabatan)->first();        
        \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Menolak Memo '. $memo->no_surat.'');
        
       
        if ($query_acc) {
            Alert::success('Ditolak...','Memo Telah Ditolak');
            return back();
        }
    }
    
    public function viewmemo_pdf($id)
    {
        //update status lihat
        $jabatanid = Auth::user()->jabatan_id;
        $today = date('Y-m-d');

        $quert_update_status = detailkpd::join('tb_memo','tb_detail_kepada.id_detail_memo','=','tb_memo.id_memo')
        ->where('jabatan_id',$jabatanid)
        ->where('tb_memo.id_memo',$id)
        ->update([
            'status' => 'sudah',
            'tgl_lihat' => $today
        ]);

        //vie memo pdf
       $query_view = memoModel::join('tb_detail_kepada','tb_memo.id_memo','=','tb_detail_kepada.id_detail_memo')
       ->join('tb_jabatan','tb_detail_kepada.jabatan_id','=','tb_jabatan.id')
       ->join('tb_user','tb_memo.jabatan_pengirim','=','tb_user.jabatan_id')
       ->where('tb_memo.id_memo','=',$id)
       ->groupBy('tb_memo.id_memo')
       ->get();

       $query_view3 =  Jabatan::join('tb_memo','tb_jabatan.id','=','tb_memo.jabatan_pengirim')
       ->where('tb_memo.id_memo',$id)
       ->get();

       $judul ="";
        foreach ($query_view as $value) {
            $jud = $value->perihal;
        }
        $judul = $jud;

        $pdf = PDF::loadview('memo2.memopdf.memomasuk_pdf',['konfir1'=>$query_view,'konfir2'=>$query_view3,'title' => "Memo $judul"]);
        return $pdf->stream("Memo-$judul.pdf");
        //return view('memo.memopdf.memomasuk_pdf',['konfir1'=>$query_view,'konfir2'=>$query_view3,'title' => "Memo $judul", 'qrcode' => $d]);
        
    }
    public function cetakmemokeluar($id)
    {
       //vie memo pdf
       $query_view = memoModel::join('tb_detail_kepada','tb_memo.id_memo','=','tb_detail_kepada.id_detail_memo')
       ->join('tb_jabatan','tb_detail_kepada.jabatan_id','=','tb_jabatan.id')
       ->join('tb_user','tb_memo.jabatan_pengirim','=','tb_user.jabatan_id')
       ->where('tb_memo.id_memo','=',$id)
       ->groupBy('tb_memo.id_memo')
       ->get();

       $query_view3 =  Jabatan::join('tb_memo','tb_jabatan.id','=','tb_memo.jabatan_pengirim')
       ->where('tb_memo.id_memo',$id)
       ->get();

       $judul ="";
        foreach ($query_view as $value) {
            $jud = $value->perihal;
        }
        $judul = $jud;

        $pdf = PDF::loadview('memo2.memopdf.memokeluar_pdf',['konfir1'=>$query_view,'konfir2'=>$query_view3,'title' => "Memo $judul"]);
        return $pdf->stream("Memo-$judul.pdf");

    }
    public function cetakpdfdom($id)
    {
       //vie memo pdf
       $query_view = memoModel::join('tb_detail_kepada','tb_memo.id_memo','=','tb_detail_kepada.id_detail_memo')
       ->join('tb_jabatan','tb_detail_kepada.jabatan_id','=','tb_jabatan.id')
       ->join('tb_user','tb_memo.jabatan_pengirim','=','tb_user.jabatan_id')
       ->where('tb_memo.id_memo','=',$id)
       ->groupBy('tb_memo.id_memo')
       ->get();

       
       $query_view3 =  Jabatan::join('tb_memo','tb_jabatan.id','=','tb_memo.jabatan_pengirim')
       ->where('tb_memo.id_memo',$id)
       ->get();
      
        $judul ="";
        foreach ($query_view as $value) {
            $jud = $value->perihal;
        }
        $judul = $jud;

        $pdf = PDF::loadview('memo2.memopdf.konfirmasi_pdf',['konfir1'=>$query_view,'konfir2'=>$query_view3,'title' => "Memo $judul"]);
        return $pdf->stream("Memo-$judul.pdf");
    }
    public function hapus($id)
    {
        $nama = Auth::user()->Nama;
        $jabatanid = Auth::user()->jabatan_id;
        $today = date('Y-m-d');
        $jam = date('G:i:s');

        $query_first= memoModel::where('id_memo',$id)->first();
        File::delete(public_path('file/lampiran/').$query_first->lampiran);
        $query = memoModel::where('id_memo',$id)->delete();
        
         //Membuat Log Baru 
         $namajabatan = Jabatan::where('id',$jabatanid)->first();        
         \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Hapus Memo '. $query_first->no_surat.'');

      

        if ($query) {
            Alert::success('Berhasil...','Memo Berhasil Dihapus');
            return back();
        }else {
            Alert::error('Gagal...', 'Memo Gagal Dihapus');
            return back();  
        }
    }

    public function createnotulen(Request $request)
    {
        $nama = Auth::user()->Nama;
        $jabatanid = Auth::user()->jabatan_id;
        $memo = $request->input('nomemo');
        $today = date('Y-m-d');
        $jam = date('G:i:s');


        $insert_notulen = Notulen::create([
            'id_memo_not' => $request->input('idmemo'),
            'isi' => $request->input('catatan')

        ]);

        //Membuat Log Baru 
        $namajabatan = Jabatan::where('id',$jabatanid)->first();        
        \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Membuat Notulen Memo '. $memo.'');
    }
    
    
    public function updatenotulen(Request $request)
    {
        $nama = Auth::user()->Nama;
        $jabatanid = Auth::user()->jabatan_id;
        $memo = $request->input('nomemo2');
        $today = date('Y-m-d');
        $jam = date('G:i:s');


        $update_notulen = Notulen::where('id_memo_not',$request->input('idmemo2'))
        ->update([
            'isi' => $request->input('catatan2')
        ]);

        //Membuat Log Baru 
        $namajabatan = Jabatan::where('id',$jabatanid)->first();        
        \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Edit Notulen Memo '. $memo.'');

    }
    public function hapusnotulen(Request $request, $id)
    {

        try {
           //Hapus NOtulen
        $del = Notulen::where('id_memo_not',$id)->delete();
        

        $nama = Auth::user()->Nama;
        $jabatanid = Auth::user()->jabatan_id;
        $memo = memoModel::where('id_memo',$id)->first();
        $resultmemo = $memo->no_surat;
        $today = date('Y-m-d');
        $jam = date('G:i:s');
        //Membuat Log Baru 
        $namajabatan = Jabatan::where('id',$jabatanid)->first();        
        \LogActivity::addToLog(''.$nama. ' ('.$namajabatan->jabatan.') '.' Hapus Notulen Memo '. $resultmemo.'');

        Alert::success('Berhasil...','Data Notulen Berhasil Dihapus');
        return back(); 
        } catch (\Throwable $th) {
            Alert::error('Gagal...', 'Data Notulen Gagal Dihapus');
            return back();
        }
        
    }
    public function trackingmemo(Request $request, $id)
    {
        $pagination = 5;
        $setting = setting::first();
        $query_detail = Disposisi::join('tb_detail_disposisi','tb_disposisi.id_disposisi','=','tb_detail_disposisi.id_disposisi_detail')
        ->join('tb_jabatan as penerimadis','tb_detail_disposisi.kepada_disposisi','=','penerimadis.id')
        ->join('tb_jabatan as pengirimdis','tb_disposisi.pengirim_disposisi','=','pengirimdis.id')
        ->join('tb_user','penerimadis.id','=','tb_user.jabatan_id')
        ->select('tb_disposisi.no_surat','tb_user.Nama','penerimadis.jabatan as penerima','pengirimdis.jabatan as pengirim','tb_detail_disposisi.tgl_disposisi_dilihat')
        ->where('tb_disposisi.id_disposisi','=',$id)
        ->get();

        $forward = Forward::join('tb_jabatan','tb_forward_disposisi.tujuan','=','tb_jabatan.id')
        ->join('tb_user','tb_forward_disposisi.tujuan','=','tb_user.jabatan_id')
        ->where('id_disposisi_frw',$id)->get();

        $nomor ="";
        foreach ($query_detail as $value) {
            $nomor .= $value->no_surat;
        }
        $no = $nomor;

        $data = [
            'nomor' => $no,
            'detaildisposisi' => $query_detail,
            'detailfrw' => $forward,
            'logo' => $setting
        ];
        return view('memo2.keluar.tindakan',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    
    
}
