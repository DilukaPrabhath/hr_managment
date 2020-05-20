<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class budget extends Model
{
    //budget admin home loard
    public static function budgethomeadmin(){
       
        $sql= DB::table('budgets')
        ->select('budgets.*', 'departments.department',DB::raw('FORMAT(budgets.cost,2) as costt'),DB::raw('DATE_FORMAT(budgets.created_at, "%d-%b-%Y") as date'))
        ->leftjoin('departments','budgets.department_id', '=', 'departments.id')
        ->whereIn('budgets.status',[1,3]) 
        //->where('budgets.head_id',$logedid)
        ->get();
        return $sql;     
    }

    public static function budgethomeapprove() {
        $sql= DB::table('budgets')
        ->select('budgets.*', 'departments.department',DB::raw('FORMAT(budgets.cost,2) as costt'),DB::raw('DATE_FORMAT(budgets.created_at, "%d-%b-%Y") as date'))
        ->leftjoin('departments','budgets.department_id', '=', 'departments.id')
        ->whereIn('budgets.status',[2]) 
        ->get();
        return $sql;     
    }

    //budget department head loard
    public static function budgethome() {
         $logedid = Auth::id();
        $sql= DB::table('budgets')
        ->select('budgets.*', 'departments.department',DB::raw('FORMAT(budgets.cost,2) as costt'),DB::raw('DATE_FORMAT(budgets.created_at, "%d-%b-%Y") as date'))
        ->leftjoin('departments','budgets.department_id', '=', 'departments.id')
        ->where('budgets.head_id',$logedid)
        ->get();
        return $sql;     
    }

    //budget loard settlement home
    public static function budgethomesettlement() {
         $logeddip = Auth::user()->department_id;
        $sql= DB::table('budgets')
        ->select('budgets.*', 'departments.department',DB::raw('FORMAT(budgets.cost,2) as costt'),DB::raw('DATE_FORMAT(budgets.created_at, "%d-%b-%Y") as date'))
        ->leftjoin('departments','budgets.department_id', '=', 'departments.id')
        ->whereIn('budgets.status',[3]) 
        ->where('budgets.department_id',$logeddip)
        ->get();
        return $sql;     
    }

    public static function budgethomesettlementsupr() {
        $logedid = Auth::id();
        $sql= DB::table('budgets')
        ->select('budgets.*', 'departments.department',DB::raw('FORMAT(budgets.cost,2) as costt'),DB::raw('DATE_FORMAT(budgets.created_at, "%d-%b-%Y") as date'))
        ->leftjoin('departments','budgets.department_id', '=', 'departments.id')
        ->whereIn('budgets.settlement',[2]) 
        ->get();
        return $sql;     
    }

    public static function budgethomesettlementadmin() {
        $sql= DB::table('budgets')
        ->select('budgets.*', 'departments.department',DB::raw('FORMAT(budgets.cost,2) as costt'),DB::raw('DATE_FORMAT(budgets.created_at, "%d-%b-%Y") as date'))
        ->leftjoin('departments','budgets.department_id', '=', 'departments.id')
        ->where('budgets.settlement', '=', '1') 
        ->get();
        return $sql;     
    }

    public static function budgetpreview($any) {
        $sql= DB::table('budgets')
        ->select('budgets.*', 'departments.department', 'a.reg_no AS usempn', 'a.first_name AS empname', 'b.first_name AS admname', 'c.first_name AS dephname' , 'd.first_name AS supname', 
        DB::raw('FORMAT(budgets.cost,2) as costt'),DB::raw('DATE_FORMAT(budgets.dep_head_date, "%d-%b-%Y") as dep_head_date'),DB::raw('DATE_FORMAT(budgets.adm_date, "%d-%b-%Y") as adm_date'),DB::raw('DATE_FORMAT(budgets.superadm_date, "%d-%b-%Y") as superadm_date'))
        ->leftjoin('departments','budgets.department_id', '=', 'departments.id')
        ->leftjoin('users as a','budgets.user_id', '=', 'a.id')
        ->leftjoin('users as b','budgets.adm_id', '=', 'b.id')
        ->leftjoin('users as c','budgets.head_id', '=', 'c.id')
        ->leftjoin('users as d','budgets.superadm_id', '=', 'd.id')
        ->where('budgets.id', '=', $any) 
        ->get();

        $sql1= DB::table('budget_comments')
        ->select('budget_comments.*',DB::raw('DATE_FORMAT(budget_comments.created_at, "%d-%b-%Y") as date'), 'users.first_name' , 'users.last_name')
        ->leftjoin('users','budget_comments.user_id', '=', 'users.id')
        ->where('budget_comments.budget_id', '=' , $any) 
        ->get();

        $data = array(
            'budget' => $sql,
            'comment' => $sql1 
        );


        return $data;
        
    }

}
