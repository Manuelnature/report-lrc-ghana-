@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <center><h4>Trial Balance Report</h4></center>
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
                            <table id="trial_balance_report_dataTable" class="table table-centered dt-responsive " style="border-collapse: collapse; border-spacing: 0;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Category</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        {{-- <th>Remark</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (json_decode($all_data, true) as $data) 
                                        <tr>
                                            <td>
                                            {{$data['report_category']}} 
                                            </td>
                                            <td> 
                                                @php
                                                    if($data['transaction_type'] == 'Payable'){
                                                        echo number_format($data['payable_amount'],2);
                                                    }
                                                    else {
                                                        echo '-';
                                                    }
                                                @endphp  
                                            </td> 
                                            <td>
                                                @php
                                                    if($data['transaction_type'] == 'Receivable'){
                                                        echo number_format($data['payable_amount'],2);
                                                    }
                                                    else {
                                                        echo '-';
                                                    }
                                                @endphp
                                            </td>
                                            {{-- <td> 
                                                {{$data['transaction_type']}}
                                            </td>  --}}
                                        </tr>
                                    @endforeach 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                           <strong> Totals </strong>
                                        </td> 
                                            
                                        <td>
                                            <strong>{{$total_payable_amount}}</strong>
                                        </td>
                                        <td> 
                                            <strong>{{$total_receivable_amount}}</strong>
                                        </td> 
                                    </tr>
                                </tfoot>
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


