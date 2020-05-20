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

class HodSalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
    	$data = salary_advance::salary1();
    	return view('hod.salary.index',compact('data'));
    }

    public function create(){
    	return view('hod.salary.create');
    }
    public function view($id){
    	$data = salary_advance::salary3($id);
    	return view('hod.salary.view',compact('data'));
    }
    public function edit($id){
        $data = salary_advance::salary3($id);
    	return view('hod.salary.edit',compact('data'));
    }

    
     public function commentview($id){
        
        $data = salary_advance_comment::salarycomment($id);
        return view('hod.salary.comments',compact('data'));
    }



    public function store(Request $request){
    	 
     //return $request;

        $this->validate(request(), [
                'amount'               => 'required',
                'months'               => 'required',
                'perpose'              => 'required',
                'salary_comments'      => 'required',
               
            ]);
    	
    		$salary_add = new salary_advance();
    		$salary_add->user_id          = Auth::id();
    	    $salary_add->department_id    = Auth()->user()->department_id;
    		$salary_add->amount           = $request->amount;
    		$salary_add->months           = $request->months;
    		$salary_add->perpose          = $request->perpose;
    		$salary_add->adddate          = Carbon::now()->toDateTimeString();
            $salary_add->approve1         = 1;
            $salary_add->diphead_id       = Auth::id();
            $salary_add->diphead_date     = Carbon::now()->toDateTimeString();
    		$salary_add->save();

            $salary_comment = new salary_advance_comment();

            $salary_comment->salary_advance_id   = $salary_add->id;
            $salary_comment->comment  		     = $request->salary_comments;
            $salary_comment->user_id 			 = Auth::id();
            $salary_comment->user_type_id        = Auth()->user()->usertype_id;
            $salary_comment->status 			 = 1;
            
            $salary_comment->save();

            $salary_history = new SalaryhisroryModel();

            $salary_history->advase_id             = $salary_add->id;
            $salary_history->requested_sal_advance = $request->amount;
            $salary_history->user_id               = Auth::id();
            $salary_history->status                = 1;
            
            $salary_history->save();
    	    return redirect()->back()->with('success', 'Data Saved..!');
    }

    
    public function update(Request $request ,$id){
    	 
            $this->validate(request(), [
                'amount'               => 'required',
                'months'               => 'required',
                'perpose'              => 'required',
                'salary_comments'      => 'required',
                'status'               => 'required',
               
            ]);
    	
    		$salary_add = salary_advance::find($id);
    		$salary_add->amount           = $request->amount;
    		$salary_add->months           = $request->months;
    		$salary_add->perpose          = $request->perpose;
            $salary_add->approve1         = $request->status;
            $salary_add->diphead_id       = Auth::id();
            $salary_add->diphead_date     = Carbon::now()->toDateTimeString();
    		$salary_add->save();

            $salary_comment = new salary_advance_comment();

            $salary_comment->salary_advance_id   = $id;
            $salary_comment->comment  		     = $request->salary_comments;
            $salary_comment->user_id 			 = Auth::id();
            $salary_comment->user_type_id        = Auth()->user()->usertype_id;
            $salary_comment->status 			 = 1;
            
            $salary_comment->save();
    	    return redirect('hod/salary/advance')->with('success', 'Data updated..!');
    }

    public function approve(Request $request ,$id){
         
            $this->validate(request(), [
                'salary_comments'      => 'required',
                'status'               => 'required',
            ]);
            $salary_add = salary_advance::find($id);
            $salary_add->approve1         = $request->status;
            $salary_add->diphead_id       = Auth::id();
            $salary_add->diphead_date     = Carbon::now()->toDateTimeString();
            $salary_add->save();
       

        $salary_comment = new salary_advance_comment();

            $salary_comment->salary_advance_id   = $id;
            $salary_comment->comment             = $request->salary_comments;
            $salary_comment->user_id             = Auth::id();
            $salary_comment->user_type_id        = Auth()->user()->usertype_id;
            $salary_comment->status              = 1;
            
            $salary_comment->save();
            return redirect('hod/salary/advance')->with('success', 'Comment Added..!');

     }
    public function commentsave(Request $request ,$id){
            $commid = $id;
            $salary_comment = new salary_advance_comment();

            $salary_comment->salary_advance_id   = $commid;
            $salary_comment->comment             = $request->salary_comments;
            $salary_comment->user_id             = Auth::id();
            $salary_comment->user_type_id        = Auth()->user()->usertype_id;
            $salary_comment->status              = 1;
            
            $salary_comment->save();
            return redirect()->back()->with('success', 'Comment Added..!');


    }
}
