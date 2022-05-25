@extends('layouts.auth_base_template')

@section('auth')
   
    <div class="container-fluid login-container">
        <div class="p-4 d-flex">
                <div class="text-center sign-in">
                    
                    <p class="text-muted font-size-18 p-12 ">Sign In</p>

                    <form class="login-form" enctype="multipart/form-data" method="POST" action="auth.login">
                       @csrf
                        <div class="mb-3 auth-form-group-custom mb-4">
                            <i class="ri-user-3-line auti-custom-input-icon"></i>
                            <label for="txt_email">Email</label>
                            <input type="email" class="form-control" name="txt_email" id="txt_email" placeholder="">
                        </div>

                        <div class="mb-3 auth-form-group-custom mb-4">
                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                            <label for="txt_password">Password</label>
                            <input type="password" class="form-control" name="txt_password" id="txt_password" placeholder="" >
                        </div>

                        <div class="mt-4 text-center">
                            <button class="btn btn-login w-md waves-effect waves-light" type="submit" name="btn_login">Login</button>
                            <!-- <button type="submit" name="login" class="btn btn-info">Login</button> -->
                        </div>
                    </form>
                    <!-- <div class="mt-2">
                        <p>New User? <a href="/auth.set_password" class="fw-medium text-primary"> Click to set password </a> </p>
                    </div> -->
                </div>    
        </div>
    </div>
    

@endsection

