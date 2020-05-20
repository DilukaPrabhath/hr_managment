<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class department extends Controller
{
    public function index(){
    	return view('department.index');
    }
    
     public function add_department(){
    	return view('department.add');
    }

}
