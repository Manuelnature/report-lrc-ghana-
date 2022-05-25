<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ReceivableSetup extends Model
{
    protected $table = 'tbl_payable_setups';
    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
        'description',
        'type' 
    ];

    public static function add_receivable(String $code, String $name, String $description, String $type)
    {
        $data = array('code' => $code, 'name'=> $name, 'description'=> $description, 'type'=> $type);

      return DB::table('tbl_payable_setups')->insert($data);
      
    }

    public static function select_receivable(){
        return DB::table('tbl_payable_setups')
            ->select('tbl_payable_setups.*')
            ->where('type', '=', 'Receivable')
            ->get();
    }

    public static function delete_receivable(String $id){
            return  DB::table('tbl_payable_setups')
            ->where('id', '=', $id)
            ->delete();
        }
}
