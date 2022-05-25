<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ReviewPayable;
use Session;

class ReviewPayableController extends Controller
{
    public function index(){
        $all_created_payables = ReviewPayable::select_all_created_payables();
        $all_created_cheque_payables = ReviewPayable::select_all_created_cheque_payables();
        return view('pages.review_payable', compact('all_created_payables'), compact('all_created_cheque_payables'));
    }

    public function approve_created_payable($id){
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;
        ReviewPayable::approve_payables($id);
        ReviewPayable::reviewed_by($id, $active_user);
        Alert::toast('Record Approved','success');
        return redirect('pages.review_payable');
    }

    public function reject_created_payable($id){
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;
        ReviewPayable::reject_payables($id);
        ReviewPayable::reviewed_by($id, $active_user);
        Alert::toast('Record Rejected','warning');
        return redirect('pages.review_payable');
    }
}
