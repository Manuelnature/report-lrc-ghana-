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
                                <form enctype="multipart/form-data" method="POST" action="{{ route('bankSetup') }}">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-2 mb-4"></div>
                                        <div class="form-group mb-4 col-md-8">
                                          <label for="txt_bank_name">Bank Name</label>
                                          <select class="form-select txt_bank_name" aria-label="Default select example" name="txt_bank_name" id="txt_bank_name" data-dependent="txt_branch_name">
                                                <option disabled="disabled" selected="">Select Bank</option>
                                                @foreach($all_banks as $bank_details)
                                                <option value="{{ $bank_details->bank_id }}">{{ $bank_details->bank_name }}</option>  
                                                @endforeach
                                           </select>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    
                                    
                                    <div class="text-center">
                                        <button type="submit" name="btn_save_payable" class="btn btn_save_payable">Send</button>

                                       <!--  <button type="reset" name="btn_clear_payable" class="btn btn_clear_payable">Clear</button> -->
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
            <div class="col-xl-1"></div>

            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="user_dataTable" class="table table-centered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-checkbox">
                                                <input type="checkbox" class="form-check-input" id="ordercheck">
                                                <label class="form-check-label mb-0" for="ordercheck">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Account Name</th>
                                         <th>Account Number</th>
                                         <th>Bank Name</th>
                                        <th>Branch Name</th>
                                        <th>Address</th>
                                         <th>Date Entered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_banks_with_details as $all_bank_details)
                                    <tr>
                                        <td>
                                            <div class="form-checkbox">
                                                <input type="checkbox" class="form-check-input" id="ordercheck1">
                                                <label class="form-check-label mb-0" for="ordercheck1">&nbsp;</label>
                                            </div>
                                        </td>
                                        
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold"></a> {{ $all_bank_details->account_name }}</td>
                                        <td> {{ $all_bank_details->account_number }}</td>
                                        <td> {{ $all_bank_details->bank_name }} </td>
                                        <td> {{ $all_bank_details->branch_name }}</td>
                                        <td> {{ $all_bank_details->address }} </td>
                                        <td> {{ $all_bank_details->date_entered }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>      
            </div>

            <div class="col-xl-1"></div>
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
<!-- @section('BankNames_JS')
<script src="{{ asset('assets/js/bankDetails.js') }}" ></script>
@endsection -->


