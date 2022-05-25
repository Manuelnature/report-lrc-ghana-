<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UserSetup;

class UserSetupController extends Controller
{
    public function index(){
        return view('pages.user_setup');
    }

    public function store(Request $request){

        $request->validate([
                'txt_first_name' => 'required',
                'txt_last_name' => 'required',
                'txt_department' => 'required',
                'txt_email' => 'required|email|unique:tbl_users,email'
                ], [
                'txt_first_name.required' => 'Firstname is required',
                'txt_last_name.required' => 'Lastname is required',
                'txt_department.required' => 'Department name is required',
                'txt_email.required' => 'Email is required',
                'txt_email.email' => 'Email field must have a valid email address',
                'txt_email.unique' => 'Email already exist'
            ]);

        $first_name = $request->get('txt_first_name');
        $last_name = $request->get('txt_last_name');
        $email = $request->get('txt_email');
        $password = "";
        // $password = $request->get('txt_password');
        $department = $request->get('txt_department');

        UserSetup::register_user($first_name, $last_name, $email, $password, $department);

        Alert::toast($first_name.' Added Successfully','success');

        return redirect('pages.user_setup');

    }
}
