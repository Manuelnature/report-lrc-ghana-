<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class TrialBalance extends Model
{
    // protected $table = 'tbl_payable_setups';

    public static function select_category(){
        return DB::table('tbl_payable_setups')
            ->select('tbl_payable_setups.*')
            // ->whereNotIn('tbl_payable_setups.report_category', NULL)
            ->where('report_category', '!=', NULL)
            ->groupBy('report_category')
            ->get();
    }


    public static function select_payable_categories(String $report_category){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('transaction_type', '=', 'Payable')
            ->where('report_category', '=', $report_category)
            ->get();
    }

    public static function select_receivable_categories(String $report_category){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('transaction_type', '=', 'Receivable')
            ->where('report_category', '=', $report_category)
            ->get();
    }





    public static function get_from_setup(String $payable_type){

        return DB::table('tbl_payable_setups')
            ->select('tbl_payable_setups.*')
            ->where('report_category', '!=', NULL)
            ->where('name', '=', $payable_type)
            ->get();
    }

    public static function get_payable_report(){

        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('transaction_type', '=', 'Payable')
            ->groupBy('payable_type')
            ->get();
    }

    public static function get_report_category(String $report_category){

        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('report_category', '=', $report_category)
            ->get();
    }


}
