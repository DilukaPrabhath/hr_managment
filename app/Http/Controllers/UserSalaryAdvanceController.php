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
use App\SalaryAdvanceModel;
use Carbon\Carbon;

class UserSalaryAdvanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
     // return  
     $usersal = salary_advance::salary2();
    	// $usersal = salary_advance::all();

    	return view('user.salary.index', compact('usersal'));
    }

    public function create(){
    	return view('user.salary.create');
    }

     public function view($id){

        $sal = salary_advance::find($id);
    	return view('user.salary.view', compact('sal'));
    }
    public function comments($id){
        $comment = salary_advance_comment::salarycomment($id);
        
     // return   $comment = salary_advance_comment::find($id);

    	 return view('user.salary.comments', compact('comment'));
    }
     public function save_salary(Request $request){

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
            $salary_add->save();

            $salary_comment = new salary_advance_comment();

            $salary_comment->salary_advance_id   = $salary_add->id;
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
            return redirect()->back()->with('success', 'Data saved!');
        
    }

    public function save_comments(Request $request,$id){
            $salary_add = $id;
            $salary_comment                      = new salary_advance_comment();
            $salary_comment->salary_advance_id   = $salary_add;
            $salary_comment->comment             = $request->salary_comments;
            $salary_comment->user_id             = Auth::id();
            $salary_comment->user_type_id        = Auth()->user()->usertype_id;
            $salary_comment->status              = 1;

            $salary_comment->save();
            return redirect()->back()->with('success', 'Comment Added!');
// return  $request;
    }
    //  public function comment($id){
    //     $sal = salary_advance::find($id);
    //     return view('user.salary.view', compact('sal'));
    // }
}
