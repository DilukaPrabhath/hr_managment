<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\department;
use App\MasterModel;
use App\note;
use App\note_comment;
use App\users;
use App\salary_advance;
use App\salary_advance_comment;
use App\SalaryhisroryModel;
use Carbon\Carbon;

class AdminSalaryContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
    	$data = salary_advance::salary4();
    	return view('admin.salary_advance.index',compact('data'));
    }

     public function create(){
    	// $data = salary_advance::all();
    	return view('admin.salary_advance.create');
    }

    public function view($id){
    	$data = salary_advance::salary3($id);
    	return view('admin.salary_advance.view',compact('data'));
    }
    public function edit($id){
        $data = salary_advance::salary3($id);
        return view('admin.salary_advance.edit',compact('data'));
    }

    public function commentview($id){

      // $data2 = SalaryhisroryModel::all();
    	$data  = salary_advance_comment::salarycomment($id);
    	return view('admin.salary_advance.comments',compact('data'));
    }
    
    public function relese($id){
//return $id;
        $data = salary_advance::find($id);
        $data->approve2              = 3;
            
        $data->save();
        return redirect()->back();
    }

}
