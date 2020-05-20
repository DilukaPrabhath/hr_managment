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

class SuperadminSalaryContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
    	$data = salary_advance::salary5();
    	return view('superadmin.salary.index',compact('data'));
    }

    public function view($id){
    	$data = salary_advance::salary3($id);
    	return view('superadmin.salary.view',compact('data'));
    }

    public function comments($id){
    	$data = salary_advance_comment::salarycomment($id);
    	return view('superadmin.salary.comment',compact('data'));
    }

    public function update(Request $request,$id){
         
     // return $request;
        $this->validate(request(), [
                'salary_comments'      => 'required',
                'status'               => 'required',
               
            ]);
            $salary_add = salary_advance::find($id);
            $x = $id;
            if ($request->status == 6) {
            $salary_add->approve2         = $request->status;
            $salary_add->approve3         = $request->status;
            }else{
            $salary_add->approve3         = $request->status;
            }
            //$salary_add->approve3         = $request->status; 
            $salary_add->supperadmin_id     = Auth::id();
            $salary_add->supperadmin_date   = Carbon::now()->toDateTimeString();
            $salary_add->save();

            $salary_comment = new salary_advance_comment();

            $salary_comment->salary_advance_id   = $x;
            $salary_comment->comment             = $request->salary_comments;
            $salary_comment->user_id             = Auth::id();
            $salary_comment->user_type_id        = Auth()->user()->usertype_id;
            $salary_comment->status              = 1;
            
            $salary_comment->save();

            $salary_history = new SalaryhisroryModel();

            $salary_history->advase_id             = $salary_add->id;
            $salary_history->requested_sal_advance = $request->amount;
            $salary_history->user_id               = Auth::id();
            $salary_history->status                = 1;
            
            $salary_history->save();
            return redirect('superadmin/salary')->with('success', 'Data saved!');

    }
    
    public function savecomm(Request $request,$id){
         
     // return $request;
        
            $x =$id;
            $salary_comment = new salary_advance_comment();

            $salary_comment->salary_advance_id   = $x;
            $salary_comment->comment             = $request->salary_comments;
            $salary_comment->user_id             = Auth::id();
            $salary_comment->user_type_id        = Auth()->user()->usertype_id;
            $salary_comment->status              = 1;
            
            $salary_comment->save();
            return redirect()->back()->with('success', 'Comment Added..!');
}
}
