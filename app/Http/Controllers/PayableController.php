<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Payable;
use Session;

class PayableController extends Controller
{
     public function index(){
        $all_payables = Payable::select_payable();
        $get_from_setups = Payable::load_payables();
        $get_projects = Payable::load_projects();
        return view('pages.payable', compact('all_payables', 'get_from_setups', 'get_projects'));
    }

    public function add_payable(Request $request){
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;

        $date = $request->get('txt_payable_date');
        $payable_type = $request->get('txt_payable_type');
        $amount = $request->get('txt_payable_amount');
        $project = $request->get('txt_payable_project');
        $comment = $request->get('txt_payable_comment');
        $status = 'Created';
        $entered_by = $active_user;
        $transaction_type = 'Payable';
        $payment_type = 'Postpayment';

        $payable_details = Payable::add_payable($date, $payable_type, $transaction_type, $payment_type, $project, $amount, $comment, $status, $entered_by);

        Alert::toast('Payable Record Added','success');
       
        return redirect('pages.payable');
    }

    public function edit_payable($id){
        $payable_to_edit = Payable::find($id);
        $get_from_setups = Payable::load_payables();
        return view('pages.payable_edit', compact('payable_to_edit'), compact('get_from_setups'));
    }

    public function update_payable(Request $request, $id){
        $update_payable = Payable::find($id);
        $update_payable->date = $request->get('txt_edit_payable_date');
        $update_payable->payable_type = $request->get('txt_edit_payable_type');
        $update_payable->amount = $request->get('txt_edit_payable_amount');
        $update_payable->comment = $request->get('txt_edit_payable_comment');
        $update_payable->save();

        Alert::toast('Records Successfully Updated','success');
        return redirect('pages.payable');
    }

    public function delete_payable($id){
        $delete_payable_id = Payable::delete_payable($id);
        
        Alert::toast('Record Deleted','warning');
        return redirect('pages.payable');
     }
}
