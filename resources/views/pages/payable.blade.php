@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <center><h4>Payable Records</h4></center>
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
                                <form enctype="multipart/form-data" method="POST" action="pages.payable">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-5 mb-4">
                                          <label for="txt_payable_date">Date</label>
                                          <input type="date" class="form-control" id="txt_payable_date" name="txt_payable_date" value="{{ old('txt_payable_date') }}">
                                          <span class="text-danger">@error('txt_payable_date') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_payable_type">Payable Type</label>
                                          <select class="form-select" aria-label="Default select example" name="txt_payable_type" id="txt_payable_type">
                                                <option disabled="disabled" selected>Select payable type</option>
                                                @foreach($get_from_setups as $payable_names)
                                                    <option value="{{ $payable_names->name }}">{{ $payable_names->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('txt_payable_type') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-5 mb-4">
                                          <label for="txt_payable_amount">Amount</label>
                                          <input type="text" class="form-control" id="txt_payable_amount" name="txt_payable_amount" value="{{ old('txt_payable_amount') }}">
                                          <span class="text-danger">@error('txt_payable_amount') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_payable_project">Project</label>
                                          <select class="form-select" aria-label="Default select example" name="txt_payable_project" id="txt_payable_project">
                                                <option disabled="disabled" selected="">Select Project</option>
                                                @foreach($get_projects as $projects)
                                                    <option value="{{ $projects->name }}">{{ $projects->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('txt_payable_project') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-10">
                                          <label for="txt_payable_comment">Comment</label>
                                          <textarea class="form-control" name="txt_payable_comment" id="txt_payable_comment" placeholder="Add comment here">{{ old('txt_payable_comment') }}</textarea>
                                          <span class="text-danger">@error('txt_payable_comment') {{ $message }} @enderror</span>
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
                                        <!-- <th style="width: 20px;">
                                            <div class="form-checkbox">
                                                <input type="checkbox" class="form-check-input" id="ordercheck">
                                                <label class="form-check-label mb-0" for="ordercheck">&nbsp;</label>
                                            </div>
                                        </th> -->
                                        <th>Date</th>
                                        <th>Payable Type</th>
                                        <th>Amount</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th>Entered By</th>
                                        <th>Reviewed By</th>
                                        <th>Approved By</th>
                                        <th>Date Recorded</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_payables as $payable_records)
                                    <tr>
                                       <!--  <td>
                                            <div class="form-checkbox">
                                                <input type="checkbox" class="form-check-input" id="ordercheck1">
                                                <label class="form-check-label mb-0" for="ordercheck1">&nbsp;</label>
                                            </div>
                                        </td> -->
                                        
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">{{ $payable_records->date }}</a> </td>
                                        <td>{{ $payable_records->payable_type }}</td>
                                        <td>¢ {{ $payable_records->amount }}</td>
                                        <td>{{ $payable_records->comment }}</td>
                                        <td>{{ $payable_records->status }}</td>
                                        <td>{{ $payable_records->entered_by }}</td>
                                        <td>
                                            @php
                                                if($payable_records->reviewed_by == NULL || $payable_records->reviewed_by == ""){
                                                    echo 'No review yet';
                                                }
                                                else {
                                                    echo $payable_records->reviewed_by;
                                                }
                                           
                                            @endphp
                                        </td>
                                        <td>@php
                                                if($payable_records->approved_by == NULL || $payable_records->approved_by == ""){
                                                    echo 'No approval yet';
                                                }
                                                else {
                                                    echo $payable_records->approved_by;
                                                }
                                           
                                            @endphp</td>
                                        <td>{{ $payable_records->date_and_time }}</td>
                                        <td class="payable_action_td">
                                            <a href="{{ route('payable_edit',$payable_records->id) }}" class="me-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                            <form method="POST" action="{{ route('payable_delete',$payable_records->id) }}">
                                                @csrf

                                                <!-- <button type="submit" class="text-danger delete_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></button> -->

                                                <!-- <input name="_method" type="hidden" value="DELETE"> -->


                                                <!-- <button type="submit" class="text-danger delete_button show_confirm" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></button> --> 
                                            </form>

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

@section('Menu_JS')
  <script src="{{ asset('assets/js/menuJS.js') }}" ></script>
@endsection
@section('DataTable_JS')
  <script src="{{ asset('assets/js/customDataTable.js') }}" ></script>
@endsection

@section('DeleteAlert_JS')
  <script src="{{ asset('assets/js/deleteAlert.js') }}" ></script>
@endsection

@endsection




