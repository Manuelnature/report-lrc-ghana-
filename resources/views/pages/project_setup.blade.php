@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <center><h4>Project Setup</h4></center>
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
                                <form enctype="multipart/form-data" method="POST" action="{{ route('add_project') }}">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group mb-4 col-md-5">
                                          <label for="txt_project_code">Code</label>
                                          <input type="text" class="form-control" id="txt_project_code" name="txt_project_code" value="">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_project_name">Name</label>
                                          <input type="text" class="form-control" id="txt_project_name" name="txt_project_name" value="">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-1"></div>
                                        <div class="form-group col-md-10">
                                          <label for="txt_project_description">Description</label>
                                          <textarea class="form-control" name="txt_project_description" id="txt_project_description"></textarea>
                                        </div>
                                        <div class="form-group col-md-1"></div>
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
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_project_setups as $project_setups)
                                    <tr>
                                        <td>
                                            <div class="form-checkbox">
                                                <input type="checkbox" class="form-check-input" id="ordercheck1">
                                                <label class="form-check-label mb-0" for="ordercheck1">&nbsp;</label>
                                            </div>
                                        </td>
                                        
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold"></a>{{ $project_setups->code }} </td>
                                        <td>{{ $project_setups->name }}</td>
                                        <td>{{ $project_setups->description }} </td>
                                        <td class="payable_action_td">
                                            <a href="{{ route('project_setup_edit',$project_setups->id)}}" class="me-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                            <form method="POST" action="{{ route('project_setup_delete',$project_setups->id)}}">
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


