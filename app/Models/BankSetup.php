<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class BankSetup extends Model
{
    protected $table = 'tbl_banks';
    public $timestamps = false;

    protected $fillable = [
        'bank_name'
        // 'branch',
        // 'address' 
    ];

     // public static function select_banks(){
     //    return DB::table('banks')
     //        ->groupBy('bank_name')
     //        ->get();

     public static function select_banks(){
         return DB::table('tbl_banks')
           ->get();
    }

    public static function select_all_banks_with_details(){
         return DB::table('banks')
           ->get();
    }

    // return DB::table('tbl_banks')
    //         ->select('tbl_banks.*', 'tbl_bank_branches.*')
    //         ->join('tbl_bank_branches', 'tbl_bank_branches.bank_id', '=', 'tbl_banks.id')
    //         ->get();
    // }

    public static function select_branches(String $id){
        return DB::table('tbl_banks')
            ->select('tbl_banks.*', 'tbl_bank_branches.*')
            ->join('tbl_bank_branches', 'tbl_bank_branches.bank_id', '=', 'tbl_banks.bank_id')
            ->where('tbl_banks.bank_id', '=', $id)
            ->get();
    }

    // return  DB::table('tbl_properties')
    //         ->select('tbl_properties.*', 'tbl_property_images.*', )
    //         ->join('tbl_property_images', 'tbl_property_images.prop_id', '=', 'tbl_properties.id')
    //         ->where('tbl_properties.id', '=', $id)
    //         ->get();
}
