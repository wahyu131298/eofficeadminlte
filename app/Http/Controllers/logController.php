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
        // $query = Log::join('tb_jabatan','tb_log.id_jabatan','=','tb_jabatan.id')
        //                 ->orderBy('tb_log.jam','desc')
        //                 ->get();
        $query_log = LogActivity::orderBy('created_at','desc')->get();

        $data = ['log'=> $query_log,'logo'=> $setting];
        return view('logaktivity',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
}
