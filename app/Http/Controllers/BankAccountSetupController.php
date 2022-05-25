<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\BankAccountSetup;

class BankAccountSetupController extends Controller
{
    function add_bank_details(Request $request){
        // dd($request->all());
        $bank_name = $request->get('txt_bank_name');
        $bank_branch = $request->get('txt_branch_name');
        $bank_address = $request->get('txt_bank_address');
        $account_name = $request->get('txt_account_name');
        $account_number = $request->get('txt_account_number');
        BankAccountSetup::add_bank_account($bank_name, $bank_branch, $bank_address, $account_name, $account_number);
        Alert::toast('Bank Account Added','success');
        return redirect('pages.bank_setup');
        
    }
}
