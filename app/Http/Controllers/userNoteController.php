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

class userNoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function note(){
    // 	return view('user.noteindex');
    // }
    //return "hi";
    
    public function index() {

       
     $table_data    = note::usernotetable();

        return view('user.note.noteindex', compact('table_data'));
    }

        public function view($id){
         $department = department::all();
         $note1   = note::notedataget($id);
         //return $note1;
         return view('user.note.noteview',compact('department','note1'));
    }

    public function comments($id) {

        // if($id != null) {
        //    $note_data = MasterModel::selectMaster('note_comments', 'note_id', $id);
        // }
         $note_data = note_comment::notecomment2($id);

       return view('user.note.notecomment',compact('note_data'));
    }

    public function create(){
         $department = department::all();
         return view('user.note.notecreate',compact('department'));
    }

    public function save(Request $request){
         
         $this->validate(request(), [
                'note'              => 'required',
                'department'        => 'required',
               
            ]);
        
            $note = new note();

            $note->department_id    = $request->department;
            $note->note             = $request->note;
            $note->users_id         = Auth::id();
            $note->date             = Carbon::now()->toDateTimeString();

            $note->save();

            $note_comment = new note_comment();

            $note_comment->note_id  = $note->id;
            $note_comment->comment  = $request->note_comments;
            $note_comment->user_id  = Auth::id();
            $note_comment->user_types  = Auth()->user()->usertype_id;
            $note_comment->status   = 1;
            
            $note_comment->save();

            return redirect()->back()->with('success', 'Data saved!');
    }

    public function save_comments(Request $request){
            $note_comment = new note_comment();
            $note_comment->note_id  = $request->id_comment;
            $note_comment->comment  = $request->note_comments;
            $note_comment->user_id  = Auth::id();
            $note_comment->user_types  = Auth()->user()->usertype_id;
            $note_comment->status   = 1;
            $note_comment->save();
            return redirect()->back()->with('success', 'Comment Added!');

// return  $request;
    }

}
