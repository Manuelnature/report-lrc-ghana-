@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <center><h4>Payable Review</h4></center>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4">Payable by Cash</h5>
                        <div class="table-responsive">
                            <table id="user_dataTable" class="table table-centered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Payable Type</th>
                                        <th>Amount</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th>Entered By</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_created_payables as $all_payables)
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold"></a> {{ $all_payables->date }} </td>
                                        <td>{{ $all_payables->payable_type }}</td>
                                        <td>¢ {{ $all_payables->amount }}</td>
                                        <td>{{ $all_payables->comment }}</td>
                                        <td>{{ $all_payables->status }}</td>
                                        <td>{{ $all_payables->entered_by }}</td>
                                        <td class="payable_action_td">
                                            <form method="POST" action="{{ route('created_payable_approve',$all_payables->id) }}">
                                                @csrf
                                                <button type="submit" class="text-success approve_button fw-bold confirm_approve" data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve">Approve</button> 
                                            </form>
                                            <form method="POST" action="{{ route('created_payable_reject',$all_payables->id) }}">
                                                @csrf
                                                <button type="submit" class="text-danger reject_button fw-bold confirm_reject" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Reject">Reject</button> 
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
        </div>
        


        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4">Payable by Cheque</h5>
                        <div class="table-responsive">
                            <table id="user_dataTable1" class="table table-centered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Cheque Date</th>
                                        <th>Payable Type</th>
                                        <th>Bank</th>
                                        <th>Amount</th>
                                        <th>Ref No</th>
                                        <th>Cheque No</th>
                                        <th>Purpose</th>
                                        <th>Status</th>
                                        <th>Prepared By</th>
                                        <th>Entered By</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_created_cheque_payables as $all_cheque_payables)
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold"></a> {{ $all_cheque_payables->date }} </td>
                                        <td>{{ $all_cheque_payables->payable_type }}</td>
                                        <td>{{ $all_cheque_payables->bank }}</td>
                                        <td>¢ {{ $all_cheque_payables->amount }}</td>
                                        <td>{{ $all_cheque_payables->reference_number }}</td>
                                        <td>{{ $all_cheque_payables->cheque_number }}</td>
                                        <td>{{ $all_cheque_payables->purpose }}</td>
                                        <td>{{ $all_cheque_payables->status }}</td>
                                        <td>{{ $all_cheque_payables->prepared_by }}</td>
                                        <td>{{ $all_cheque_payables->entered_by }}</td>
                                        <td class="payable_action_td">
                                            <form method="POST" action="{{ route('created_payable_approve',$all_cheque_payables->id) }}">
                                                @csrf
                                                <button type="submit" class="text-success approve_button fw-bold confirm_approve" data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve">Approve</button> 
                                            </form>
                                            <form method="POST" action="{{ route('created_payable_reject',$all_cheque_payables->id) }}">
                                                @csrf
                                                <button type="submit" class="text-danger reject_button fw-bold confirm_reject" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Reject">Reject</button> 
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

        </div>

    </div>                  
</div>


@section('DataTable_JS')
  <script src="{{ asset('assets/js/customDataTable.js') }}" ></script>
@endsection

@section('DeleteAlert_JS')
  <script src="{{ asset('assets/js/deleteAlert.js') }}" ></script>
@endsection

@endsection




