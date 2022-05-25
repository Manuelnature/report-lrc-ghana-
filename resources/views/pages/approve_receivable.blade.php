@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <center><h4>Receivable Approval</h4></center>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
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
                                        <th>Reviewed By</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_reviewed_receivables as $all_receivables)
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold"></a>{{ $all_receivables->date }}</td>
                                        <td>{{ $all_receivables->payable_type }}</td>
                                        <td>¢ {{ $all_receivables->amount }}</td>
                                        <td>{{ $all_receivables->comment }}</td>
                                        <td>{{ $all_receivables->status }}</td>
                                        <td>{{ $all_receivables->entered_by }}</td>
                                        <td>{{ $all_receivables->reviewed_by }}</td>
                                        <td class="payable_action_td">
                                            <form method="POST" action="{{ route('reviewed_receivable_approve',$all_receivables->id) }}">
                                                @csrf
                                                <button type="submit" class="text-success approve_button fw-bold confirm_approve" data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve">Approve</button> 
                                            </form>
                                            <form method="POST" action="{{ route('reviewed_receivable_reject',$all_receivables->id) }}">
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


