<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenditureStatement;

class ExpenditureStatementController extends Controller
{
    public function index(){
        $get_all_payable = ExpenditureStatement::select_categories();

        $total_amount = 0;
        $get_all_categories = array();

        if (count($get_all_payable) > 0) {
            foreach ($get_all_payable as $categories) {
                $category_name = $categories->report_category;
                $get_all_under_each_categories = ExpenditureStatement::select_all_under_each_category($category_name);

                $count_category_array = (count($get_all_under_each_categories));
                $amount = 0;

                for ($i=0; $i < $count_category_array; $i++) {
                    $amount = (double)$amount + (double)$get_all_under_each_categories[$i]->amount;
                }
                $total_amount = (double)$total_amount + (double)$amount;
                // dump($category_name.'  =  '.$amount);

                array_push( $get_all_categories, ['category_name' => $category_name, 'total_amount'=> $amount]);
            }
        }


        // dump('Total Amount  ==  '.$total_amount);
        // dump($get_all_categories);

        $all_data = json_encode($get_all_categories);

        return view('pages.expenditure_statement', compact('all_data', 'total_amount'));
    }
}
