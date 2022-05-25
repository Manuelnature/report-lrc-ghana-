@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <center><h4>Select Date Range</h4></center>
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
                                <form enctype="multipart/form-data" method="POST" action="{{ route('getDates')}}">
                                    @csrf
                                    <div class="row mb-5">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-5 mb-4">
                                          <label for="txt_date_from">From</label>
                                          <input type="date" class="form-control" id="txt_date_from" name="txt_date_from" value="">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_date_to">To</label>
                                          <input type="date" class="form-control" id="txt_date_to" name="txt_date_to" value="">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" name="btn_generate_report" class="btn btn_generate_report">Generate Report</button>
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



