<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ReviewReceivable extends Model
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

    public static function select_all_created_receivables(){
        return DB::table('tbl_payable')
            ->select('tbl_payable.*')
            ->where('transaction_type', '=', 'Receivable')
            ->where('status', '=', 'Created')
            ->get();
    }

    public static function approve_receivables(String $id){
        return  DB::table('tbl_payable')
            ->where('id', '=', $id)
            ->update(['status'=>'Reviewed']);
    }

    public static function reject_receivables(String $id){
        return  DB::table('tbl_payable')
            ->where('id', '=', $id)
            ->update(['status'=>'Rejected']);
    }

    public static function reviewed_by(String $id, String $current_user){
        return  DB::table('tbl_payable')
            ->where('id', '=', $id)
            ->update(['reviewed_by'=>$current_user]);
    }
}
