<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class BankAccountSetup extends Model
{
    protected $table = 'banks';
    public $timestamps = false;

    protected $fillable = [
        'bank_name',
        'branch_name',
        'address',
        'account_name',
        'account_number' 
    ];

    public static function add_bank_account(String $bank_name, String $branch_name, String $address, String $account_name, String $account_number)
    {
        $data = array('bank_name' => $bank_name, 'branch_name'=> $branch_name, 'address'=> $address, 'account_name'=> $account_name, 'account_number'=> $account_number);

      return DB::table('banks')->insert($data);
    }

}
