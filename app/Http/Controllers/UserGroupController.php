<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UserGroup;

class UserGroupController extends Controller
{
    public function index(){
        $all_users = UserGroup::select_users();
        return view('pages.user_group', compact('all_users'));
    }

    public function assign_group(Request $request){
        // dd($request->all());
        $user_id = $request->get('txt_user_id');
        $user_new_group = $request->get('txt_user_new_group');
        UserGroup::update_user_group($user_id, $user_new_group);

        Alert::toast('User Group Updated','success');
        return redirect('pages.user_group');  
    }
}
