@extends('layouts.portal_base_template')

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-3">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Change User Group</h4>
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
                                <form enctype="multipart/form-data" method="POST" action="{{ route('assign_new_group') }}">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="form-group col-md-1"></div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_user_id">User Name & Group</label>
                                          <select class="form-select" aria-label="Default select example" name="txt_user_id" id="txt_user_id">
                                            <option disabled="disabled" selected="">Select User</option>
                                            @foreach($all_users as $users)
                                                <option value="{{ $users->id}}">
                                                    {{ $users->first_name }} {{ $users->last_name }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{ $users->user_group }}
                                                </option>
                                            @endforeach
                                          </select>
                                        </div>

                                        <div class="form-group col-md-5">
                                          <label for="txt_user_new_group">Change Group Name To</label>
                                          <select class="form-select" aria-label="Default select example" name="txt_user_new_group" id="txt_user_new_group">
                                            <option disabled="disabled" selected="">Select Group</option>
                                            <option value="Preparer">Preparer</option>
                                            <option value="Reviewer">Reviewer</option>
                                            <option value="Approver">Approver</option>
                                          </select>
                                        </div>
                                        <div class="form-group col-md-1"></div>
                                    </div>
                                        
                                    <div class="text-center">
                                        <button type="submit" name="add_user" class="btn btn-add-user"> Submit </button>
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


