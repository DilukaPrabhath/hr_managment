<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\usertype;
use App\department;
use App\EmpBankDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class usercontroller extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }


	   public function index(){
        //$empData = User::employeenew();
        return view('indexuser');
     }

     //load home admin 
    public function employeehome(){
        $empData = User::employeenew();
        return view('admin.employee.index', compact('empData'));
     }

    //load preview admin
    public function employeepreview($any){
      $empData = User::employeepreview($any);
      return view('admin.employee.preview', compact('empData'));
    }

    //load edit admin
    public function employeeedit($any){
      $usertypeData = usertype::usernew();
      $depData = department::departmentnew();
      $empData = User::employeepreview($any);
      return view('admin.employee.edit', compact('empData','usertypeData','depData'));
  }


    //Employee new admin
    public function employeenew(){
      $usertypeData = usertype::usernew();
      $depData = department::departmentnew();
      return view('admin.employee.add', compact('usertypeData','depData'));

    }

    //load edit user
    public function employeeedituser(){
      $usertypeData = usertype::usernew();
      $depData = department::departmentnew();
      $empData = User::employeeprofile();
      return view('user.employee.edit', compact('empData','usertypeData','depData'));
  }


     //load edit user hod
      public function employeeedithod(){
        $usertypeData = usertype::usernew();
        $depData = department::departmentnew();
        $empData = User::employeeprofile();
        return view('hod.employee.edit', compact('empData','usertypeData','depData'));
    }

      //load edit user superadmin
      public function employeeeditsuperadmn(){
        $usertypeData = usertype::usernew();
        $depData = department::departmentnew();
        $empData = User::employeeprofile();
        return view('superadmin.employee.edit', compact('empData','usertypeData','depData'));
    }

    //save new employee
    public function employeesave(Request $request){

      $latest = User::latest()->first();
      if (! $latest) {
          $nextInvoiceNumber = 'Emp-0001';
      }
      $string = preg_replace("/[^0-9\.]/", '', $latest->reg_no);
      $nextInvoiceNumber = 'Emp-' . sprintf('%04d', $string+1);


     $validate= $request->validate([
          'fname' => ['required'],
          'lname' => ['required'],
          'stdate' => ['required'],
          'position' => ['required'],
          'nic' => ['required'],
          'gndr' => ['required'],
          'dobr' => ['before:' . date('Y-m-d'), 'required'],
          'addrs' => ['required'],
          'telph' => ['required'],
          'moble' => ['required'],
          'usrty' => ['required'],
          'depart' => ['required'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], 
          'pass' => ['required'],
      ]);


      $empData = new User;
      $empData->reg_no=$nextInvoiceNumber;
      $empData->usertype_id=$request->usrty; 
      $empData->department_id=$request->depart; 
      $empData->first_name=$request->fname; 
      $empData->last_name=$request->lname; 
      $empData->start_date=$request->stdate; 
      $empData->position=$request->position;
      $empData->nic=$request->nic;
      $empData->gender=$request->gndr;
      $empData->date_of_birth=$request->dobr; 
      $empData->address=$request->addrs; 
      $empData->telephone=$request->telph; 
      $empData->mobile=$request->moble;  
      $empData->email=$request->email; 
      $empData->password= Hash::make($request->pass);
      $empData->status='1';
      $empData->save();
      

      //bank details Save
      $EmpBankDetails = new EmpBankDetails;
      $EmpBankDetails->user_id=$empData->id;  
      $EmpBankDetails->bank_name=$request->bnknm;
      $EmpBankDetails->branch=$request->branch;
      $EmpBankDetails->account_name=$request->acname; 
      $EmpBankDetails->account_number=$request->acno;
      $EmpBankDetails->status='1';
      
      
      try {

        
        $EmpBankDetails->save();
        return redirect()->back()->with('success', 'New Employee Successfuly Saved ..!');

      } catch (Exception $e) {

        return redirect()->back()->with('error', 'New Employee Inserting Error ..!');
    }

  }

  
    //save new employee admin
    public function employeeupdate(Request $request){
       $validate = $request->validate([
       'fname' => ['required'],
        'lname' => ['required'],
        'stdate' => ['required'],
        'position' => ['required'],
        'usrty' => ['required'],
        'gndr' => ['required'],
        'dobr' => ['before:' . date('Y-m-d'), 'required'],
        'nic' => ['required'],  
        'addrs' => ['required'],
        'telph' => ['required'],
        'moble' => ['required'],
        'depart' => ['required'],
        'comfrm' => ['same:passed'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->id)], 

     ]);

      $empData = User::find($request->id);
      $empData->reg_no=$request->empno; 
      $empData->usertype_id=$request->usrty; 
      $empData->department_id=$request->depart; 
      $empData->first_name=$request->fname;
      $empData->last_name=$request->lname;
      $empData->start_date=$request->stdate; 
      $empData->position=$request->position;
      $empData->nic=$request->nic;
      $empData->gender=$request->gndr;
      $empData->date_of_birth=$request->dobr; 
      $empData->address=$request->addrs; 
      $empData->telephone=$request->telph; 
      $empData->mobile=$request->moble;  
      $empData->email=$request->email;
      if($request->passed != ''){ $empData->password= Hash::make($request->passed);}
      $empData->password= Hash::make($request->pass);
      $empData->status=1;
      $empData->save();

      //bank details Save
     $EmpBankDetails = EmpBankDetails::find($request->id);
     $EmpBankDetails = User::where('user_id' , $request->id);
     $EmpBankDetails->user_id=$empData->id;  
     $EmpBankDetails->bank_name=$request->bnknm;
     $EmpBankDetails->branch=$request->branch;
     $EmpBankDetails->account_name=$request->acname; 
     $EmpBankDetails->bsb=$request->bsb;  
     $EmpBankDetails->account_number=$request->acno;
     $EmpBankDetails->status=$request->stts;
      
      
      try {

        
        $empData->save();
        return redirect()->back()->with('success', 'New Employee Successfuly Edited ..!');

      } catch (Exception $e) {

        return redirect()->back()->with('error', 'New Employee Inserting Error ..!');
    }
  }


      //save update hod / user / super admin employee
      public function employeeupdateuser(Request $request){
        $validate = $request->validate([
         'fname' => ['required'],
         'lname' => ['required'],
         'stdate' => ['required'],
         'position' => ['required'],
         'usrty' => ['required'],
         'gndr' => ['required'],
         'dobr' => ['before:' . date('Y-m-d'), 'required'],
         'nic' => ['required'],  
         'addrs' => ['required'],
         'telph' => ['required'],
         'moble' => ['required'],
         'depart' => ['required'], 
         'comfrm' => ['same:passed'],
         'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->id)], 
 
      ]);
 
       $empData = User::find($request->id);
       $empData->reg_no=$request->empno; 
       $empData->usertype_id=$request->usrty; 
       $empData->department_id=$request->depart; 
       $empData->first_name=$request->fname;
       $empData->last_name=$request->lname;
       $empData->start_date=$request->stdate; 
       $empData->position=$request->position;
       $empData->nic=$request->nic;
       $empData->gender=$request->gndr;
       $empData->date_of_birth=$request->dobr; 
       $empData->address=$request->addrs; 
       $empData->telephone=$request->telph; 
       $empData->mobile=$request->moble;  
       $empData->email=$request->email;
       if($request->passed != ''){ $empData->password= Hash::make($request->passed);}
       $empData->status=1;
       $empData->save();
 
       //bank details Save
      $EmpBankDetails = EmpBankDetails::find($request->id);
      $EmpBankDetails = User::where('user_id' , $request->id);
      $EmpBankDetails->user_id=$empData->id;  
      $EmpBankDetails->bank_name=$request->bnknm;
      $EmpBankDetails->branch=$request->branch;
      $EmpBankDetails->account_name=$request->acname; 
      $EmpBankDetails->bsb=$request->bsb;  
      $EmpBankDetails->account_number=$request->acno;
      $EmpBankDetails->status='1';
       
       
       try {
 
         
         $empData->save();
         return redirect()->back()->with('success', 'New Employee Successfuly Edited ..!');
 
       } catch (Exception $e) {
 
         return redirect()->back()->with('error', 'New Employee Inserting Error ..!');
     }
   }
}
