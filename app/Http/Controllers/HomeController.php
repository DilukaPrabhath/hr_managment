<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->usertype_id =='2'){
            return view('index');
        }elseif( Auth::user()->usertype_id =='1')  {
            return view('indexsuper');
        }elseif( Auth::user()->usertype_id =='3')  {
            return view('indexhod');
        }elseif( Auth::user()->usertype_id =='4')  {
            // return view('indexuser');
            return view('indexuser');
        }else{
            return view('login');  
        }

    }
}
