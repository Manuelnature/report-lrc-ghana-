<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Payable extends Model
{
    protected $table = 'tbl_payable';
    public $timestamps = false;

    protected $fillable = [
        'date',
        'payable_type',
        'transaction_type',
        'report_category',
        'payment_type',
        'project',
        'amount',
        'comment',
        'status',
        'entered_by' 
    ];

    public static function add_payable(String $date, String $payable_type, String $transaction_type, String $report_category, String $payment_type, String $project, String $amount, String $comment, String $status, String $entered_by)
    {
        $data = array('date' => $date, 'payable_type'=> $payable_type, 'transaction_type'=> $transaction_type, 'report_category'=> $report_category, 'payment_type'=> $payment_type, 'project'=> $project, 'amount'=> $amount, 'comment'=> $comment, 'status'=>$status, 'entered_by'=> $entered_by);

      return DB::table('tbl_payable')->insert($data);
    }

    public static function select_payable(){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('transaction_type', '=', 'Payable')
            ->where('payment_type', '=', 'Postpayment')
            ->where('reference_number', '=', NULL)
            ->get();
    }

    public static function delete_payable(String $id){
            return  DB::table('tbl_payable')
            ->where('id', '=', $id)
            ->delete();
    }

    public static function load_payables(){
            return DB::table('tbl_payable_setups')
            ->select('tbl_payable_setups.*')
            ->where('type', '=', 'Payable')
            ->get();
    }

    public static function load_projects(){
            return DB::table('tbl_payable_setups')
            ->select('tbl_payable_setups.*')
            ->where('type', '=', 'Project')
            ->get();
    }

    public static function select_report_category(String $payable_type){
        return DB::table('tbl_payable_setups')
            ->select('report_category')
            ->where('name', '=', $payable_type)
            ->get();
    }


}
