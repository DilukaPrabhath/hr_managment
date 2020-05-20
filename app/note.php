<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class note extends Model
{
    //
   

    public static function usernotetable() {
       $logedid = Auth::id();
        $sql= DB::table('notes')
        ->select('notes.*', 'departments.department','users.reg_no')
        ->leftjoin('departments','notes.department_id', '=', 'departments.id')
        ->leftjoin('users','notes.users_id', '=', 'users.id')
        ->where('users.id', '=', $logedid)
        ->get();
        return $sql;     
    }

    public static function notedataget($id) {
       
        $selectsql= DB::table('notes')
        ->select('notes.*', 'departments.department','users.reg_no')
        ->leftjoin('departments','notes.department_id', '=', 'departments.id')
        ->leftjoin('users','notes.users_id', '=', 'users.id')
        ->where('notes.id', '=', $id) 
        ->get();
        return $selectsql;     
    }

    public static function notetable() {
       
        $sql= DB::table('notes')
        ->select('notes.*', 'departments.department','users.reg_no')
        ->leftjoin('departments','notes.department_id', '=', 'departments.id')
        ->leftjoin('users','notes.users_id', '=', 'users.id')
        ->whereIn('notes.approve1', [1, 5]) 

        ->get();
        return $sql;     
    }

    public static function hodnotetable() {
        $logeddip = Auth::user()->department_id;
        $sql= DB::table('notes')
        ->select('notes.*', 'departments.department','users.reg_no')
        ->leftjoin('departments','notes.department_id', '=', 'departments.id')
        ->leftjoin('users','notes.users_id', '=', 'users.id')
        ->where('departments.id', '=', $logeddip) 
        ->get();
        return $sql;     
    }


    public static function notetable2($id) {
       
        $sql= DB::table('notes')
        ->select('notes.*', 'departments.department','users.reg_no')
        ->leftjoin('departments','notes.department_id', '=', 'departments.id')
        ->leftjoin('users','notes.users_id', '=', 'users.id')
        ->get();
        return $sql;     
    }

    public static function supernotetable() {
       
        $sql= DB::table('notes')
        ->select('notes.*', 'departments.department','users.reg_no')
        ->leftjoin('departments','notes.department_id', '=', 'departments.id')
        ->leftjoin('users','notes.users_id', '=', 'users.id')
        ->whereIn('notes.approve2', [1, 3 ,6]) 
        ->get();
        return $sql;     
    }

    public static function supernotetable2($id) {
       
        $sql= DB::table('notes')
        ->select('notes.*', 'departments.department','users.reg_no')
        ->leftjoin('departments','notes.department_id', '=', 'departments.id')
        ->leftjoin('users','notes.users_id', '=', 'users.id')
        ->where('notes.id', '=', $id) 
        ->get();
        return $sql;     
    }

    public static function comments($id) {
       
        $sql= DB::table('notes')
        ->select('notes.id','users.*','note_comments.*')
        ->leftjoin('note_comments','note_comments.note_id', '=', 'notes.id')
        
        ->leftjoin('users','users.id', '=', 'notes.users_id')
        ->where('note_comments.note_id', '=', $id) 
        ->get();
        return $sql;      
    }

}
