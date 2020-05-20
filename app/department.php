<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class department extends Model
{
    public static function departmentnew(){
        $sql =department::select('id', 'department', 'status')->where('status','=', 1)->get();
        return $sql;
    }

    public static function departmentnewhead(){
        $logeddip = Auth::user()->department_id;
        $sql =department::select('id', 'department', 'status')->where('id','=', $logeddip)->get();
        return $sql;
    }

    public static function departmenthome(){
        $sql= DB::table('departments')
        ->select('departments.*', DB::raw('DATE_FORMAT(departments.created_at, "%d-%b-%Y") as date'))
        ->get();
        return $sql;
    }

    public static function departmentpreview($any) {
        $sql= DB::table('departments')
        ->select('departments.*', DB::raw('DATE_FORMAT(departments.created_at, "%d-%b-%Y") as date'), 'b.first_name as cfnam',
         'b.first_name as cfnam', 'b.last_name as clnam')
        ->leftjoin('users as b','departments.created_by', '=', 'b.id')
        ->where('departments.id', '=', $any) 
        ->get();

        return $sql;
        
    }


}
