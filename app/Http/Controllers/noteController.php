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
use Carbon\Carbon;

class noteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    // public function index(){
    // 	 $notes = note::all();
    // 	 return view('note.index',compact('notes'));
    // }

    public function index() {

       // $table_data = MasterModel::selectMaster('notes');  
        $table_data    = note::notetable();
        //return $sql;

        return view('admin.note.index', compact('table_data'));
    }

    public function comments($id) {

        $note_data = note_comment::notecomment2($id);
        // if($id != null) {
        //    $note_data = MasterModel::selectMaster('note_comments', 'note_id', $id);
        // }

       return view('admin.note.comments',compact('note_data'));
    }

    public function create(){
    	 $department = department::all();
    	 return view('admin.note.create',compact('department'));
    }

    public function save(Request $request){
    	 
    	 $this->validate(request(), [
                'note'              => 'required',
                'department'        => 'required',
                'note_comments'     => 'required',
            ]);
    	
    		$note = new note();

    		$note->department_id    = $request->department;
    		$note->note             = $request->note;
    		$note->users_id         = Auth::id();
    		$note->date             = Carbon::now()->toDateTimeString();
            $note->head_app_date    = Carbon::now()->toDateTimeString();
            $note->dip_head_id      = Auth::id();
            $note->approve1         = 1;
            $note->admin_app_date   = Carbon::now()->toDateTimeString();
            $note->admin_id         = Auth::id();
            $note->approve2         = 1;

    		$note->save();

            $note_comment = new note_comment();

            $note_comment->note_id    = $note->id;
            $note_comment->comment    = $request->note_comments;
            $note_comment->user_id    = Auth::id();
            $note_comment->user_types = Auth()->user()->usertype_id;
            $note_comment->status     = 1;
            
            $note_comment->save();

    	    return redirect('note')->with('success', 'Data saved!');
    }

    public function save_comments(Request $request){
            $note_comment = new note_comment();
            $note_comment->note_id     = $request->id_comment;
            $note_comment->comment     = $request->note_comments;
            $note_comment->user_id     = Auth::id();
            $note_comment->user_types  = Auth()->user()->usertype_id;
            $note_comment->status      = 1;
            $note_comment->save();
            return redirect()->back()->with('success', 'Comment Added..!');

// return  $request;
    }

    public function view($id){
         $getid      = $id;
         $department = department::all();
         $note1      = note::notedataget($id);
         //return $note1;
         return view('admin.note.view',compact('department','note1','getid'));
    }

    //  public function edit($id){
    //      $department = department::all();
    //      $note = note::find($id);
    //      return view('note.edit',compact('department','note'));
    // }

    public function edit($id){
         $department = department::all();
         $note1      = note::notedataget($id);
         return view('admin.note.edit',compact('department','note1'));
        // $note1   = note::notedataget($id);
         //return $note1;
    }
    public function update(Request $request ,$id){
        //return $id;
        $this->validate(request(), [
            'note'                => 'required',
            'status'              => 'required',
            'note_comments'       => 'required',
            ]);

        $note = note::find($id);
        $note->admin_app_date   = Carbon::now()->toDateTimeString();
        $note->admin_id         = Auth::id();
        $note->department_id    = $request->department;
        $note->note             = $request->note;
        if ($request->status == 5) {
            $note->approve2         = $request->status;
            $note->approve1         = $request->status;
        }else{
            $note->approve2         = $request->status;
        }
        
        $note->save();

        $note_comment = new note_comment();

        $note_comment->note_id    = $id;
        $note_comment->comment    = $request->note_comments;
        $note_comment->user_id    = Auth::id();
        $note_comment->user_types = Auth()->user()->usertype_id;
        $note_comment->status     = 1;
            
        $note_comment->save();
        return redirect('note')->with('success', 'Note Approved!');
        // $note1   = note::notedataget($id);
         //return $note1;
    }

    public function approve($id){
        $note = note::find($id);
        $note->admin_app_date   = Carbon::now()->toDateTimeString();
        $note->admin_id         = Auth::id();
        $note->approve2         = 3;
        $note->save();
        return redirect()->back()->with('success', 'Note Approve Completed..!');
    }

    public function stat3(Request $request, $id){
       // return $id;
        $this->validate(request(), [
                'status'              => 'required',
                'note_comments'       => 'required',
            ]);

        $note = note::find($id);
        $note->admin_app_date   = Carbon::now()->toDateTimeString();
        $note->admin_id         = Auth::id();
        if ($request->status == 5) {
            $note->approve2         = $request->status;
            $note->approve1         = $request->status;
        }else{
            $note->approve2         = $request->status;
        }
        $note->save();

        $note_comment = new note_comment();

        $note_comment->note_id    = $id;
        $note_comment->comment    = $request->note_comments;
        $note_comment->user_id    = Auth::id();
        $note_comment->user_types = Auth()->user()->usertype_id;
        $note_comment->status     = 1;
            
        $note_comment->save();
        return redirect('note')->with('success', 'Data Updated!');
    }

    public function com($id){
         $getid = $id;
         $department = department::all();
         $note_data   = note::comments($id);
         //return $note1;
          return $note_data;
         // return view('admin.note.comments',compact('note_data'));
    }
}
