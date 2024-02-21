<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    //
    function index(){
        return view("sesi/index");
    }
    function login(Request $request){

    Session::flash('email', $request->email);
        //  validasi
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib Di isi',
            'password.required'=>'Password Wajib Di isi',
        ]);

        // Variable Menyimpan data email dan password
        $infologin =[
            'email'=>$request->email,
            'password'=>$request->password

        ];

        //Authentication
        if(Auth::attempt($infologin)){
            // Kalau otentikasi Sukses
            return redirect('siswa')->with('success', Auth::user()->name . ' Berhasil Login');
        } else {
            // Kalau Gagal
            return redirect('sesi')->withErrors('Username dan Password yang DiMasukan Tidak Valid');
        }
    }
        function logout(){
            Auth::logout();
            return redirect('sesi')->with('success','Berhasil Logout');
    }

    function register()
    {
        return view('sesi/register');
    }

    function create(Request $request)
    {
         Session::flash('name', $request->name);
         Session::flash('email', $request->email);
        //  validasi
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ],[
            'name.required'=>'nama wajib di isi',
            'email.required'=>'Email Wajib Di isi',
            'email.email'=>'Silakan Masukan Email yang valid',
            'email.unique'=>'Email Sudah Pernah Di gunakan',
            'password.required'=>'Password Wajib Di isi',
            'password.min'=>'minimum password yang diizikan adalah 6 karakter'
        ]);
        // Memasukan Data Ke Database
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];
        // databasenya
        User::create($data);
        // Variable Menyimpan data email dan password
        $infologin =[
            'email'=>$request->email,
            'password'=>$request->password

        ];
        //Authentication
        if(Auth::attempt($infologin)){
            // Kalau otentikasi Sukses
            return redirect('siswa')->with('success', Auth::user()->name. ' Berhasil Login');
        } else {
            // Kalau Gagal
            return redirect('sesi')->withErrors('Username dan Password yang DiMasukan Tidak Valid');
        }
    }
}
