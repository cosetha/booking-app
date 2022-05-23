<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    public function index()
    {
        if (request()->user()->level =='User') {         
            $jumlah = array('kategori'=> Kategori::count(),'lokasi'=> Lokasi::count(),'berita'=> Berita::count(),'user'=> User::count());
            return view('admin.homeAdmin',['jumlah'=>$jumlah]);
        } else {
            return redirect('/');
        } 
    }
}
