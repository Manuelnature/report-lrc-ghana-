<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ApprovePayable;
use Session;

class ApprovePayableController extends Controller
{
    public function index(){
        $all_reviewed_payables = ApprovePayable::select_all_reviewed_payables();
        $all_reviewed_cheque_payables = ApprovePayable::select_all_reviewed_cheque_payables();
        return view('pages.approve_payable', compact('all_reviewed_payables'), compact('all_reviewed_cheque_payables'));
    }

    public function approve_reviewed_payable($id){
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;
        ApprovePayable::approve_reviewed_payables($id);
        ApprovePayable::approved_by($id, $active_user);
        Alert::toast('Record Approved','success');
        return redirect('pages.approve_payable');
    }

    public function reject_reviewed_payable($id){
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;
        ApprovePayable::reject_reviewed_payables($id);
        ApprovePayable::approved_by($id, $active_user);
        Alert::toast('Record Rejected','warning');
        return redirect('pages.approve_payable');
    }
}
