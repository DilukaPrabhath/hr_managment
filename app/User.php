<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function emptlist(){
        $sql1 =user::select('id', 'first_name')->where('status','=', 1)->get();
        return $sql1;     
    }

    public static function emptlisthead(){
        $logeddip = Auth::user()->department_id;
        $sql1 =user::select('id', 'first_name')->where('department_id','=', $logeddip)->get();
        return $sql1;     
    }

    public static function employeenew(){
        $sql= DB ::table('users')
        ->select('users.*')
        ->where('status','!=', 0)
        ->get();
        return $sql;
    }

    public static function employeepreview($any){
        $sql= DB::table('users')
        ->select('users.*', 'departments.department', 'emp_bank_details.user_id', 'emp_bank_details.bank_name', 'emp_bank_details.branch', 'emp_bank_details.account_name', 'emp_bank_details.account_number', 
        'emp_bank_details.bsb', 'emp_bank_details.status', 'emp_bank_details.status')
        ->leftjoin('departments','users.department_id', '=', 'departments.id')
        ->leftjoin('emp_bank_details','users.id', '=', 'emp_bank_details.user_id')
        ->where('users.id','=', $any)
        ->get();
        return $sql; 

    }

    // user edit my profile
    public static function employeeprofile(){
        $logedid = Auth::id();
        $sql= DB::table('users')
        ->select('users.*', 'departments.department', 'emp_bank_details.user_id', 'emp_bank_details.bank_name', 'emp_bank_details.branch', 'emp_bank_details.account_name', 'emp_bank_details.account_number', 
        'emp_bank_details.bsb', 'emp_bank_details.status', 'emp_bank_details.status')
        ->leftjoin('departments','users.department_id', '=', 'departments.id')
        ->leftjoin('emp_bank_details','users.id', '=', 'emp_bank_details.user_id')
        ->where('users.id','=', $logedid)
        ->get();
        return $sql; 

    }
}
