<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\BankSetup;


class BankSetupController extends Controller
{
    public function index(){
        $all_banks = BankSetup::select_banks();
        $all_banks_with_details = BankSetup::select_all_banks_with_details();
        return view('pages.bank_setup', compact('all_banks'), compact('all_banks_with_details'));
    }

    function get_bank_name(Request $request){
        $request->validate([
            'txt_bank_name' => 'required'
            ], [
            'txt_bank_name.required' => 'Bank name is required'
        ]);
        $bank_id = $request->get('txt_bank_name');
        $bank_details = BankSetup::select_branches($bank_id);
        $bank_name = $bank_details[0]->bank_name;
        // dd($bank_name);
        return view('pages.bank_account_setup', compact('bank_details'), compact('bank_name'));
        
    }

    


    // public function get_branches(Request $request){
    //     $all_branches = BankSetup::select_branches($id);
    //     dd($all_branches);
    //     // return json_encode($all_branches);
    // }

    // function getBankName(Request $request){
    //     $id = $request->id;
    //     dd($id);
    //     $data = BankSetup::select_branches($id);
    //     return response()->json($data);
    // }
}
