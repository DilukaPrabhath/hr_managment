<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class settlement extends Model
{
    //settlement preview  
    public static function settlmntpreview($any) {
        $sql= DB::table('settlements')
        ->select('settlements.*' , 'a.first_name AS fcredby', 'a.last_name AS lcredby', DB::raw('DATE_FORMAT(settlements.user_date, "%d-%b-%Y") as cdate'),
        DB::raw('DATE_FORMAT(settlements.admin_date, "%d-%b-%Y") as adate'), 'b.first_name AS afcredby', 'b.last_name AS alcredby')
        ->leftjoin('users as a','settlements.user_id', '=', 'a.id') 
        ->leftjoin('users as b','settlements.adm_id', '=', 'b.id') 
        ->where('settlements.budget_id', '=', $any) 
        ->get();
        return $sql;
    }

}
