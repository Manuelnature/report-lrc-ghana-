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
                                <form enctype="multipart/form-data" method="POST" action="{{ route('receivable_update', $receivable_to_edit->id) }}">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group mb-4 col-md-5">
                                          <label for="txt_edit_receivable_date">Date</label>
                                          <input type="date" class="form-control" id="txt_edit_receivable_date" name="txt_edit_receivable_date" value="{{ $receivable_to_edit->date }}">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_edit_receivable_type">Payable Type</label>
                                          <select class="form-select" aria-label="Default select example" name="txt_edit_receivable_type" id="txt_edit_receivable_type">
                                                <option value="{{ $receivable_to_edit->payable_type }}">{{ $receivable_to_edit->payable_type }}</option>
                                                @foreach($get_from_setups as $receivable_names)
                                                    <option value="{{ $receivable_names->name }}">{{ $receivable_names->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <!-- <br><br> -->
                                    <!-- <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-10">
                                          <label for="txt_edit_receivable_type">Payable Type</label>
                                          <select class="form-select" aria-label="Default select example" name="txt_edit_receivable_type" id="txt_edit_receivable_type">
                                                <option value="{{ $receivable_to_edit->payable_type }}">{{ $receivable_to_edit->payable_type }}</option>
                                                @foreach($get_from_setups as $receivable_names)
                                                    <option value="{{ $receivable_names->name }}">{{ $receivable_names->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <br><br> -->
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group mb-4 col-md-5">
                                          <label for="txt_edit_receivable_amount">Amount</label>
                                          <input type="text" class="form-control" id="txt_edit_receivable_amount" name="txt_edit_receivable_amount" value="{{ $receivable_to_edit->amount }}">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_edit_receivable_comment">Comment</label>
                                          <textarea class="form-control" name="txt_edit_receivable_comment" id="txt_edit_receivable_comment">{{ $receivable_to_edit->comment }}</textarea>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <!-- <br><br>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-10">
                                          <label for="txt_edit_receivable_comment">Comment</label>
                                          <textarea class="form-control" name="txt_edit_receivable_comment" id="txt_edit_receivable_comment">{{ $receivable_to_edit->comment }}</textarea>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div> -->
                                        
                                    <div class="text-center">
                                        <button type="submit" name="btn_save_receivable" class="btn btn_save_receivable">Update</button>
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


