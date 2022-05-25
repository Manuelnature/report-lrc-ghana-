@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
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
                                <form enctype="multipart/form-data" method="POST" action="{{ route('project_setup_update', $project_to_edit->id) }}">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group mb-4 col-md-5">
                                          <label for="txt_edit_project_code">Code</label>
                                          <input type="text" class="form-control" id="txt_edit_project_code" name="txt_edit_project_code" value="{{ $project_to_edit->code }}" readonly>
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_edit_project_name">Name</label>
                                          <input type="text" class="form-control" id="txt_edit_project_name" name="txt_edit_project_name" value="{{ $project_to_edit->name }}">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-10">
                                          <label for="txt_edit_project_description">Description</label>
                                          <textarea class="form-control" name="txt_edit_project_description" id="txt_edit_project_description">{{ $project_to_edit->description }}</textarea>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                        <br><br>
                                    <div class="text-center">
                                        <button type="submit" name="btn_save_payable" class="btn btn_save_payable">Update</button>
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

@section('Menu_JS')
  <script src="{{ asset('assets/js/menuJS.js') }}" ></script>
@endsection


