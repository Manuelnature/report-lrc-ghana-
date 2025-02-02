@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <center><h4>Receivable Setup</h4></center>
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
                                <form enctype="multipart/form-data" method="POST" action="pages.receivable_setup">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="form-group md-4 col-md-3">
                                          <label for="txt_receivable_code">Code</label>
                                          <input type="text" class="form-control" id="txt_receivable_code" name="txt_receivable_code" value="">
                                          <span class="text-danger">@error('txt_receivable_code') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_receivable_name">Receivable Name</label>
                                          <input type="text" class="form-control" id="txt_receivable_name" name="txt_receivable_name" value="">
                                          <span class="text-danger">@error('txt_receivable_name') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group col-md-4">
                                          <label for="txt_report_category">Report Category</label>
                                          <input type="text" class="form-control" id="txt_report_category" name="txt_report_category" value="{{ old('txt_report_category') }}">
                                          <span class="text-danger">@error('txt_report_category') {{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-10">
                                          <label for="txt_receivable_description">Description</label>
                                          <textarea class="form-control" name="txt_receivable_description" id="txt_receivable_description"></textarea>
                                          <span class="text-danger">@error('txt_receivable_description') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                        <br><br>
                                    <div class="text-center">
                                        <button type="submit" name="btn_save_receivable" class="btn btn_save_receivable">Save</button>

                                        <button type="reset" name="btn_clear_receivable" class="btn btn_clear_receivable">Clear</button>
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

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="user_dataTable" class="table table-centered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Code</th>
                                        <th>Receivable Name</th>
                                        <th>Description</th>
                                        <th>Report Category</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_receivable_setups as $all_receivables)
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">{{ $all_receivables->code }}</a> </td>
                                        <td> {{ $all_receivables->name }} </td>
                                        <td> {{ $all_receivables->description }} </td>
                                        <td> {{ $all_receivables->report_category }} </td>
                                        <td class="receivable_action_td">
                                            <a href="{{ route('receivable_setup_edit',$all_receivables->id) }}" class="me-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>

                                            <form method="POST" action="{{ route('receivable_setup_delete',$all_receivables->id) }}">
                                                @csrf
                                                <button type="submit" class="text-danger delete_button show_confirm" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></button>    
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


