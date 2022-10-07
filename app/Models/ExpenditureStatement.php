<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpenditureStatement extends Model
{
    public static function select_categories(){
        return DB::table('tbl_payable')
            ->select('report_category')
            ->where('transaction_type', '=', 'Payable')
            ->groupBy('report_category')
            ->get();
    }

    public static function select_all_under_each_category(String $category_name){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('report_category', '=', $category_name)
            ->get();
    }


}
