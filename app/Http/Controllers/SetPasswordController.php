<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SetPassword;

class SetPasswordController extends Controller
{
public function index(){
        return view('auth.set_password');
    }

    public function set_password(Request $request){
          

        $id = $request->get('txt_set_password_id');
        $email = $request->get('txt_set_password_email');
        $new_password= $request->get('txt_set_password');
        $confirm_new_password= $request->get('txt_set_confirm_password');

        
        if($new_password == $confirm_new_password){

            SetPassword::set_user_password($id, $new_password);
            Alert::toast('Password Set Successfully! Please Login.','success');
            return redirect('/');
        }
        else{

            $set_password_email_details = SetPassword::keep_user($id);
            Alert::toast('Passwords do not match, Reset!','warning');
            return view('auth.set_password', compact('set_password_email_details'));
            // redirect()->back()->getTargetUrl();
        }

        
    } //
}
