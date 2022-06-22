<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disposisi;
use App\Models\detailDisposisi;
use App\Models\detailkpd;
use App\Models\detailcc;
use App\Models\User;
use App\Models\memoModel;
use App\Models\Jabatan;
use App\Models\Surat;
use App\Models\Forwardsurat;
use App\Models\Forward;
use App\Models\setting;
use Alert;
use Auth;
use Cache;
use Carbon\Carbon;


class Dashboard extends Controller
{
    public function index()
    {
        $setting = setting::first();
        $auth = Auth::user()->jabatan_id;
        
        if (auth::user()->level == 'admin') {
            //User Online
            $users = User::whereNotNull('last_seen')->whereNotIn('jabatan_id',[$auth])->orderBy('last_seen', 'DESC')->get();
            
            //Memo Masuk Admin
            $query_memomasuk = memoModel::count();
            $query_keluar = memoModel::count();
            //Disposisi Masuk
            $disposisi_masuk = detaildisposisi::count();
            //Disposisi Keluar
            $disposisi_keluar = Disposisi::count();
            //Forward Dispoisis memo masuk
            $forwardmemomasuk = Forward::count();
            //Forward Dispoisis memo keluar
            $forwardmemokeluar = Forward::count();
            
            //Konfirmasi Memo
            $query_konfirm = memoModel::where('tb_memo.status_konfirm',1)->count();
            //Pengguna
            $query_user = User::count();
            //Jabatan
            $query_jabatan = Jabatan::count();

            //Disposisi Surat
            $query_surat = Surat::count();
            //Disposisi Surat Masuk
            $query_surat_masuk = Surat::count();
            //Forward Terkirim
            $query_forward_terkirim = Forwardsurat::count();
            //Forward Terkirim
            $query_forward_masuk = Forwardsurat::count();
        }else {
            //User Online
            $users = User::whereNotNull('last_seen')->whereNotIn('jabatan_id',[$auth])->orderBy('last_seen', 'DESC')->get();
            //Memo Masuk Selain Admin
            $query_memomasuk = memoModel::join('tb_detail_kepada','tb_memo.id_memo','=','tb_detail_kepada.id_detail_memo')
            ->join('tb_jabatan','tb_memo.jabatan_pengirim','=','tb_jabatan.id')
            ->where('tb_detail_kepada.jabatan_id',$auth)
            ->where('tb_memo.status_konfirm','=','2')
            //or
            ->orwhere('tb_detail_kepada.jabatan_id',$auth)
            ->where('tb_memo.mengetahui','=','-')
            ->where('tb_memo.status_konfirm','=','1')
            ->count();
            //Memo Keluar
            $query_keluar = memoModel::where('tb_memo.jabatan_pengirim','=',$auth)
            ->count();
            //Disposisi Masuk
            $disposisi_masuk = detaildisposisi::where('kepada_disposisi',$auth)
            ->count();
            //Disposisi Keluar
           
            $disposisi_keluar = Disposisi::where('pengirim_disposisi',$auth)->count();
            //Forward Dispoisis memo masuk
            $forwardmemomasuk = Forward::where('tujuan',$auth)->count();

             //Forward Dispoisis memo keluar
             $forwardmemokeluar = Forward::where('pengirim',$auth)->count();
            //Konfirmasi Memo
            $query_konfirm = memoModel::where('tb_memo.mengetahui',$auth)
            ->where('tb_memo.status_konfirm',1)
            ->count();
             //Pengguna
             $query_user = User::count();
             //Jabatan
             $query_jabatan = Jabatan::count();
             //Disposisi Surat
             $query_surat = Surat::where('pengirim_disposisi',$auth)
             ->count(); 
             //Disposisi Surat Masuk
             $query_surat_masuk = Surat::join('tb_jabatan','tb_surat.pengirim_disposisi','=','tb_jabatan.id')
            ->where('kepada',$auth)->count();
            //Forward Terkirim
            $query_forward_terkirim = Forwardsurat::join('tb_jabatan','tb_forward_surat.penerima','=','tb_jabatan.id')
            ->join('tb_surat','tb_forward_surat.id_surat','=','tb_surat.id_surat')
            ->where('tb_forward_surat.pengirim',$auth)->count();
            //Forward Surat Masuk
            $query_forward_masuk = Forwardsurat::join('tb_jabatan','tb_forward_surat.pengirim','=','tb_jabatan.id')
            ->join('tb_surat','tb_forward_surat.id_surat','=','tb_surat.id_surat')
            ->where('tb_forward_surat.penerima',$auth)->count();
        }

       
        $data =[
            'memomasuk'=>$query_memomasuk,
            'memokeluar'=>$query_keluar,
            'konfirm'=>$query_konfirm,
            'diskeluar' => $disposisi_keluar,
            'dismasuk' => $disposisi_masuk,
            'user' =>  $query_user,
            'jabatan' => $query_jabatan,
            'surat' => $query_surat,
            'suratmasuk' => $query_surat_masuk,
            'forwardterkirim' => $query_forward_terkirim,
            'forwardmasuk' => $query_forward_masuk,
            'forwardmemomasuk' => $forwardmemomasuk,
            'forwardmemokeluar' => $forwardmemokeluar,
            'online' => $users,
            'logo' => $setting
        ];
        return view('dashboard3',$data);
        return view('partial.dashboard.navbar', $data);
        return view('partial.dashboard.sidebar',$data);
        return view('layouts.layout',$data);
    }

    public function savetoken(Request $request)
    {
        User::where('id_user', Auth::user()->id_user)->update(['device_token' => $request->token ]);
        return response()->json(['token saved successfully.']);
    }
    
}
