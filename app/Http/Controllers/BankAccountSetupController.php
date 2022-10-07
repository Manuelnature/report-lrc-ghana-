<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\BankAccountSetup;

class BankAccountSetupController extends Controller
{
    function add_bank_details(Request $request){
        // dd($request->all());
        $request->validate([
            'txt_branch_name' => 'required',
            'txt_bank_address' => 'required',
            'txt_account_name' => 'required',
            'txt_account_number' => 'required|numeric',
            ], [
            'txt_branch_name.required' => 'Branch name is required',
            'txt_bank_address.required' => 'Bank address is required',
            'txt_account_name.required' => 'Account name is required',
            'txt_account_number.required' => 'Account number is required',
            'txt_account_number.numeric' => 'Account number must not include text'
        ]);
        $bank_name = $request->get('txt_bank_name');
        $bank_branch = $request->get('txt_branch_name');
        $bank_address = $request->get('txt_bank_address');
        $account_name = $request->get('txt_account_name');
        $account_number = $request->get('txt_account_number');
        BankAccountSetup::add_bank_account($bank_name, $bank_branch, $bank_address, $account_name, $account_number);
        Alert::toast('Bank Account Added','success');
        return redirect('pages.bank_setup');

    }

    public function edit_bank_account_setup($id){
        $bank_account_to_edit = BankAccountSetup::find($id);
        // $get_bank_branches = BankAccountSetup::load_branch_names($bank_name);
        // dd($bank_account_to_edit[0]->bank_name);
        return view('pages.bank_account_setup_edit', compact('bank_account_to_edit'));
    }

    public function update_bank_account_setup(Request $request, $id){
        $update_bank_account_setup = BankAccountSetup::find($id);
        $update_bank_account_setup->branch_name = $request->get('txt_edit_branch_name');
        $update_bank_account_setup->address = $request->get('txt_edit_bank_address');
        $update_bank_account_setup->account_name = $request->get('txt_edit_account_name');
        $update_bank_account_setup->account_number = $request->get('txt_edit_account_number');
        $update_bank_account_setup->save();
        Alert::toast('Records Successfully Updated','success');
        return redirect('pages.bank_setup');
    }

    public function delete_bank_account_setup($id){
    
        BankAccountSetup::delete_bank_account_setup($id);
        
        Alert::toast('Record Deleted','warning');
        return redirect('pages.bank_setup');
     }
}
