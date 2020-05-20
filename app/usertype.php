<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class usertype extends Model
{
    public static function usernew(){
        $sql =usertype::select('id', 'user_type', 'status')->where('status','=', 1)->get();
        return $sql;
    }
}
