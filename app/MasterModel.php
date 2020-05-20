<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterModel extends Model
{
    //
    public static function selectMaster($table, $where =null, $value= null){
        
        if($where == null && $value == null){
            $sql= DB::table($table)->get();
        }
        else{
            $sql= DB::table($table)->where($where, $value)->get();
        }
        return $sql;
    }
}
