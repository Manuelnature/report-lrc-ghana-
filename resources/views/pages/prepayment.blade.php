@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <center><h4>Prepayment</h4></center>
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
                                <form enctype="multipart/form-data" method="POST" action="{{route('add_prepaid')}}">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-5 mb-4">
                                          <label for="txt_prepaid_date">Date</label>
                                          <input type="date" class="form-control" id="txt_prepaid_date" name="txt_prepaid_date" value="{{ old('txt_prepaid_date') }}">
                                          <span class="text-danger">@error('txt_prepaid_date') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_prepaid_payable_type">Payable Type</label>
                                          <select class="form-select" aria-label="Default select example" name="txt_prepaid_payable_type" id="txt_prepaid_payable_type">
                                                <option disabled="disabled" selected="">Select payable type</option>
                                                @foreach($get_from_setups as $payable_names)
                                                    <option value="{{ $payable_names->name }}">{{ $payable_names->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('txt_prepaid_payable_type') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-5 mb-4">
                                          <label for="txt_prepaid_amount">Amount</label>
                                          <input type="text" class="form-control" id="txt_prepaid_amount" name="txt_prepaid_amount" value="{{ old('txt_prepaid_amount') }}">
                                          <span class="text-danger">@error('txt_prepaid_amount') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_prepaid_payable_project">Project</label>
                                          <select class="form-select" aria-label="Default select example" name="txt_prepaid_payable_project" id="txt_prepaid_payable_project">
                                                <option disabled="disabled" selected="">Select Project</option>
                                                @foreach($get_projects as $projects)
                                                    <option value="{{ $projects->name }}">{{ $projects->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('txt_prepaid_payable_project') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-10">
                                          <label for="txt_prepaid_comment">Comment</label>
                                          <textarea class="form-control" name="txt_prepaid_comment" id="txt_prepaid_comment" placeholder="Add comment here">{{ old('txt_prepaid_comment') }}</textarea>
                                          <span class="text-danger">@error('txt_prepaid_comment') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                        <br><br>
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

        <div class="row">
            <!-- <div class="col-xl-1"></div> -->

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="user_dataTable" class="table table-centered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Payable Type</th>
                                        <th>Project</th>
                                        <th>Amount</th>
                                        <th>Prepaid Receipt No</th>
                                        <th>Prepaid Amount</th>
                                        <th>Status</th>
                                        <th>Entered By</th>
                                        <th>Reviewed By</th>
                                        <th>Approved By</th>
                                        <th>Date Recorded</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_prepaids as $prepaid_records)
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">{{ $prepaid_records->date }}</a> </td>
                                        <td>{{ $prepaid_records->payable_type }}</td>
                                        <td>{{ $prepaid_records->project }}</td>
                                        <td>¢ {{ $prepaid_records->amount }}</td>
                                        <td>
                                            @php
                                                if($prepaid_records->prepaid_receipt_number == NULL || $prepaid_records->prepaid_receipt_number == ""){
                                                    echo '-';
                                                }
                                                else {
                                                    echo $prepaid_records->prepaid_receipt_number;
                                                }
                                           
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                if($prepaid_records->prepaid_receipt_amount == NULL || $prepaid_records->prepaid_receipt_amount == ""){
                                                    echo '-';
                                                }
                                                else {
                                                    echo "¢ ".$prepaid_records->prepaid_receipt_amount;
                                                }
                                           
                                            @endphp
                                        </td>
                                        <td>{{ $prepaid_records->status }}</td>
                                        <td>{{ $prepaid_records->entered_by }}</td>
                                        <td>
                                            @php
                                                if($prepaid_records->reviewed_by == NULL || $prepaid_records->reviewed_by == ""){
                                                    echo 'No review yet';
                                                }
                                                else {
                                                    echo $prepaid_records->reviewed_by;
                                                }
                                           
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                if($prepaid_records->approved_by == NULL || $prepaid_records->approved_by == ""){
                                                    echo 'No approval yet';
                                                }
                                                else {
                                                    echo $prepaid_records->approved_by;
                                                }
                                           
                                            @endphp
                                        </td>
                                        <td>{{ $prepaid_records->date_and_time }}</td>
                                        <td class="payable_action_td">
                                            @php
                                                if($prepaid_records->status == "Approved"){
                                                    
                                                    @endphp
                                                    <a href="{{ route('prepayment_edit',$prepaid_records->id) }}" class="me-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-reply-line font-size-18"></i></a>
                                                @php
                                                    
                                                }
                                                else {
                                                    echo 'No Action';
                                                }
                                           
                                            @endphp

                                            <!-- <a href="{{ route('prepayment_edit',$prepaid_records->id) }}" class="me-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-reply-line font-size-18"></i></a> -->
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


