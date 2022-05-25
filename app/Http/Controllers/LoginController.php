<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Login;
use Session;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login_user(Request $request)
    {

        $email = $request->txt_email;
        $password = $request->txt_password;

        if(!empty($password)){

            $login_data = Login::user_login($email, $password)->toArray();

            // dd($login_data);
            
            $rows = count($login_data);
                if($rows > 0){   

                    //=== Setting up a session ==//
                    Session::put('user_session', $login_data);

                    Alert::toast(' Log In Successfully','success');
                    return redirect('pages.dashboard');
                   // return redirect()->intended('pages.user_setup');

                }
                    
                elseif($rows > 1){
                    Alert::toast('Email or Password Incorrect','warning');
                    return redirect('/');  
                    }

                else{
                    Alert::toast('Email or Password Incorrect','warning');
                    return redirect('/');
                }
        }
        else {
            $set_password_email_details = Login::user_set_password($email)->toArray();

            // dd($set_password_email[0]->password);
            if($set_password_email_details[0]->password == ""){
                Alert::toast('New user! Set up Password','success');
                return view('auth.set_password', compact('set_password_email_details'));
            }
            else{
                Alert::toast('Enter Password to Login','warning');

               return redirect('/'); 
            }
            
        }

    }


    public function logout_user(Request $request){

        $request->session()->forget('user_session');

        return redirect('/');

    }

}
