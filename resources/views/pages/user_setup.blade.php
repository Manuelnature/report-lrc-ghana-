@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-3">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add New user</h4>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-1"></div>

            <div class="col-xl-10">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form enctype="multipart/form-data" method="POST" action="pages.user_setup">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="form-group col-md-1"></div>
                                        <div class="form-group col-md-5 mb-4">
                                          <label for="txt_first_name">First Name</label>
                                          <input type="text" class="form-control" id="txt_first_name" name="txt_first_name" value="{{ old('txt_first_name') }}">
                                          <span class="text-danger">@error('txt_first_name') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_last_name">Last Name</label>
                                          <input type="text" class="form-control" id="txt_last_name" name="txt_last_name" value="{{ old('txt_last_name') }}">
                                          <span class="text-danger">@error('txt_last_name') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group col-md-1"></div>
                                    </div>
                                
                                    <div class="row mb-4">
                                        <div class="form-group col-md-1"></div>
                                        <div class="form-group col-md-4 mb-4">
                                          <label for="txt_email">Email Address</label>
                                          <input type="text" class="form-control" id="txt_email" name="txt_email" value="{{ old('txt_email') }}">
                                          <span class="text-danger">@error('txt_email') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group col-md-4 mb-4">
                                          <label for="txt_department">Department</label>
                                          <input type="text" class="form-control" id="txt_department" name="txt_department" value="{{ old('txt_department') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                          <label for="txt_user_group">Assign Group</label>
                                          <select class="form-select" aria-label="Default select example" name="txt_user_group" id="txt_user_group">
                                            <option disabled="disabled" selected="">Select Group</option>
                                            <option value="Preparer">Preparer</option>
                                            <option value="Reviewer">Reviewer</option>
                                            <option value="Approver">Approver</option>
                                          </select>
                                          <span class="text-danger">@error('txt_user_group') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group col-md-1"></div>
                                    </div>
                                        
                                    <div class="text-center">
                                        <button type="submit" name="add_user" class="btn btn-add-user">Add User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-1"></div>
        </div>
        <!-- end row -->

    </div>                  
</div>


@endsection

@section('Menu_JS')
  <script src="{{ asset('assets/js/menuJS.js') }}" ></script>
@endsection
