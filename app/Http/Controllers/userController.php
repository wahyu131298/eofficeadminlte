<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Alert;
use Auth;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use Illuminate\Support\Str;
use File;
class userController extends Controller
{
    public function index(Request $request)
    { 
        $setting = setting::first();
        $pagination = 5;
        $query_user = User::join('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')->get();
        $data_user = ['getuser' => $query_user, 'logo'=> $setting];
        return view('user2.listuser',$data_user)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function tambah_user()
    {
        $setting = setting::first();
        $query = Jabatan::get();
        $data = ['getjabatan' => $query,'logo'=> $setting];
        return view('user2.createuser',$data);
    }
    
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'nip' =>'required|unique:tb_user',
            'nama' =>'required',
            'username' =>'required|unique:tb_user',
            'psw' =>'required',
            'jk' => 'required',
            'level' => 'required',
            'jabatan' => 'required'
        ]);
        
        $user_count = User::where('jabatan_id',$request->input('jabatan'))->count();
        if ($user_count > 0) {
            Alert::error('Gagal...', 'Jabatan Sudah Terisi');
            return back();
        }else {
            if ($validated) {
                $d = new DNS2D();
                $d->setStorPath(public_path('/image/qrcode'));
                //Data yang dimasujkkan QR-Code
                $dataqr = $request->input('nip').$request->input('nama');
                //Generate
                $qrcode = $d->getBarcodePNGPath($dataqr, 'QRCODE');
                $file_name= Str::slug($dataqr);
    
                $hash_password = Hash::make($request->input('psw'));
                $query = User::create(
                    [
                    'nip' => $request->input('nip'),
                    'nama' => $request->input('nama'),
                    'username' => $request->input('username'),
                    'password' =>  $hash_password,
                    'jk' => $request->input('jk'),
                    'level' => $request->input('level'),
                    'jabatan_id' => $request->input('jabatan'),
                    'qr_code' =>  $file_name."qrcode.png"
                ]);
            }
        
            if ($query) {
                Alert::success('Berhasil...','Data Berhasil Disimpan');
                return back();
            }else {
                Alert::error('Gagal...', 'Data Gagal Disimpan');
                return back();
            }
        }
    }
    public function delete($id)
    {
        //Hapus File QRcode
        $query_first= User::where('id_user',$id)->first();
        File::delete(public_path('image/qrcode/').$query_first->qr_code);
        //Hapus Data User
        $data = User::where('id_user', $id)->delete();
      
        if ($data) {
            alert()->success('Berhasil...','Data Berhasil diHapus');
            //Alert::success('Berhasil...', 'Data Berhasil diHapus');
            return back();
        }else {
            Alert::error('Gagal...', 'Data Gagal diHapus');
            return back();
        }
        
      
    }
    public function edituser($id)
    {
        $query = Jabatan::get();
        $setting = setting::first();
        $query2 = User::where('id_user',$id)->first();
        $data = ['getjabatan' => $query,'user' => $query2,'logo' => $setting];
       
        return view('user2.edituser',$data);
    }
    public function updateuser(Request $request)
    {
        $validated = $request->validate([
            'nip' =>'required',
            'nama' =>'required',
            'username' =>'required',
            'jk' => 'required',
            'level' => 'required',
            'jabatan' => 'required'
        ]);
        $user_count = User::where('jabatan_id',$request->input('jabatan'))
                            ->where('id_user','!=',$request->input('cid'))
                            ->count();
        if ($user_count > 0) {
            Alert::error('Gagal...', 'Data Gagal Diupdate, Jabatan Sudah Terisi');
            return back();
        }else {
            $gantipassword = $request->input('psw');
            //Update Tanpa Password
            if ($gantipassword == null) {
               //Hapus QRcode
                $query_first= User::where('id_user',$request->input('cid'))->first();
                File::delete(public_path('image/qrcode/').$query_first->qr_code);

                //buat QR-code
                $d = new DNS2D();
                $d->setStorPath(public_path('/image/qrcode'));
                //Data yang dimasujkkan QR-Code
                $dataqr = $request->input('nip').$request->input('nama');
                //Generate
                $qrcode = $d->getBarcodePNGPath($dataqr, 'QRCODE');
                $file_name= Str::slug($dataqr);

                $update = User::where('id_user', $request->input('cid'))->update([
                'nip' => $request->input('nip'),
                'nama' => $request->input('nama'),
                'username' => $request->input('username'),
                'jk' => $request->input('jk'),
                'level' => $request->input('level'),
                'jabatan_id' => $request->input('jabatan'),
                'qr_code' =>  $file_name."qrcode.png"
                ]);
            }else {
                //Update dengan Password

                //Hapus QRcode
                $query_first= User::where('id_user',$request->input('cid'))->first();
                File::delete(public_path('image/qrcode/').$query_first->qr_code);

                //buat QR-code
                $d = new DNS2D();
                $d->setStorPath(public_path('/image/qrcode'));
                //Data yang dimasujkkan QR-Code
                $dataqr = $request->input('nip').$request->input('nama');
                //Generate
                $qrcode = $d->getBarcodePNGPath($dataqr, 'QRCODE');
                $file_name= Str::slug($dataqr);

                $hash_password_update = Hash::make($request->input('psw'));
                $update = User::where('id_user', $request->input('cid'))->update([
                'nip' => $request->input('nip'),
                'nama' => $request->input('nama'),
                'username' => $request->input('username'),
                'password' =>  $hash_password_update,
                'jk' => $request->input('jk'),
                'level' => $request->input('level'),
                'jabatan_id' => $request->input('jabatan'),
                'qr_code' =>  $file_name."qrcode.png"
                ]);
            }
            
        }
        if ($update) {
            Alert::success('Berhasil...','Data Berhasil Diupdate');
            return back();
        }else {
            Alert::error('Gagal...', 'Data Gagal Diupdate');
            return back();
        }
        
        
    }
    public function profile()
    {
        $setting = setting::first();
        $query = Auth::user()->nip;
        $query_user = User::leftJoin('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')->where('nip', $query)->get();
        $data_user = ['getprofile' => $query_user,'logo'=> $setting];
        return view('user2.profile',$data_user);
    }
    public function gantipsw()
    {
        $setting = setting::first();
        $data = ['logo'=> $setting];
        return view('user2.gantipsw',$data);
    }
    public function updatepsw(Request $request)
    {
        $validated = $request->validate([
            'password1' =>'required',
            'password2' =>'required',
        ]);
        $pass1 = $request->input('password1');
        $pass2 = $request->input('password2');
        if ($pass2 == $pass1) {
            $hash_password_update = Hash::make($pass2);
            $update = User::where('id_user', $request->input('cid'))->update([
            'password' =>  $hash_password_update
           ]);

            Alert::success('Berhasil...','Password Berhasil Diubah');
            auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }else {
            Alert::error('Gagal...', 'Ketik Password Ulang');
            return back();
        }
    }
}