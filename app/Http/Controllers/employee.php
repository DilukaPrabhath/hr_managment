<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class employee extends Controller
{
     public function add_employee(){
    	return view('employee.new_employee');
    }
}
