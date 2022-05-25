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
                                <form enctype="multipart/form-data" method="POST" action="pages.cheque_disbursement">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-5 mb-4">
                                          <label for="txt_payment_account">Payment Account</label>
                                          <select class="form-select" aria-label="Default select example" name="txt_payment_account" id="txt_payment_account">
                                                <option disabled="disabled" selected="">Select Account</option>
                                                @foreach($get_payment_accounts as $payment_account)
                                                    <option value="{{ $payment_account->account_name }}  {{ $payment_account->account_number }}">
                                                        {{ $payment_account->account_name }}  {{ $payment_account->account_number }}
                                                    </option>
                                                @endforeach
                                          </select>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="txt_cheque_bank">To</label>
                                            <input class="form-control" type="text" placeholder="" name="txt_cheque_bank" id="txt_cheque_bank">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <!-- <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <label for="txt_cheque_bank" class="col-form-label col-md-1 label_for_to">To</label>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text" placeholder="" name="txt_cheque_bank" id="txt_cheque_bank">
                                        </div>
                                        <div class="col-md-3"></div>  
                                    </div> -->
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-5 mb-4">
                                          <label for="txt_cheque_reference_number">Reference Number</label>
                                          <input type="text" class="form-control" id="txt_cheque_reference_number" name="txt_cheque_reference_number" value="">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_cheque_number">Cheque Number</label>
                                          <input type="text" class="form-control" id="txt_cheque_number" name="txt_cheque_number" value="">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-10">
                                          <label for="txt_cheque_purpose">Purpose</label>
                                          <textarea class="form-control" name="txt_cheque_purpose" id="txt_cheque_purpose" placeholder="Enter Purpose here"></textarea>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-5 mb-4">
                                          <label for="txt_cheque_amount">Amount</label>
                                          <input type="text" class="form-control" id="txt_cheque_amount" name="txt_cheque_amount" value="">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_cheque_date">Cheque Date</label>
                                          <input type="date" class="form-control" id="txt_cheque_date" name="txt_cheque_date" value="">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-4 mb-4">
                                          <label for="txt_cheque_payable_type">Payable Type</label>
                                          <select class="form-select" aria-label="Default select example" name="txt_cheque_payable_type" id="txt_cheque_payable_type">
                                                <option disabled="disabled" selected="">Select payable type</option>
                                                @foreach($get_from_setups as $payable_names)
                                                    <option value="{{ $payable_names->name }}">{{ $payable_names->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="txt_cheque_prepared_by">Prepared By</label>
                                          <input type="text" class="form-control" id="txt_cheque_prepared_by" name="txt_cheque_prepared_by" value="">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="btn_save_payable" class="btn btn_save_payable">Submit</button>

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

        <div class="row">
            <!-- <div class="col-xl-1"></div> -->

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="user_dataTable" class="table table-centered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <!-- <th style="width: 20px;">
                                            <div class="form-checkbox">
                                                <input type="checkbox" class="form-check-input" id="ordercheck">
                                                <label class="form-check-label mb-0" for="ordercheck">&nbsp;</label>
                                            </div>
                                        </th> -->
                                        <th>Bank</th>
                                        <th>Cheque Date</th>
                                        <th>Amount</th>
                                        <th>Ref No</th>
                                        <th>Cheque No</th>
                                        <th>Payable Type</th>
                                        <th>Purpose</th>
                                        <th>Status</th>
                                        <th>Prepared By</th>
                                        <th>Entered By</th>
                                        <th>Reviewed By</th>
                                        <th>Approved By</th>
                                        <th>Date Recorded</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_cheque_records as $cheque_records)
                                    <tr>
                                        <!-- <td>
                                            <div class="form-checkbox">
                                                <input type="checkbox" class="form-check-input" id="ordercheck1">
                                                <label class="form-check-label mb-0" for="ordercheck1">&nbsp;</label>
                                            </div>
                                        </td> -->
                                        
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold"></a>{{$cheque_records->bank}} </td>
                                        <td>{{$cheque_records->date}}</td>
                                        <td>¢ {{$cheque_records->amount}}</td>
                                        <td>{{$cheque_records->reference_number}}</td>
                                        <td>{{$cheque_records->cheque_number}}</td>
                                        <td>{{$cheque_records->payable_type}}</td>
                                        <td>{{$cheque_records->purpose}}</td>
                                        <td>{{$cheque_records->status}}</td>
                                        <td>{{$cheque_records->prepared_by}}</td>
                                        <td>{{$cheque_records->entered_by}}</td>
                                        <td>
                                            @php
                                                if($cheque_records->reviewed_by == NULL || $cheque_records->reviewed_by == ""){
                                                    echo 'No review yet';
                                                }
                                                else {
                                                    echo $cheque_records->reviewed_by;
                                                }
                                           
                                            @endphp
                                        </td>
                                         <td>
                                            @php
                                                if($cheque_records->approved_by == NULL || $cheque_records->approved_by == ""){
                                                    echo 'No approval yet';
                                                }
                                                else {
                                                    echo $cheque_records->approved_by;
                                                }
                                           
                                            @endphp
                                        </td>
                                        <td>{{$cheque_records->date_and_time}}</td>
                                        <!-- <td>{{$cheque_records->approved_by}}</td> -->
                                        <td class="payable_action_td">
                                            <a href="{{ route('cheque_disbursement_edit',$cheque_records->id) }}" class="me-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                            <!-- <form method="POST" action="{{ route('cheque_disbursement_delete',$cheque_records->id) }}">
                                                @csrf
                                                <button type="submit" class="text-danger delete_button show_confirm" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></button> 
                                            </form>
 -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>      
            </div>

            <!-- <div class="col-xl-1"></div> -->
        </div>

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


