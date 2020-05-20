<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\budget;
use App\department;
//use App\user; 
use App\User;
use App\budget_comment; 
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class budgetcontroller extends Controller
{

//////////////////////// admin ////////////////////////////////
    //load budget home
    public function budgethome(){
        $budgetData = budget::budgethomeadmin();
        return view('admin.budget.index', compact('budgetData'));
    }

    //load preview
    public function budgetpreview($any){
        $budgetData = budget::budgetpreview($any);
        return view('admin.budget.preview', compact('budgetData'));
    }

    //load create new
    public function budgetnew() {
        $depname = department::departmentnew();
        $emply = user::emptlist();
        return view('admin.budget.add', compact('depname' , 'emply'));
    }

    //load Edit Budget
    public function budgetedit($any) {
       $budgetData = budget::budgetpreview($any);
       $emply = user::emptlist();
       $depname = department::departmentnew();
       return view('admin.budget.edit', compact('budgetData', 'emply', 'depname'));
    }

    //load check
    public function budgetcheck($any) {
        $budgetData = budget::budgetpreview($any);
        return view('admin.budget.check', compact('budgetData'));
    }

    //budget edit save 
    public function budgeteditsave(Request $request){
        $validate= $request->validate([
            'bname' => ['required'],
            'cost' => ['required'],
            'depname' => ['required'],
            'empname' => ['required'],
            'descrit' => ['required'],
        ]);
        $logedid = Auth::id();
        $budget = budget::find($request->id);
        $budget->name=$request->bname;
        $budget->department_id=$request->depname;
        $budget->discription=$request->descrit;
        $budget->cost=$request->cost;
        $budget->status='1'; //PENDING
        $budget->user_id=$request->empname;
        $budget->save();

        //Comment Save
        $budget_comment = new budget_comment;
        $budget_comment->comment='Edit the budget request for Rs '.$request->cost; 
        $budget_comment->specomment='-';
        $budget_comment->budget_id=$request->id;
        $budget_comment->user_id=$logedid;
        $budget_comment->status='1';
       // $budget->updated_at=Carbon::now()->toDateTimeString();
    try {

        $budget_comment->save();
        return redirect()->back()->with('success', 'Budget Successfuly Edited ..!');

    } catch (Exception $e) {

        return redirect()->back()->with('error', 'Budget Inserting Error ..!');
    }

    }

    //budget check save 
    public function budgetchecksave(Request $request){

        if($request->stts==2){
            $comnt='Accepted the budget request by Admin for Rs '.$request->cost;
        }elseif($request->stts==22){
            $comnt='Reject the budget request by Admin for Rs '.$request->cost;
        }else{
            $comnt='Reverse the budget request by Admin for Rs '.$request->cost;
        }


        $logedid = Auth::id();
        $budget = budget::find($request->id);
        $budget->status=$request->stts;
        $budget->adm_date=Carbon::now()->toDateTimeString();
        $budget->adm_id=$logedid;
        $budget->save();
        
        //Comment Save
        $budget_comment = new budget_comment;
        $budget_comment->comment=$comnt;
        $budget_comment->specomment=$request->comment;
        $budget_comment->budget_id=$request->id;
        $budget_comment->user_id=$logedid;
        $budget_comment->status=$request->stts;
        try {

            $budget_comment->save();
            return redirect()->back()->with('success', 'Budget Check Successfuly Saved ..!');
    
        } catch (Exception $e) {
    
            return redirect()->back()->with('error', 'Budget Check Inserting Error ..!');
        }
    }

     //save new budget  admin /head/ user
    public function budgetsave(Request $request){
         $logedid = Auth::id();
        $validate= $request->validate([
            'bname' => ['required'],
            'cost' => ['required'],
            'depname' => ['required'],
            'empname' => ['required'],
            'descrit' => ['required'],
        ]);

        $usrid=3;
        $budget = new budget;
        $budget->name=$request->bname;
        $budget->department_id=$request->depname;
        $budget->discription=$request->descrit;
        $budget->cost=$request->cost;
        $budget->status='1'; //Pending
        $budget->dep_head_date=Carbon::now()->toDateTimeString();
        $budget->user_id=$request->empname;
        $budget->user_date=Carbon::now()->toDateTimeString();
        $budget->head_id=$logedid; // budget created person
        $budget->save();

        //Comment Save
        $budget_comment = new budget_comment;
        $budget_comment->comment='Create a budget request for Rs '.$request->cost;
        $budget_comment->specomment='-';
        $budget_comment->budget_id=$budget->id;
        $budget_comment->user_id=$logedid;
        $budget_comment->status='1';
        try {
            $budget_comment->save();
            
            return redirect()->back()->with('success', 'Budget Successfuly saved ..!');
    
        } catch (Exception $e) {
    
            return redirect()->back()->with('error', 'Budget Inserting Error ..!');
        }
    }

///////////////////////// Super admin ///////////////////////////
    //load budget home approve
    public function budgethomeapprove(){
        $budgetData = budget::budgethomeapprove();
        return view('superadmin.budget.index', compact('budgetData'));
    }

    //load preview
    public function budgetpreviewapprove($any){
        $budgetData = budget::budgetpreview($any);
        return view('superadmin.budget.preview', compact('budgetData'));
    }

    //load Approve
    public function budgetapprove($any) {
        $budgetData = budget::budgetpreview($any);
        return view('superadmin.budget.approve', compact('budgetData'));
    }

    //budget approve save 
    public function budgetapprovesave(Request $request){
        if($request->stts==3){
            $comnt='Approved the budget request by Super admin';
        }elseif($request->stts==33){
            $comnt='Reject the budget request by Super admin';
        }else{
            $comnt='Reverse the budget request by Super admin ';
        }

        $logedid = Auth::id();
        $budget = budget::find($request->id);
        $budget->status=$request->stts;
        $budget->superadm_date=Carbon::now()->toDateTimeString();
        $budget->superadm_id=$logedid;
        $budget->save();
        
        //Comment Save
        $budget_comment = new budget_comment;
        $budget_comment->comment=$comnt;
        $budget_comment->specomment=$request->comment;
        $budget_comment->budget_id=$request->id;
        $budget_comment->user_id=$logedid;
        $budget_comment->status=$request->stts;
        try {

            $budget_comment->save();
            return redirect()->back()->with('success', 'Budget Approve Successfuly Saved ..!');
    
        } catch (Exception $e) {
    
            return redirect()->back()->with('error', 'Budget Approve Inserting Error ..!');
        }
    }

    /////////////////////department head /////////////////////
    //load budget home
    public function budgetcreate(){
        $budgetData = budget::budgethome();
        return view('hod.budget.index', compact('budgetData'));
    }

    //load create new
    public function budgethodnew() {
        $depname = department::departmentnewhead();
        $emply = user::emptlisthead();
        return view('hod.budget.add', compact('depname' , 'emply'));
    }

    //load preview
    public function budget_Preview($any){
        $budgetData = budget::budgetpreview($any);
        return view('hod.budget.preview', compact('budgetData'));
    }
    
    //load edit Budget
    public function budgetedits($any){
        $budgetData = budget::budgetpreview($any);
        $emply = user::emptlisthead();
        $depname = department::departmentnewhead();
        return view('hod.budget.edit', compact('budgetData', 'emply', 'depname'));
        }

    //budget edit save 
    public function budgeteditssave(Request $request){
        $logedid = Auth::id();
        $validate= $request->validate([
            'bname' => ['required'],
            'cost' => ['required'],
            'depname' => ['required'],
            'empname' => ['required'],
            'descrit' => ['required'],
        ]);
        //$usrid=$note->super_id= Auth::id();//Get Cuttant Date Times
        $budget = budget::find($request->id);
        $budget->name=$request->bname;
        $budget->department_id=$request->depname;
        $budget->discription=$request->descrit;
        $budget->cost=$request->cost;
        $budget->status='1'; //PENDING
        $budget->dep_head_date=Carbon::now()->toDateTimeString();
        $budget->user_id=$request->empname;
        $budget->user_date=Carbon::now()->toDateTimeString();
        $budget->head_id=$logedid;
        $budget->save();
        //Comment Save
        $budget_comment = new budget_comment;
        $budget_comment->comment='Edit the budget request for Rs'.$request->cost;
        $budget_comment->specomment='1';
        $budget_comment->budget_id=$request->id;
        $budget_comment->user_id=$logedid;
        $budget_comment->status='1';
        try {

            $budget_comment->save();
            return redirect()->back()->with('success', 'Budget Successfuly Edited ..!');
    
        } catch (Exception $e) {
    
            return redirect()->back()->with('error', 'Budget Inserting Error ..!');
        }
    }

     
    ///////////////////// User /////////////////////
    //load budget home
    public function budgetcreateuser(){
        $budgetData = budget::budgethome();
        return view('user.budget.index', compact('budgetData'));
    }

    //load create new
    public function budgethodnewuser() {
        $depname = department::departmentnewhead();
        $emply = user::emptlisthead();
        return view('user.budget.add', compact('depname' , 'emply'));
    }

    //load preview
    public function budget_Previewuser($any){
        $budgetData = budget::budgetpreview($any);
        return view('user.budget.preview', compact('budgetData'));
    }
    
    //load edit Budget
    public function budgeteditsuser($any){
        $budgetData = budget::budgetpreview($any);
        $emply = user::emptlisthead();
        $depname = department::departmentnewhead();
        return view('user.budget.edit', compact('budgetData', 'emply', 'depname'));
        }

            //budget edit save 
    public function budgeteditssaveuser(Request $request){
        $logedid = Auth::id();
        $validate= $request->validate([
            'bname' => ['required'],
            'cost' => ['required'],
            'depname' => ['required'],
            'empname' => ['required'],
            'descrit' => ['required'],
        ]);
        //$usrid=$note->super_id= Auth::id();//Get Cuttant Date Times
        $budget = budget::find($request->id);
        $budget->name=$request->bname;
        $budget->department_id=$request->depname;
        $budget->discription=$request->descrit;
        $budget->cost=$request->cost;
        $budget->status='1'; //PENDING
        $budget->dep_head_date=Carbon::now()->toDateTimeString();
        $budget->user_id=$request->empname;
        $budget->user_date=Carbon::now()->toDateTimeString();
        $budget->head_id=$logedid;
        $budget->save();

        $budget_comment = new budget_comment;
        $budget_comment->comment='Edit the budget request for Rs '.$request->cost;
        $budget_comment->specomment='-';
        $budget_comment->budget_id=$request->id;
        $budget_comment->user_id=$logedid;
        $budget_comment->status='1';
        try {

            $budget_comment->save();
            return redirect()->back()->with('success', 'Budget Successfuly Edited ..!');
    
        } catch (Exception $e) {
    
            return redirect()->back()->with('error', 'Budget Inserting Error ..!');
        }
    }


}
