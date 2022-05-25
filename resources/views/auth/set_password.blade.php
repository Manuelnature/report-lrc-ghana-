@extends('layouts.auth_base_template')

@section('auth')
   
	
    <div class="container-fluid login-container">
        <div class="p-4 d-flex">
                <div class="text-center set-password">
                    @foreach ($set_password_email_details as $set_password)
                    <p class="set-password">Set password for {{ $set_password->email }}</p>

                    <form class="set-password-form" enctype="multipart/form-data" method="POST" action="auth.set_password">
                    	 @csrf
                        <input type="hidden" name="txt_set_password_id" value="{{ $set_password->id }}">
                        <input type="hidden" name="txt_set_password_email" value="{{ $set_password->email }}">
                        <div class="auth-form-group-custom mb-4">
                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                            <label for="txt_set_password">Password</label>
                            <input type="password" class="form-control" id="txt_set_password" name="txt_set_password">
                             @if ($errors->has('txt_set_password'))
                                <span class="text-danger">{{ $errors->first('txt_set_password') }}</span>
                            @endif
                        </div>
                        <div class="auth-form-group-custom mb-4">
                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                            <label for="txt_confirm_set_password">Confirm Password</label>
                            <input type="password" class="form-control" id="txt_set_confirm_password" name="txt_set_confirm_password">
                             @if ($errors->has('txt_set_confirm_password'))
                                <span class="text-danger">{{ $errors->first('txt_set_confirm_password') }}</span>
                            @endif
                        </div>

                        <div class="mt-4 text-center">
                            <button class="btn btn-login w-md waves-effect waves-light" type="submit">Set Password</button>
                        </div>
                    </form>
                    <div class="mt-2">
                        <p>Back to<a href="/" class="fw-medium text-primary"> login </a> </p>
                    </div> 
                    @endforeach

                </div>    
        </div>
    </div>

@endsection