<?php

namespace App\Http\Controllers;
use App\Models\setting;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Alert;
use App;
class jabatanController extends Controller
{

    public function list(Request $request)
    {
        $setting = setting::first();
        // $kode_jabatan = IdGenerator::generate(['table' => 'tb_jabatan', 'length' => 10, 'prefix' =>'JAB-']);
        $pagination = 5;
        $query = Jabatan::get();
        // $data = ['jabatan' => $query,'kode' => $kode_jabatan,'logo'=> $setting];
        $data = [
                    'jabatan' => $query,
                    'logo'=> $setting
                ];
        return view('jabatan2.listjabatan',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function view_modal_jabatan($id)
    {
        $jabatanid = Jabatan::where('id',$id)->first();
        $data = ['jabatan' => $jabatanid];
        return view('jabatan2.modal-edit-jabatan',$data);
    }
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required',
            'jabatan' => 'required',          
        ]);

        $count_kode_jabatan = Jabatan::where('id',$request->input('kode'))->count();
        if ($count_kode_jabatan > 0) {
            $returnData = array(
                'status' => 'error',
                'message' => 'An error occurred!'
            );
            return Response::json($returnData, 500);
        }else {
            $query = Jabatan::create([
                'id' => $request->input('kode'),
                'jabatan' => $request->input('jabatan')
            ]);  
        }       
    }
    public function update(Request $request)
    {
        $quert_update = Jabatan::where('id', $request->input('kode'))
                                ->update([
                                'id' => $request->input('kode'),
                                'jabatan' => $request->input('jabatan')
        ]);

    }
    public function delete($id)
    {  
        try {
            $data = Jabatan::where('id', $id)->delete();
            Alert::success('Berhasil...','Data Jabatan Berhasil Dihapus');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Gagal...', 'Data Jabatan Gagal Dihapus,Masih ada User yang menggunakan Jabatan');
            return back();
        }
        
    }
}