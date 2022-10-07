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
        // dd($request->all());
        $request->validate([
        'txt_payable_date' => 'required',
        'txt_payable_type' => 'required',
        'txt_payable_amount' => 'required|numeric',
        'txt_payable_project' => 'required',
        'txt_payable_comment' => 'required'
        ], [
        'txt_payable_date.required' => 'Payable date is required',
        'txt_payable_type.required' => 'Payable type is required',
        'txt_payable_amount.required' => 'Amount is required',
        'txt_payable_amount.numeric' => 'Enter amount in numbers without comma(,)',
        'txt_payable_project.required' => 'Project is required',
        'txt_payable_comment.required' => 'Comment is required',
    ]);
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;

        $date = $request->get('txt_payable_date');
        $payable_type = $request->get('txt_payable_type');

        $initial_report_category = Payable::select_report_category($payable_type);
        $report_category = $initial_report_category[0]->report_category;
        // dd( $report_category); 

        $amount = $request->get('txt_payable_amount');
        // $amount = floatval(preg_replace('/[^\d.]/', '', $amount)); //Removes comma from the amount entered
        // dd($amount);
        $project = $request->get('txt_payable_project');
        $comment = $request->get('txt_payable_comment');
        $status = 'Created';
        $entered_by = $active_user;
        $transaction_type = 'Payable';
        $payment_type = 'Postpayment';

        $payable_details = Payable::add_payable($date, $payable_type, $transaction_type, $report_category, $payment_type, $project, $amount, $comment, $status, $entered_by);

        Alert::toast('Payable Record Added','success');
       
        return redirect('pages.payable');
    }

    public function edit_payable($id){
        $payable_to_edit = Payable::find($id);
        $get_from_setups = Payable::load_payables();
        return view('pages.payable_edit', compact('payable_to_edit'), compact('get_from_setups'));
    }

    public function update_payable(Request $request, $id){
        // dd($request->all());
        $request->validate([
        'txt_edit_payable_date' => 'required',
        'txt_edit_payable_type' => 'required',
        'txt_edit_payable_amount' => 'required|numeric',
        'txt_edit_payable_project' => 'required',
        'txt_edit_payable_comment' => 'required'
        ], [
        'txt_edit_payable_date.required' => 'Payable date is required',
        'txt_edit_payable_type.required' => 'Payable type is required',
        'txt_payable_amount.required' => 'Amount is required',
        'txt_edit_payable_amount.numeric' => 'Enter amount in numbers without comma(,)',
        'txt_edit_payable_project.required' => 'Project is required',
        'txt_edit_payable_comment.required' => 'Comment is required',
    ]);
        $update_payable = Payable::find($id);
        $update_payable->date = $request->get('txt_edit_payable_date');
        $update_payable->payable_type = $request->get('txt_edit_payable_type');

        $payable_type = $request->get('txt_edit_payable_type');

        if ($request->get('txt_edit_report_category') != "" || $request->get('txt_edit_report_category') != NULL) {
            $update_payable->report_category = $request->get('txt_edit_report_category');
        }
        else {
            $initial_report_category = Payable::select_report_category($payable_type);
            $report_category = $initial_report_category[0]->report_category;

            $update_payable->report_category = $report_category;
        }
        $update_payable->amount = $request->get('txt_edit_payable_amount');
        $update_payable->project = $request->get('txt_edit_payable_project');
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
