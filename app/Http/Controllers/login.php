<?php

namespace App\Http\Controllers;
use App\Models\setting;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Auth;
use Alert;

class login extends Controller
{
    public function index()
    {
        $query = setting::first();
        $data = ['login' => $query];
        return view('login.login',$data);
        
    }
    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data2 = User::where('username',$request->input('username'))->first();
      
        if ($data2) {
                $cekpas = Hash::check($request->input('password'),$data2->password);
                if ($cekpas) {
                    Auth::attempt($credentials);
                    $request->session()->regenerate();
                    \LogActivity::addToLog('Berhasil Login, Username : '.$request->input('username').'Password : '.$request->input('password').'');
                    return redirect('/');
                }else {
                    \LogActivity::addToLog('Gagal Login, Username : '.$request->input('username').'Password : '.$request->input('password').'');
                    Alert::error('Gagal...', 'Password Salah');
                    return back();
                }
        }else {
            \LogActivity::addToLog('Gagal Login, Username : '.$request->input('username').'Password : '.$request->input('password').'');
            Alert::error('Gagal...', 'Username Tidak Terdaftar');
            return back();
        }

    }
    public function logout(Request $request)
    {
        auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}