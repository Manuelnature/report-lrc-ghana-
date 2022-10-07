@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <center><h4>Cash Book Report</h4></center>
        </div>
        <!-- end page title -->

        @php
            $user_session_details = Session::get('user_session');
        @endphp

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="cashbook_report_dataTable" class="table table-centered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Cheque Number</th>
                                        <th>Entry Particulars</th>
                                        <th>Entry Details</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$filter_result[0]->date}}</td>
                                        <td></td>
                                        <td></td>
                                        <td><strong>Opening Balance </strong></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $balance_accumulator }}</td>
                                    </tr>
                                    @foreach($filter_result as $result)
                                    <tr>
                                        
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold"></a>{{$result->date}} </td>
                                        <td>{{$result->cheque_number}}</td>
                                        <td>{{$result->payable_type}}</td>
                                        <td>
                                            @php
                                                if($result->purpose != NULL || $result->purpose != ""){
                                                    echo $result->purpose;
                                                }
                                                else{
                                                    echo $result->comment;
                                                }
                                           
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                if($result->transaction_type == "Payable"){
                                                    echo $result->amount;
                                                }
                                                else {
                                                    echo '-';
                                                }
                                           
                                            @endphp  
                                        </td>
                                        <td>
                                            @php
                                                if($result->transaction_type == "Receivable"){
                                                    echo $result->amount;
                                                }
                                                else {
                                                    echo '-';
                                                }
                                            @endphp  
                                        </td>

                                        <td>
                                         @php
                                            if($result->transaction_type == "Receivable"){
                                                $balance_accumulator = (double)$balance_accumulator + (double)($result->amount); 
                                            }
                                            else if($result->transaction_type == "Payable"){
                                                $balance_accumulator = ((double)$balance_accumulator) - ((double)($result->amount));     
                                            } 
                                            else{
                                                $balance_accumulator = (double)$balance_accumulator;
                                            }        
                                            echo $balance_accumulator;  

                                        @endphp

                                        </td> 
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>      
            </div>

        </div>

    </div>                  
</div>
@endsection

@section('DataTable_JS')
  <script src="{{ asset('assets/js/customDataTable.js') }}" ></script>
@endsection

@section('DeleteAlert_JS')
  <script src="{{ asset('assets/js/deleteAlert.js') }}" ></script>
@endsection


