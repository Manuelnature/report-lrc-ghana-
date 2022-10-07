@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <center><h4>Expenditure Statement Report</h4></center>
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
                                        <th>Name</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (json_decode($all_data, true) as $data)
                                        <tr>
                                            <td>{{ $data['category_name']}}</td>
                                            <td>
                                                @php
                                                    echo number_format($data['total_amount'],2)
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                           <strong> Total </strong>
                                        </td>
                                        <td>
                                            <strong>
                                                @php
                                                    echo number_format($total_amount,2);
                                                @endphp
                                            </strong>
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


