<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ReviewReceivable;
use Session;

class ReviewReceivableController extends Controller
{
    public function index(){
        $all_created_receivables = ReviewReceivable::select_all_created_receivables();
        return view('pages.review_receivable', compact('all_created_receivables'));
    }

    public function approve_created_receivable($id){
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;
        ReviewReceivable::approve_receivables($id);
        ReviewReceivable::reviewed_by($id, $active_user);
        Alert::toast('Record Approved','success');
        return redirect('pages.review_receivable');
    }

    public function reject_created_receivable($id){
        $user_session = Session::get('user_session');
        $active_user = $user_session[0]->first_name.' '.$user_session[0]->last_name;
        ReviewReceivable::reject_receivables($id);
        ReviewReceivable::reviewed_by($id, $active_user);
        Alert::toast('Record Rejected','warning');
        return redirect('pages.review_receivable');
    }
}
