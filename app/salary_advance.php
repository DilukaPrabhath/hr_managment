<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class salary_advance extends Model
{
    //

    // public static function salary1() {
    //    $logedid = Auth::id();
    //     $sql= DB::table('salary_advances')
    //     ->select('salary_advances.*')
    //     ->get();
    //     return $sql;     
    // }
    public static function salary1() {
       $logdhid = Auth()->user()->department_id;
        $sql= DB::table('salary_advances')
        ->select('salary_advances.*', 'departments.department','users.reg_no')
        ->leftjoin('departments','salary_advances.department_id', '=', 'departments.id')
        ->leftjoin('users','salary_advances.user_id', '=', 'users.id')
        ->where('salary_advances.department_id', '=', $logdhid)
        ->get();
        return $sql;     
    }

    public static function salary2() {
       $logedid = Auth::id();
        $sql= DB::table('salary_advances')
        ->select('salary_advances.*', 'departments.department','users.reg_no')
        ->leftjoin('departments','salary_advances.department_id', '=', 'departments.id')
        ->leftjoin('users','salary_advances.user_id', '=', 'users.id')
        ->where('users.id', '=', $logedid)
        ->get();
        return $sql;     
    }

    public static function salary3($id) {
       
        $sql= DB::table('salary_advances')
        ->select('salary_advances.*', 'departments.department','users.reg_no')
        ->leftjoin('departments','salary_advances.department_id', '=', 'departments.id')
        ->leftjoin('users','salary_advances.user_id', '=', 'users.id')
        ->where('salary_advances.id', '=', $id)
        ->get();
        return $sql;     
    }
    public static function salary4() {
       
        $sql= DB::table('salary_advances')
        ->select('salary_advances.*', 'departments.department','users.reg_no')
        ->leftjoin('departments','salary_advances.department_id', '=', 'departments.id')
        ->leftjoin('users','salary_advances.user_id', '=', 'users.id')
        ->whereIn('salary_advances.approve1',  [1, 3 ,5 ,6])
        ->get();
        return $sql;     
    }

    public static function salary5() {
       
        $sql= DB::table('salary_advances')
        ->select('salary_advances.*', 'departments.department','users.reg_no')
        ->leftjoin('departments','salary_advances.department_id', '=', 'departments.id')
        ->leftjoin('users','salary_advances.user_id', '=', 'users.id')
        ->whereIn('salary_advances.approve2',  [1, 3 ,6])
        ->get();
        return $sql;     
    }
}
