<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    public function index()
    {
        if (request()->user()->level =='Admin') {  
            $jumlah = array('booking'=> DB::table('bookings')->count() ,'user'=> DB::table('users')->count(),'service'=> DB::table('services')->count(),'car'=> DB::table('cars')->count());                 
            return view('admin.home',['jumlah'=> $jumlah]);
        } else {
            return redirect('/');
        } 
    }
}
