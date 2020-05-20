<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\budget;  	 
use App\settlement;
use App\settlement_item;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
 

class settelementcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    ///////////////////////////////////// hod ////////////////////////////////////
        //load settelement home
        public function settelementthome(){
            $budgetData = budget::budgethomesettlement();
            return view('hod.settelement.index', compact('budgetData'));
        }

        //load settelement new
        public function settelementnew($any){
            $budgetData = budget::budgetpreview($any);
            return view('hod.settelement.add', compact('budgetData'));
        }
        
        //load settelement preview
         public function settelementpreview($any){
            $budgetData = budget::budgetpreview($any);
            $settlmnt = settlement::settlmntpreview($any);
            $settlmntitm = settlement_item::settlmntpreview($any);
            
            return view('hod.settelement.preview', compact('budgetData','settlmnt','settlmntitm'));
        }

        //save new settelement
        public function settlmtsave(Request $request){
         $logedid = Auth::id();
         //$usrid='3'; 
         $settlement = new settlement;
         $settlement->user_id=$logedid;
         $settlement->user_date=Carbon::now()->toDateTimeString();
         $settlement->budget_id=$request->bgid;
         $settlement->remark=$request->cmnt;
         $settlement->status='1';
         $settlement->save();
         
         $budget = budget::find($request->bgid);
         $budget->settlement='1'; 
         

        // $usrid='123';
         $dataArray= array();
         foreach ($request->invno as $key => $value) {
             array_push($dataArray, array(
                     'settlement_id' => $settlement->id,
                     'invoice_num' => $value,
                     'dipcription' => $request->descp[$key],
                     'amount' => $request->amount[$key],
                     'status' => '1'
                 )
             );
         }

         $settlementitm = new settlement_item;
         
    try {
        
        $budget->save();
        $settlementitm->insert($dataArray);
        return redirect()->back()->with('success', 'Settelemnt Successfuly Approved ..!');

    } catch (Exception $e) {

        return redirect()->back()->with('error', 'Settelemnt Inserting Error ..!');
    }
     }

    ///////////////////////////////////// Admin ////////////////////////////////////

    //load settelement home
    public function settelementthomeadmin(){
        $budgetData = budget::budgethomesettlementadmin();
        return view('admin.settelement.index', compact('budgetData'));
    }

    //load settelement preview
    public function settelementpreviewadmin($any){
        $budgetData = budget::budgetpreview($any);
        $settlmnt = settlement::settlmntpreview($any);
        $settlmntitm = settlement_item::settlmntpreview($any);
        
        return view('admin.settelement.preview', compact('budgetData','settlmnt','settlmntitm'));
    }

    //load settelement approve
    public function settelementapprove($any){
          $budgetData = budget::budgetpreview($any);
          $settlmnt = settlement::settlmntpreview($any);
          $settlmntitm = settlement_item::settlmntpreview($any);
        return view('admin.settelement.approve', compact('budgetData','settlmnt','settlmntitm'));
    }

    //save new budget
    public function settlmtapprovesave(Request $request){
        $logedid = Auth::id();
        $settlement = settlement::find($request->stid);
        $settlement->status=$request->stts; 
        $settlement->adm_id=$logedid;
        $settlement->admin_date=Carbon::now()->toDateTimeString();
        $settlement->comment=$request->comment;  
        

        $budget = budget::find($request->bgid);
        $budget->settlement=$request->stts; 
    try {
        $settlement->save();
        $budget->save();
        return redirect()->back()->with('success', 'Settelemnt Successfuly Approved ..!');

    } catch (Exception $e) {

        return redirect()->back()->with('error', 'Settelemnt Inserting Error ..!');
    }
    }

    ////////////////////////// super admin //////////////////////////////////

    //load settelement home
    public function settelementthomesuperadmn(){
        $budgetData = budget::budgethomesettlementsupr();
        return view('superadmin.settelement.index', compact('budgetData'));
    }

    
    //load settelement preview
    public function budgetsettelementhome($any){
        $budgetData = budget::budgetpreview($any);
        $settlmnt = settlement::settlmntpreview($any);
        $settlmntitm = settlement_item::settlmntpreview($any);
        return view('superadmin.settelement.preview', compact('budgetData','settlmnt','settlmntitm'));
    }

    
    
}
