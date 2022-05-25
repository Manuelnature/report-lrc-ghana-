<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ChequeDisbursement extends Model
{
    protected $table = 'tbl_payable';
    public $timestamps = false;

    protected $fillable = [
        'date',
        'payable_type',
        'transaction_type',
        'payment_type',
        'amount',
        'bank',
        'reference_number',
        'cheque_number',
        'account_name_and_number',
        'purpose',
        'status',
        'prepared_by',
        'entered_by',
        'reviewed_by',
        'approved_by'
    ];

    public static function add_cheque(String $date, String $payable_type, String $transaction_type, String $payment_type, String $amount, String $bank, String $reference_number, String $cheque_number, String $account_name_and_number, String $purpose, String $status, String $prepared_by, String $entered_by)
    {
        // $data = array('bank' => $bank, 'cheque_date'=> $cheque_date, 'amount'=> $amount, 'reference_number'=> $reference_number, 'cheque_number'=> $cheque_number, 'purpose'=> $purpose, 'prepared_by'=> $prepared_by, 'entered_by'=> $entered_by, 'reviewed_by'=> $reviewed_by, 'approved_by'=> $approved_by);

        $data = array('date'=> $date, 'payable_type'=> $payable_type, 'transaction_type'=> $transaction_type, 'payment_type'=> $payment_type, 'amount'=> $amount, 'bank' => $bank, 'reference_number'=> $reference_number, 'cheque_number'=> $cheque_number, 'account_name_and_number'=> $account_name_and_number, 'purpose'=> $purpose, 'status'=> $status, 'prepared_by'=> $prepared_by, 'entered_by'=> $entered_by);

      return DB::table('tbl_payable')->insert($data);
    }

    public static function select_cheque(){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('reference_number', '!=', NULL)
            ->get();
    }

    public static function delete_cheque(String $id){
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

    public static function load_payment_accounts(){
            return DB::table('banks')
            ->get();
    }


}
