<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class salary_advance_comment extends Model
{
    //
    public static function salarycomment($id) {
        $sql= DB::table('salary_advance_comments')
        ->select('salary_advance_comments.*', 'departments.department','users.reg_no','usertypes.*','salaryhisrory_models.*')
        ->leftjoin('departments','salary_advance_comments.dip_id', '=', 'departments.id')
        ->leftjoin('users','salary_advance_comments.user_id', '=', 'users.id')
        ->leftjoin('usertypes','salary_advance_comments.user_type_id', '=', 'usertypes.id')
        ->leftjoin('salaryhisrory_models','salary_advance_comments.salary_advance_id', '=', 'salaryhisrory_models.advase_id')
        ->where('salary_advance_comments.salary_advance_id', '=', $id)
        ->get();
        return $sql;     
    }
}
