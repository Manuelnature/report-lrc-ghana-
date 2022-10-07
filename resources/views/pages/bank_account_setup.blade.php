@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <center><h4>Bank Account Setup</h4></center>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-1">
            </div>

            <div class="col-xl-10">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <br>
                                <form enctype="multipart/form-data" method="POST" action="{{ route('addBank')}}">
                                    @csrf
                                    <div class="row mb-4">

                                        <div class="col-md-1 mb-4"></div>
                                        <input type="hidden" name="txt_bank_name" value="{{ $bank_name }}">
                                        <div class="form-group col-md-5">
                                          <label for="txt_branch_name">Branch Names</label>
                                          <select class="form-select dynamic" aria-label="Default select example" name="txt_branch_name" id="txt_branch_name">
                                             <option disabled="disabled" selected="">Select Branch Name</option> 
                                             @foreach($bank_details as $bank)
                                                <option value="{{ $bank->branch_name }}">{{ $bank->branch_name }}</option>  
                                                @endforeach   
                                           </select>
                                           <span class="text-danger">@error('txt_branch_name') {{ $message }} @enderror</span>
                                        </div>
                                        
                                        <div class="form-group col-md-5">
                                          <label for="txt_bank_address">Address</label>
                                          <textarea class="form-control" name="txt_bank_address" id="txt_bank_address"></textarea>
                                          <span class="text-danger">@error('txt_bank_address') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                            
                                    <div class="row mb-4">
                                        <div class="form-group col-md-1"></div>
                                        <div class="form-group col-md-5 mb-4">
                                          <label for="txt_account_name">Account Name</label>
                                          <input type="text" class="form-control" id="txt_account_name" name="txt_account_name" value="">
                                          <span class="text-danger">@error('txt_account_name') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_account_number">Account Number</label>
                                          <input type="text" class="form-control" id="txt_account_number" name="txt_account_number" value="">
                                          <span class="text-danger">@error('txt_account_number') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group col-md-1"></div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" name="btn_save_payable" class="btn btn_save_payable">Save</button>

                                        <button type="reset" name="btn_clear_payable" class="btn btn_clear_payable">Clear</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-1">
            </div>
        </div>
        <!-- end row -->

    </div>                  
</div>




@endsection


@section('Menu_JS')
  <script src="{{ asset('assets/js/menuJS.js') }}" ></script>
@endsection
@section('DataTable_JS')
  <script src="{{ asset('assets/js/customDataTable.js') }}" ></script>
@endsection

@section('DeleteAlert_JS')
  <script src="{{ asset('assets/js/deleteAlert.js') }}" ></script>
@endsection
@section('BankNames_JS')
<script src="{{ asset('assets/js/bankDetails.js') }}" ></script>
@endsection


