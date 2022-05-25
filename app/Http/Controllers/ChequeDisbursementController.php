<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ChequeDisbursement;
use Session;

class ChequeDisbursementController extends Controller
{
    public function index(){
        $all_cheque_records = ChequeDisbursement::select_cheque();
        $get_from_setups = ChequeDisbursement::load_payables();
        $get_payment_accounts = ChequeDisbursement::load_payment_accounts();
        return view('pages.cheque_disbursement', compact('all_cheque_records', 'get_from_setups', 'get_payment_accounts'));
    }

    public function add_cheque(Request $request){
        // dd($request->all());
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;
        // dd($active_user);

        $payment_account = $request->get('txt_payment_account');
        $bank = $request->get('txt_cheque_bank');
        $reference_number = $request->get('txt_cheque_reference_number');
        $cheque_number = $request->get('txt_cheque_number');
        $purpose = $request->get('txt_cheque_purpose');
        $cheque_amount = $request->get('txt_cheque_amount');
        $cheque_date = $request->get('txt_cheque_date');
        $cheque_payable_type = $request->get('txt_cheque_payable_type');
        $prepared_by = $request->get('txt_cheque_prepared_by');
        $entered_by = $active_user;
        $status = 'Created';
        // $reviewed_by = "";
        // $approved_by = "";
        $transaction_type = 'Payable';
        $payment_type = 'Postpayment';
        

        // ChequeDisbursement::add_cheque($bank, $reference_number, $cheque_number, $purpose, $cheque_amount, $cheque_date, $prepared_by, $entered_by, $reviewed_by, $approved_by);

        ChequeDisbursement::add_cheque($cheque_date, $cheque_payable_type, $transaction_type, $payment_type, $cheque_amount, $bank, $reference_number, $cheque_number, $payment_account, $purpose, $status, $prepared_by, $entered_by);

        Alert::toast('Cheque Record Added','success');
       
        return redirect('pages.cheque_disbursement');
    }

    public function edit_cheque($id){
        $cheque_to_edit = ChequeDisbursement::find($id);
        $get_from_setups = ChequeDisbursement::load_payables();
        return view('pages.cheque_disbursement_edit', compact('cheque_to_edit'), compact('get_from_setups'));
    }

    public function update_cheque(Request $request, $id){
        $update_cheque = ChequeDisbursement::find($id);
        $update_cheque->bank = $request->get('txt_edit_cheque_bank');
        $update_cheque->reference_number = $request->get('txt_edit_cheque_reference_number');
        $update_cheque->cheque_number = $request->get('txt_edit_cheque_number');
        $update_cheque->purpose = $request->get('txt_edit_cheque_purpose');
        $update_cheque->amount = $request->get('txt_edit_cheque_amount');
        $update_cheque->date = $request->get('txt_edit_cheque_date');
        $update_cheque->payable_type = $request->get('txt_edit_cheque_payable_type');
        $update_cheque->prepared_by = $request->get('txt_edit_cheque_prepared_by');
        $update_cheque->save();

        Alert::toast('Records Successfully Updated','success');
        return redirect('pages.cheque_disbursement');
    }

    public function delete_cheque($id){
        $delete_cheque_id = ChequeDisbursement::delete_cheque($id);
        
        Alert::toast('Record Deleted','warning');
        return redirect('pages.cheque_disbursement');
     }

}
