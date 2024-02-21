<?php
//  Belajar Controller 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function index(){
        return view("halaman/index");
    }
    function tentang(){
        return view("halaman/tentang");
    }
    function kontak(){
        
        $data = [
            'judul' => 'ini adalah halaman kontak',
            'kontak' => [
                'email' => 'akmalirsyad137@gmail.com',
                'discord' => 'gogoro']
            ];
        return view("halaman/kontak")->with($data);
    }
}
