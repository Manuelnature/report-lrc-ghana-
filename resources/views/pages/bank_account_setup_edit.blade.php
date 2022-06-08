@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <center><h4>Edit Bank Account</h4></center>
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
                                <form enctype="multipart/form-data" method="POST" action="{{ route('bank_account_setup_update', $bank_account_to_edit->id)}}">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-1 mb-4"></div>
                                        <input type="hidden" name="txt_bank_name" value="{{$bank_account_to_edit->id}}">
                                        <div class="form-group col-md-5">
                                          <label for="txt_edit_branch_name">Branch Name</label>
                                          <input type="text" class="form-control" id="txt_edit_branch_name" name="txt_edit_branch_name" value="{{$bank_account_to_edit->branch_name}}" readonly>

                                          <!-- <select class="form-select dynamic" aria-label="Default select example" name="txt_edit_branch_name" id="txt_edit_branch_name">
                                             <option selected value="{{$bank_account_to_edit->branch_name}}">{{$bank_account_to_edit->branch_name}}</option> 
                                             
                                           </select> -->
                                        </div>
                                        
                                        <div class="form-group col-md-5">
                                          <label for="txt_edit_bank_address">Address</label>
                                          <textarea class="form-control" name="txt_edit_bank_address" id="txt_edit_bank_address">{{$bank_account_to_edit->address}}</textarea>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                            
                                    <div class="row mb-4">
                                        <div class="form-group col-md-1"></div>
                                        <div class="form-group col-md-5 mb-4">
                                          <label for="txt_edit_account_name">Account Name</label>
                                          <input type="text" class="form-control" id="txt_edit_account_name" name="txt_edit_account_name" value="{{$bank_account_to_edit->account_name}}">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_edit_account_number">Account Number</label>
                                          <input type="text" class="form-control" id="txt_edit_account_number" name="txt_edit_account_number" value="{{$bank_account_to_edit->account_number}}">
                                        </div>
                                        <div class="form-group col-md-1"></div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" name="btn_save_payable" class="btn btn_save_payable">Update</button>

                                        <!-- <button type="reset" name="btn_clear_payable" class="btn btn_clear_payable">Clear</button> -->
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



@section('DataTable_JS')
  <script src="{{ asset('assets/js/customDataTable.js') }}" ></script>
@endsection

@section('DeleteAlert_JS')
  <script src="{{ asset('assets/js/deleteAlert.js') }}" ></script>
@endsection
@section('BankNames_JS')
<script src="{{ asset('assets/js/bankDetails.js') }}" ></script>
@endsection


