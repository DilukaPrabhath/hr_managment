<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\department;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Carbon\Carbon;



class departmentcontroller extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //load department home
    public function departmenthome(){
        $depData = department::departmenthome();
        return view('admin.department.index', compact('depData'));
    }

    //load preview
    public function departmentpreview($any){
        $depData = department::departmentpreview($any);
        return view('admin.department.preview', compact('depData'));
    }

    //load department new
    public function departmentnew(){
        $emply = User::emptlist();
        return view('admin.department.add', compact('emply'));
    }
    
     public function add_department(){
    	return view('admin.department.add');
    }

    //save new budget
    public function departmentsave(Request $request){
       $validate= $request->validate([
            'dname' => ['required',  Rule::unique('departments','department')]
        ]);

        //$usrid=$note->super_id= Auth::id();
        $logedid = Auth::id();
        $department = new department;
        $department->department=$request->dname;
        $department->status='1';
        $department->created_by=$logedid;
        try {

            $department->save();
            return redirect()->back()->with('success', 'New Department Successfuly Saved ..!');

        } catch (Exception $e) {

            return redirect()->back()->with('error', 'New Department Inserting Error ..!');
        }
    }

    //load edit
    public function departmentedit($any){
        $depData = department::departmentpreview($any);
        $emply = user::emptlist();
        return view('admin.department.edit', compact('depData', 'emply'));
    }
    
    //update
    public function departmentupdate(Request $request){
        $validate= $request->validate([
            'dname' => ['required']
        ]);
        
        $department = department::find($request->id);
        $department->department = $request->dname;
        $department->status  = $request->stts;  
        try {

            $department->save();
            return redirect()->back()->with('success', 'Department Successfuly Edited ..!');

        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Department Inserting Error ..!');
        }
    }
}
