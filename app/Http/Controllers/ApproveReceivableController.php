<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ApproveReceivable;
use Session;

class ApproveReceivableController extends Controller
{
    public function index(){
        $all_reviewed_receivables = ApproveReceivable::select_all_reviewed_receivables();
        return view('pages.approve_receivable', compact('all_reviewed_receivables'));
    }

    public function approve_reviewed_receivable($id){
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;
        ApproveReceivable::approve_reviewed_receivables($id);
        ApproveReceivable::approved_by($id, $active_user);
        Alert::toast('Record Approved','success');
        return redirect('pages.approve_receivable');
    }

    public function reject_reviewed_receivable($id){
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;
        ApproveReceivable::reject_reviewed_receivables($id);
        Alert::toast('Record Rejected','warning');
        ApproveReceivable::approved_by($id, $active_user);
        return redirect('pages.approve_receivable');
    }
}
