<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class settlement_item extends Model
{
    //settlement item preview
    public static function settlmntpreview($any) {
        $sql= DB::table('settlement_items')
        ->select('settlement_items.*', 'settlement_items.amount as costt')
        ->leftjoin('settlements','settlements.id', '=', 'settlement_items.settlement_id')
        //->whereIn('settlements.status',[1,0]) 
        ->where('settlements.budget_id',$any) 
        ->get();
        return $sql;
    }
}
