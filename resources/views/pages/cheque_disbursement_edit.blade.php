@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <center><h4>Cheque Disbursement Form</h4></center>
        </div>
        <!-- end page title -->

        @php
            $user_session_details = Session::get('user_session');
        @endphp
        <div class="row">
            <div class="col-xl-1">
            </div>

            <div class="col-xl-10">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <br>
                                <form enctype="multipart/form-data" method="POST" action="{{ route('cheque_disbursement_update', $cheque_to_edit->id) }}">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <label for="txt_edit_cheque_bank" class="col-form-label col-md-1 label_for_to">To</label>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text" placeholder="" name="txt_edit_cheque_bank" id="txt_edit_cheque_bank" value="{{ $cheque_to_edit->bank }}">
                                        </div>
                                        <div class="col-md-3"></div>  
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_edit_cheque_reference_number">Reference Number</label>
                                          <input type="text" class="form-control" id="txt_edit_cheque_reference_number" name="txt_edit_cheque_reference_number" value="{{ $cheque_to_edit->reference_number }}">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_edit_cheque_number">Cheque Number</label>
                                          <input type="text" class="form-control" id="txt_edit_cheque_number" name="txt_edit_cheque_number" value="{{ $cheque_to_edit->cheque_number }}">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-10">
                                          <label for="txt_edit_cheque_purpose">Purpose</label>
                                          <textarea class="form-control" name="txt_edit_cheque_purpose" id="txt_edit_cheque_purpose" placeholder="Enter Purpose here">{{ $cheque_to_edit->purpose }}</textarea>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_edit_cheque_amount">Amount</label>
                                          <input type="text" class="form-control" id="txt_edit_cheque_amount" name="txt_edit_cheque_amount" value="{{ $cheque_to_edit->amount }}">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_edit_cheque_date">Cheque Date</label>
                                          <input type="date" class="form-control" id="txt_edit_cheque_date" name="txt_edit_cheque_date" value="{{ $cheque_to_edit->date }}">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-4">
                                          <label for="txt_edit_cheque_payable_type">Payable Type</label>
                                          <select class="form-select" aria-label="Default select example" name="txt_edit_cheque_payable_type" id="txt_edit_cheque_payable_type">
                                                <option selected="{{ $cheque_to_edit->payable_type }}">{{ $cheque_to_edit->payable_type }}</option>
                                                @foreach($get_from_setups as $payable_names)
                                                    <option value="{{ $payable_names->name }}">{{ $payable_names->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="txt_edit_cheque_prepared_by">Prepared By</label>
                                          <input type="text" class="form-control" id="txt_edit_cheque_prepared_by" name="txt_edit_cheque_prepared_by" value="{{ $cheque_to_edit->prepared_by }}">
                                        </div>
                                        <div class="col-md-1"></div>
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

@section('Menu_JS')
  <script src="{{ asset('assets/js/menuJS.js') }}" ></script>
@endsection
@section('DataTable_JS')
  <script src="{{ asset('assets/js/customDataTable.js') }}" ></script>
@endsection

@section('DeleteAlert_JS')
  <script src="{{ asset('assets/js/deleteAlert.js') }}" ></script>
@endsection


