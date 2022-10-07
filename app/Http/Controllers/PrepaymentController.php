<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Prepayment;
use Session;

class PrepaymentController extends Controller
{
    public function index(){
        $all_prepaids = Prepayment::select_prepaid();
        $get_from_setups = Prepayment::load_payables();
        $get_projects = Prepayment::load_projects();
        return view('pages.prepayment', compact('all_prepaids', 'get_from_setups', 'get_projects'));
    }

    public function add_prepaid(Request $request){
        $request->validate([
        'txt_prepaid_date' => 'required',
        'txt_prepaid_payable_type' => 'required',
        'txt_prepaid_amount' => 'required|numeric',
        'txt_prepaid_payable_project' => 'required',
        'txt_prepaid_comment' => 'required'
        ], [
        'txt_prepaid_date.required' => 'Prepaid date is required',
        'txt_prepaid_payable_type.required' => 'Prepaid type is required',
        'txt_prepaid_amount.required' => 'Amount is required',
        'txt_prepaid_amount.numeric' => 'Enter amount in numbers without comma(,)',
        'txt_prepaid_payable_project.required' => 'Project is required',
        'txt_prepaid_comment.required' => 'Comment is required',
    ]);
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;

        $date = $request->get('txt_prepaid_date');
        $payable_type = $request->get('txt_prepaid_payable_type');
        $amount = $request->get('txt_prepaid_amount');
        // $amount = floatval(preg_replace('/[^\d.]/', '', $amount)); //Removes comma from the amount entered
        $project = $request->get('txt_prepaid_payable_project');
        $comment = $request->get('txt_prepaid_comment');
        $status = 'Created';
        $entered_by = $active_user;
        $transaction_type = 'Payable';
        $payment_type = "Prepayment";

        $prepaid_details = Prepayment::add_prepaid($date, $payable_type, $transaction_type, $payment_type, $project, $amount, $comment, $status, $entered_by);

        Alert::toast('Prepaid Record Added','success');
       
        return redirect('pages.prepayment');
    }

    public function edit_prepaid($id){
        $prepaid_to_edit = Prepayment::find($id);
        $get_from_setups = Prepayment::load_payables();
        return view('pages.prepayment_edit', compact('prepaid_to_edit'), compact('get_from_setups'));
    }

    public function update_prepaid(Request $request){
        $request->validate([
        'txt_edit_prepaid_date' => 'required',
        'txt_edit_prepaid_payable_type' => 'required',
        'txt_edit_prepaid_amount' => 'required|numeric',
        'txt_edit_prepaid_payable_project' => 'required',
        'txt_edit_prepaid_comment' => 'required',
        'txt_prepaid_receipt_number' => 'required',
        'txt_prepaid_receipt_amount' => 'required'
        ], [
        'txt_edit_prepaid_date.required' => 'Prepaid date is required',
        'txt_edit_prepaid_payable_type.required' => 'Prepaid type is required',
        'txt_edit_prepaid_amount.required' => 'Amount is required',
        'txt_prepaid_amount.numeric' => 'Enter amount in numbers without comma(,)',
        'txt_edit_prepaid_payable_project.required' => 'Project is required',
        'txt_edit_prepaid_comment.required' => 'Comment is required',
        'txt_prepaid_receipt_number.required' => 'Prepaid receipt number is required',
        'txt_prepaid_receipt_amount.required' => 'Prepaid amount is required',
    ]);
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;

        $date = $request->get('txt_edit_prepaid_date');
        $payable_type = $request->get('txt_edit_prepaid_payable_type');
        $amount = $request->get('txt_edit_prepaid_amount');
        $project = $request->get('txt_edit_prepaid_payable_project');
        $comment = $request->get('txt_edit_prepaid_comment');
        $prepaid_receipt_number = $request->get('txt_prepaid_receipt_number');
        $prepaid_receipt_amount = $request->get('txt_prepaid_receipt_amount');
        $entered_by = $active_user;
        $transaction_type = 'Payable';
        $transaction_id = $request->get('transaction_id');
        $status = $request->get('status');
        $reviewed_by = $request->get('reviewed_by');
        $approved_by = $request->get('approved_by');
        $payment_type = "Prepayment";

        $prepaid_update_details = Prepayment::update_prepaid($date, $payable_type, $transaction_type, $transaction_id, $payment_type, $project, $amount, $comment, $prepaid_receipt_number, $prepaid_receipt_amount, $status, $entered_by, $reviewed_by, $approved_by);

        Alert::toast('Prepaid Record Updated','success');
       
        return redirect('pages.prepayment');
    }
}
