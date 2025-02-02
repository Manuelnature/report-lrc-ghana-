<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class userSetup extends Model
{
    protected $table = 'tbl_users';
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'department',
        'user_group'
    ];

    public static function register_user(String $first_name, String $last_name, String $email, String $password, String $department, String $user_group)
    {
        $data = array('first_name' => $first_name, 'last_name'=> $last_name, 'email'=> $email, 'password'=> $password, 'department'=> $department, 'user_group'=> $user_group);

      return DB::table('tbl_users')->insert($data);
      
    }
}
