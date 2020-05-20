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

class HodNoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index() {

       // $table_data = MasterModel::selectMaster('notes');  
        $table_data    = note::hodnotetable();
        //return $sql;

        return view('hod.note.noteindex', compact('table_data'));
    }

    public function create(){
         $department = department::all();
         return view('hod.note.notecreate',compact('department'));
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
            $note->save();

            $note_comment = new note_comment();

            $note_comment->note_id  = $note->id;
            $note_comment->comment  = $request->note_comments;
            $note_comment->user_id  = Auth::id();
            $note_comment->user_types  = Auth()->user()->usertype_id;
            $note_comment->status   = 1;
            
            $note_comment->save();

            return redirect('hodnote')->with('success', 'Data saved!');
    }

    public function save_comments(Request $request){
            $note_comment = new note_comment();
            $note_comment->note_id  = $request->id_comment;
            $note_comment->comment  = $request->note_comments;
            $note_comment->user_id  = Auth::id();
            $note_comment->user_types  = Auth()->user()->usertype_id;
            $note_comment->status   = 1;
            $note_comment->save();
            return redirect()->back()->with('success', 'Comment Added..!');

// return  $request;
    }
    public function edit($id){
         $department = department::all();
         $note1   = note::notedataget($id);
         return view('hod.note.noteedit',compact('department','note1'));
    }

    public function view($id){
         $department = department::all();
         $note1   = note::notedataget($id);
         return view('hod.note.noteview',compact('department','note1'));
    }


       public function comments($id) {

        // if($id != null) {
        //    $note_data = MasterModel::selectMaster('note_comments', 'note_id', $id);
        // }
        $note_data = note_comment::notecomment2($id);

       return view('hod.note.notecomment',compact('note_data'));
    }

    public function update(Request $request , $id){

         // $note1   = note::find($id);
         // $note    = new note();
    	// return $request;
        $this->validate(request(), [
                'note'              => 'required',
                'department'        => 'required',
                'note_comments'     => 'required',
                'status'     => 'required',
               
            ]);
    	$n_id = $id;
        $note = note::find($id);

        	
    		$note->department_id    = $request->department;
            $note->note             = $request->note;
            $note->approve1         = $request->status;
            $note->save();

            $note_comment = new note_comment();

            $note_comment->note_id  = $n_id;
            $note_comment->comment  = $request->note_comments;
            $note_comment->user_id  = Auth::id();
            $note_comment->user_types  = Auth()->user()->usertype_id;
            $note_comment->status   = 1;
            
            $note_comment->save();

            return redirect('hodnote')->with('success', 'Data updated..!');
    }

    public function approve(Request $request , $id){

        $this->validate(request(), [
                'note_comments'     => 'required',
                'status'     => 'required',
            ]);

        $n_id = $id;
        $note = note::find($id);
        $note->approve1         = $request->status;
        $note->head_app_date    = Carbon::now()->toDateTimeString();
        $note->dip_head_id      = Auth::id();
        $note->save();

        $note_comment = new note_comment();
        $note_comment->note_id     = $n_id;
        $note_comment->comment     = $request->note_comments;
        $note_comment->user_id     = Auth::id();
        $note_comment->user_types  = Auth()->user()->usertype_id;
        $note_comment->status      = 1;
            
        $note_comment->save();
        return redirect('hodnote')->with('success', 'Note Approved..!');
    }

    public function reject($id){
        $note = note::find($id);
        $note->approve1   = 2;
        $note->head_app_date    = Carbon::now()->toDateTimeString();
        $note->dip_head_id      = Auth::id();
        $note->save();
       return redirect()->back()->with('success', 'Note Rejected..!');
    }


}
