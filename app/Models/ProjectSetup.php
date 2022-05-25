<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ProjectSetup extends Model
{
    protected $table = 'tbl_payable_setups';
    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
        'description',
        'type' 
    ];

    public static function add_project(String $code, String $name, String $description, String $type)
    {
        $data = array('code' => $code, 'name'=> $name, 'description'=> $description, 'type'=> $type);

      return DB::table('tbl_payable_setups')->insert($data);
      
    }

    public static function select_project(){
        return DB::table('tbl_payable_setups')
            ->select('tbl_payable_setups.*')
            ->where('type', '=', 'Project')
            ->get();
    }

    public static function delete_project(String $id){
            return  DB::table('tbl_payable_setups')
            ->where('id', '=', $id)
            ->delete();
        }
}
