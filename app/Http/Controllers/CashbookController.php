<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Cashbook;
use Session;

class CashbookController extends Controller
{
    public function index(){ 
        return view('pages.cashbook');
    }
    public function view_report(){ 
        return view('pages.cashbook_report');
    }

    public function get_dates(Request $request){ 
        
        $date_from = $request->get('txt_date_from');
        $date_to = $request->get('txt_date_to');

        if($date_from != "" && $date_to != ""){

            $filter_result = Cashbook::filter_response($date_from, $date_to);
            $filter_previous_receivable = Cashbook::filter_previous_receivable($date_from);
            $filter_previous_payable = Cashbook::filter_previous_payable($date_from);
             // dd($filter_result);
            $count_result = count($filter_result);
            
            if($count_result != 0){

                $total_payable_amount = 0;
                foreach($filter_previous_payable as $payable){
                    $total_payable_amount = $total_payable_amount + $payable->amount ;
                }

                $total_receivable_amount = 0;
                foreach($filter_previous_receivable as $receivable){
                    $total_receivable_amount = $total_receivable_amount + $receivable->amount ;
                }
              
                $opening_balance = $total_receivable_amount - $total_payable_amount;
              
                $balance_accumulator = $opening_balance;
               
                return view('pages.cashbook_report', compact('filter_result', 'balance_accumulator'));
                }
                else{
                   Alert::toast('There is no data between this date range!!','warning');
                   return back(); 
                }  
        }
        else {
            Alert::toast('Both fields are required!!','warning');
            return back();
        }
        
    }
}
