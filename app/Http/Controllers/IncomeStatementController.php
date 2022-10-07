<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeStatement;

class IncomeStatementController extends Controller
{
    public function index(){
        $get_all_donor_grants = IncomeStatement::get_donor_grant();
        $get_internally_generated_funds = IncomeStatement::get_internally_generated_fund();
        $get_other_incomes = IncomeStatement::get_other_income();
        // dd($other_incomes);

        $donor_amount = 0;
        foreach ($get_all_donor_grants as $donor_grant) {
            $donor_amount = ((double)$donor_amount) + ((double)$donor_grant->amount);
        }
        
        $internally_generated_amount = 0;
        foreach ($get_internally_generated_funds as $internally_generated_funds) {
            $internally_generated_amount = ((double)$internally_generated_amount) + ((double)$internally_generated_funds->amount);
        }

        $other_income_amount = 0;
        foreach ($get_other_incomes as $other_income) {
            $other_income_amount = ((double)$other_income_amount) + ((double)$other_income->amount);
        }
      
        $total_amount = ((double)$donor_amount) + ((double)$internally_generated_amount) + ((double)$other_income_amount);
        // dump($other_income_amount);
        // dump($total_amount);

        return view('pages.income_statement', compact('donor_amount', 'internally_generated_amount', 'other_income_amount', 'total_amount'));
    }
}
