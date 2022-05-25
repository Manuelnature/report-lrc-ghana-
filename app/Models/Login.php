<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Login extends Model
{
    protected $table = 'tbl_users';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'password',
    ];

    public static function user_login(String $email, String $password){
        
        $condition = array();
        if($email != null && !empty($email)){
            array_push($condition, ['email', '=', $email]);   
        }
         
        if($password != null && !empty($password)){
            array_push($condition, ['password', '=', $password]);   
        }

        return DB::table('tbl_users')
        ->select('tbl_users.*')
        ->where($condition)
        ->get();

    }

    public static function user_set_password(String $email){
        return DB::table('tbl_users')
            ->select('tbl_users.*')
            ->where('email', '=', $email)
            ->get();
    }
}
