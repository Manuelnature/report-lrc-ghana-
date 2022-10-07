<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class IncomeStatement extends Model
{

    // Get Donor Grants
    public static function get_donor_grant(){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('transaction_type', '=', 'Receivable')
            ->where('report_category', '=', 'Donor Grant')
            ->orWhere('report_category', 'Donor grant')
            ->orWhere('report_category', 'donor grant')
            ->get();
    }


    // Get Internally Generated Fund
    public static function get_internally_generated_fund(){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('transaction_type', '=', 'Receivable')
            ->where('report_category', '=', 'Internally Generated Fund')
            ->orWhere('report_category', '=', 'Internally generated fund')
            ->get();
    }

    // Get Other Income
    public static function get_other_income(){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('transaction_type', '=', 'Receivable')
            ->where('report_category', '!=', 'Donor Grant')
            ->where('report_category', '!=', 'Internally Generated Fund')
            ->get();
    }
}
