<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\department;
use App\MasterModel;
use App\salary_advance;
use App\salary_advance_comment;
use App\note;
use App\note_comment;
use App\users;
use App\SalaryhisroryModel;
use Carbon\Carbon;

class salary_Adv_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
    	return view('admin.salary_advance.index');
    }


    public function add(){
    	$user = MasterModel::selectMaster('users'); 
    	//return view('salary_advance.create');
    	return view('admin.salary_advance.create', compact('user'));
    }

    
    public function save(Request $request){
    	 
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
            $salary_add->approve2         = 1; 
            $salary_add->admin_id_st1     = Auth::id();
            $salary_add->admin_date_st1   = Carbon::now()->toDateTimeString();
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
    	    return redirect('admin/salary')->with('success', ' Successfuly Saved ..!');
    }

    public function update(Request $request,$id){
         
     // return $request;
        $this->validate(request(), [
                'amount'               => 'required',
                'months'               => 'required',
                'perpose'              => 'required',
                'salary_comments'      => 'required',
                'status'               => 'required',
               
            ]);
            $salary_add = salary_advance::find($id);
            $x = $id;
            $salary_add->amount           = $request->amount;
            $salary_add->months           = $request->months;
            $salary_add->perpose          = $request->perpose;
            if ($request->status == 5) {
            $salary_add->approve2         = $request->status;
            $salary_add->approve1         = $request->status;
            }else{
            $salary_add->approve2         = $request->status;
            }
            $salary_add->admin_id_st1     = Auth::id();
            $salary_add->admin_date_st1   = Carbon::now()->toDateTimeString();
            $salary_add->save();

            $salary_comment = new salary_advance_comment();

            $salary_comment->salary_advance_id   = $x;
            $salary_comment->comment             = $request->salary_comments;
            $salary_comment->user_id             = Auth::id();
            $salary_comment->user_type_id        = Auth()->user()->usertype_id;
            $salary_comment->status              = 1;
            
            $salary_comment->save();
            return redirect('admin/salary')->with('success', 'Data Update Successfuly ..!');
    }
    

    public function save_comments(Request $request ,$id){
            $commid = $id;
            $salary_comment = new salary_advance_comment();

            $salary_comment->salary_advance_id   = $commid;
            $salary_comment->comment             = $request->salary_comments;
            $salary_comment->user_id             = Auth::id();
            $salary_comment->user_type_id        = Auth()->user()->usertype_id;
            $salary_comment->status              = 1;
            
            $salary_comment->save();
            return redirect()->back()->with('success', 'Comment Added ..!');

    }
    
    public function approve_amount(Request $request ,$id){
            //return $request;
        // dd($request->all());
            $a_id = SalaryhisroryModel::where('advase_id' , $id)->get()->last()->id;
            $salary_comment = SalaryhisroryModel::find($a_id);
            // dd($salary_comment);
            $salary_comment->approve_sal_advance = $request->salary_approve;
            $salary_comment->admin_id            = Auth::id();
           
            $salary_comment->save();
            return redirect('admin/salary')->with('success', 'Data Saved Successfuly ..!');
    

    }
}
