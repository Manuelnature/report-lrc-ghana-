<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Cashbook extends Model
{
    protected $table = 'tbl_payable';
    public $timestamps = false;

    public static function filter_response(String $date_from, String $date_to){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->whereBetween('date', [$date_from, $date_to])
            ->orderBy('date', 'asc')
            ->get();
    }
     public static function filter_previous_receivable(String $date_from){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('transaction_type', '=', 'Receivable')
            ->where('date', '<', $date_from)
            ->get();
    }
    public static function filter_previous_payable(String $date_from){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('transaction_type', '=', 'Payable')
            ->where('date', '<', $date_from)
            ->get();
    }

    // public static function filter_for_debit(String $date_from, String $date_to){
    //     return DB::table('tbl_payable')
    //         ->select('tbl_payable.*')
    //         ->where('transaction_type', '=', 'Payable')
    //         ->whereBetween('date', [$date_from, $date_to])
    //         ->get();
    // }

    // public static function filter_for_credit(String $date_from, String $date_to){
    //     return DB::table('tbl_payable')
    //         ->select('tbl_payable.*')
    //         ->where('transaction_type', '=', 'Receivable')
    //         ->whereBetween('date', [$date_from, $date_to])
    //         ->get();
    // }
    // public static function filter_for_amount(String $date_from, String $date_to){
    //     return DB::table('tbl_payable')
    //         ->select('tbl_payable.amount')
    //         ->where('transaction_type', '=', 'Receivable')
    //         ->whereBetween('date', [$date_from, $date_to])
    //         ->get();
    // }
}
