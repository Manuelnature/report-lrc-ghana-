<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Receivable;
use Session;

class ReceivableController extends Controller
{
    public function index(){
        $all_receivables = Receivable::select_receivable();
        $get_from_setups = Receivable::load_receivables();
        $get_projects = Receivable::load_projects();
        return view('pages.receivable', compact('all_receivables', 'get_from_setups', 'get_projects'));
    }

    public function add_receivable(Request $request){
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;

        $date = $request->get('txt_receivable_date');
        $payable_type = $request->get('txt_receivable_type');
        $amount = $request->get('txt_receivable_amount');
        $project = $request->get('txt_receivable_project');
        $comment = $request->get('txt_receivable_comment');
        $status = 'Created';
        $entered_by = $active_user;
        $transaction_type = 'Receivable';
        
        $receivable_details = Receivable::add_receivable($date, $payable_type, $transaction_type, $project, $amount, $comment, $status, $entered_by);

        Alert::toast('Receivable Record Added','success');
       
        return redirect('pages.receivable');
    }

    public function edit_receivable($id){
        $receivable_to_edit = Receivable::find($id);
        $get_from_setups = Receivable::load_receivables();
        return view('pages.receivable_edit', compact('receivable_to_edit'), compact('get_from_setups'));
    }

    public function update_receivable(Request $request, $id){
        $update_receivable = Receivable::find($id);
        $update_receivable->date = $request->get('txt_edit_receivable_date');
        $update_receivable->payable_type = $request->get('txt_edit_receivable_type');
        $update_receivable->amount = $request->get('txt_edit_receivable_amount');
        $update_receivable->comment = $request->get('txt_edit_receivable_comment');
        $update_receivable->save();

        Alert::toast('Records Successfully Updated','success');
        return redirect('pages.receivable');
    }

    public function delete_receivable($id){
        $delete_receivable_id = Receivable::delete_receivable($id);
        
        Alert::toast('Record Deleted','warning');
        return redirect('pages.receivable');
     }


}
