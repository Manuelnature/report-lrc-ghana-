<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ApprovePayable extends Model
{
    protected $table = 'tbl_payable';
    public $timestamps = false;

    protected $fillable = [
        'date',
        'payable_type',
        'amount',
        'comment',
        'status',
        'prepared_by',
        'entered_by',
        'reviewed_by',
        'approved_by'

    ];

    public static function select_all_reviewed_payables(){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('transaction_type', '=', 'Payable')
            ->where('status', '=', 'Reviewed')
            ->where('reference_number', '=', NULL)
            ->get();
    }

     public static function select_all_reviewed_cheque_payables(){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('transaction_type', '=', 'Payable')
            ->where('status', '=', 'Reviewed')
            ->where('reference_number', '!=', NULL)
            ->get();
    }

    public static function approve_reviewed_payables(String $id){
        return  DB::table('tbl_payable')
            ->where('id', '=', $id)
            ->update(['status'=>'Approved']);
    }

    public static function reject_reviewed_payables(String $id){
        return  DB::table('tbl_payable')
            ->where('id', '=', $id)
            ->update(['status'=>'Rejected']);
    }

    public static function approved_by(String $id, String $current_user){
        return  DB::table('tbl_payable')
            ->where('id', '=', $id)
            ->update(['approved_by'=>$current_user]);
    }

}
