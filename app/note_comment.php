<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class note_comment extends Model
{
    //

     public static function notecomment($id) {
        $sql= DB::table('note_comments')
        ->select('note_comments.*', 'departments.department','users.reg_no','usertypes.*')
        ->leftjoin('departments','note_comments.dep_id', '=', 'departments.id')
        ->leftjoin('users','note_comments.user_id', '=', 'users.id')
        ->leftjoin('usertypes','note_comments.user_types', '=', 'usertypes.id')
        ->where('note_comments.note_id', '=', $id)
        ->get();
        return $sql;     
    }

    public static function salary1($id) {
        $logedid = Auth::id();
        $sql= DB::table('salary_advances')
        ->select('salary_advances.*')
        ->get();
        return $sql;     
    }
    
    public static function notecomment2($id) {
        $sql= DB::table('note_comments','usertypes.user_type','users.reg_no')
        ->select('note_comments.*','users.reg_no','usertypes.user_type')
        ->leftjoin('users','note_comments.user_id', '=', 'users.id')
        ->leftjoin('usertypes','note_comments.user_types', '=', 'usertypes.id')
        ->where('note_comments.note_id', '=', $id)
        ->get();
        return $sql;     
    }
}
