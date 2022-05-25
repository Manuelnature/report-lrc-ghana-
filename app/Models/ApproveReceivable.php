<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ApproveReceivable extends Model
{
    protected $table = 'tbl_payable';
    public $timestamps = false;

    protected $fillable = [
        'date',
        'payable_type',
        'amount',
        'comment',
        'status',
        'entered_by' 
    ];

    public static function select_all_reviewed_receivables(){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('transaction_type', '=', 'Receivable')
            ->where('status', '=', 'Reviewed')
            ->get();
    }

    public static function approve_reviewed_receivables(String $id){
        return  DB::table('tbl_payable')
            ->where('id', '=', $id)
            ->update(['status'=>'Approved']);
    }

    public static function reject_reviewed_receivables(String $id){
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
