<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\TrialBalance;
use Session;

class TrialBalanceController extends Controller
{

    public function index(){
        $get_all = TrialBalance::select_category();
        // dd($get_all);

        $get_all_payable_categories = array();

        $payable_total_amount = 0;
        $receivable_total_amount = 0;
        if(count($get_all) > 0){
            foreach($get_all as $category){
                if ($category->type == 'Payable') {
                    $get_payable_categories = TrialBalance::select_payable_categories($category->report_category);

                    $count_payable_array = (count($get_payable_categories));
                    $payable_amount = 0;
                    for ($i=0; $i < $count_payable_array; $i++) {

                        $payable_amount = $payable_amount + $get_payable_categories[$i]->amount;
                    }
                    // dump($payable_amount);

                    $payable_total_amount = $payable_total_amount + $payable_amount;


                    $payable_report_category = $category->report_category;
                    $payable_transaction_type = $category->type;

                    // dump('Payable total Amount== '.$payable_total_amount);
                    array_push( $get_all_payable_categories, ['payable_amount' => $payable_amount, 'report_category'=> $payable_report_category, 'transaction_type'=> $payable_transaction_type]);
                }

                elseif ($category->type == 'Receivable') {
                    $get_receivable_categories = TrialBalance::select_receivable_categories($category->report_category);

                    $count_receivable_array = (count($get_receivable_categories));
                    $receivable_amount = 0;
                    for ($i=0; $i < $count_receivable_array; $i++) {

                        $receivable_amount = $receivable_amount + $get_receivable_categories[$i]->amount;
                    }
                    // dump($receivable_amount);

                    $receivable_total_amount = $receivable_total_amount + $receivable_amount;

                    $receivable_report_category = $category->report_category;
                    $receivable_transaction_type = $category->type;
                    // dump('Receivable total Amount== '.$receivable_total_amount);
                    array_push( $get_all_payable_categories, ['payable_amount' => $receivable_amount, 'report_category'=> $receivable_report_category, 'transaction_type'=> $receivable_transaction_type]);
                }

            }
        }


        $total_payable_amount = $payable_total_amount;
        $total_receivable_amount = $receivable_total_amount;

        // dump( json_encode($get_all_payable_categories)) ;
        $all_data = json_encode($get_all_payable_categories);

        // dump($total_payable_amount);
        // dump($total_receivable_amount);

        return view('pages.trial_balance', compact('all_data', 'total_payable_amount', 'total_receivable_amount'));
    }

}
