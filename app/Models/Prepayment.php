<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Prepayment extends Model
{
    protected $table = 'tbl_payable';
    public $timestamps = false;

    protected $fillable = [
        'date',
        'payable_type',
        'transaction_type',
        'transaction_id',
        'payment_type',
        'project',
        'prepaid_receipt_number',
        'prepaid_receipt_amount',
        'amount',
        'comment',
        'status',
        'entered_by',
        'reviewed_by',
        'approved_by'
    ];

    public static function add_prepaid(String $date, String $payable_type, String $transaction_type, String $payment_type, String $project, String $amount, String $comment, String $status, String $entered_by)
    {
        $data = array('date' => $date, 'payable_type'=> $payable_type, 'transaction_type'=> $transaction_type, 'payment_type'=> $payment_type, 'project'=> $project, 'amount'=> $amount, 'comment'=> $comment, 'status'=>$status, 'entered_by'=> $entered_by);

      return DB::table('tbl_payable')->insert($data);
    }

    public static function update_prepaid(String $date, String $payable_type, String $transaction_type, String $transaction_id, String $payment_type, String $project, String $amount, String $comment, String $prepaid_receipt_number, String $prepaid_receipt_amount, String $status, String $entered_by, String $reviewed_by, String $approved_by)
    {
        $data = array('date' => $date, 'payable_type'=> $payable_type, 'transaction_type'=> $transaction_type, 'transaction_id'=> $transaction_id, 'payment_type'=> $payment_type, 'project'=> $project, 'amount'=> $amount, 'comment'=> $comment, 'prepaid_receipt_number'=> $prepaid_receipt_number,'prepaid_receipt_amount'=> $prepaid_receipt_amount, 'status'=>$status, 'entered_by'=> $entered_by, 'reviewed_by'=> $reviewed_by, 'approved_by'=> $approved_by);

      return DB::table('tbl_payable')->insert($data);
    }

    public static function select_prepaid(){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('payment_type', '=', 'Prepayment')
            // ->where('status', '=', 'Approved')
            ->where('reference_number', '=', NULL)
            ->get();
    }

    public static function delete_prepaid(String $id){
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


}
