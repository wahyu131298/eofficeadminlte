<?php

namespace App\Http\Controllers;
use App\Models\Log;
use App\Models\detailkpd;
use App\Models\detailcc;
use App\Models\User;
use App\Models\memoModel;
use App\Models\Jabatan;
use App\Models\setting;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Alert;
use Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class logController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 5;
        $setting = setting::first();
       
        $query_log = LogActivity::orderBy('created_at','desc')->get();
        
        $notif_navbar = memoModel::
        join('tb_detail_kepada','tb_memo.id_memo','=','tb_detail_kepada.id_detail_memo')
        ->join('tb_jabatan','tb_memo.jabatan_pengirim','=','tb_jabatan.id')
        
        ->where('tb_memo.status_konfirm','2')
        ->where('tb_detail_kepada.status','belum')
        ->get();
        
        $count_notif_navbar = memoModel::
        join('tb_detail_kepada','tb_memo.id_memo','=','tb_detail_kepada.id_detail_memo')
        ->join('tb_jabatan','tb_memo.jabatan_pengirim','=','tb_jabatan.id')
        
        ->where('tb_memo.status_konfirm','2')
        ->where('tb_detail_kepada.status','belum')
        ->count();

        $data = ['log'=> $query_log,'logo'=> $setting, 'notif' => $notif_navbar,
        'countnotif' => $count_notif_navbar,
        ];
        return view('logaktivity',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
}
