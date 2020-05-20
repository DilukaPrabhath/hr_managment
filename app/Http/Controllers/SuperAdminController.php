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

class SuperAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index() {
// return "dqdqeq";
       
      $table_data    = note::supernotetable();
      //return $table_data;
       return view('superadmin.note.index', compact('table_data'));
    }
    
    public function view($id){
         $getid = $id;
         $department = department::all();
         $note1      = note::supernotetable2($id);
         //return $note1;

         return view('superadmin.note.view',compact('department','note1' ,'getid'));
    }

    public function approve($id){
        $note = note::find($id);
        $note->superadmin_app_date   = Carbon::now()->toDateTimeString();
        $note->super_id              = Auth::id();
        $note->approve3              = 1;
        $note->save();
        return redirect()->back()->with('success', 'Note Approved!');
    }

    public function reject($id){
        $note = note::find($id);
        $note->superadmin_app_date   = Carbon::now()->toDateTimeString();
        $note->super_id        		 = Auth::id();
        $note->approve3        		 = 2;
        $note->save();
        return redirect()->back()->with('success', 'Note Rejected!');
    }

        public function comments($id) {

        $note_data = note_comment::notecomment2($id);

        // if($id != null) {
        //    $note_data = MasterModel::selectMaster('note_comments', 'note_id', $id);
        // }

       return view('superadmin.note.comment',compact('note_data'));
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

    public function stat3(Request $request, $id){
    	$id_comment = $id;
        $this->validate(request(), [
                'status'  => 'required',
                'note_comments'  => 'required',
            ]);
        //return $request;
        

        $notes = note::find($id);
        $notes->superadmin_app_date      = Carbon::now()->toDateTimeString();
        $notes->super_id        		 = Auth::id();
        if ($request->status == 6) {
            $notes->approve2         = $request->status;
            $notes->approve3         = $request->status;
        }else{
            $notes->approve3         = $request->status;
        }
        $notes->save();

        $note_comment = new note_comment();
        $note_comment->note_id  = $id_comment;
        $note_comment->comment  = $request->note_comments;
        $note_comment->user_id  = Auth::id();
        $note_comment->user_types  = Auth()->user()->usertype_id;
        $note_comment->status   = 1;
        $note_comment->save();

        return redirect('superadmin')->with('success', 'Approval Type Given!');
// return  $request;
    }
}
