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
                                <form enctype="multipart/form-data" method="POST" action="{{ route('prepaid_update')}}">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-1">
                                            <input type="hidden" name="transaction_id" value="{{ $prepaid_to_edit->id }}">

                                            <input type="hidden" name="status" value="{{ $prepaid_to_edit->status }}">

                                            <input type="hidden" name="reviewed_by" value="{{ $prepaid_to_edit->reviewed_by }}">

                                            <input type="hidden" name="approved_by" value="{{ $prepaid_to_edit->approved_by }}">
                                        </div>
                                        <div class="form-group mb-3 col-md-5">
                                          <label for="txt_edit_prepaid_date">Date</label>
                                          <input type="date" class="form-control" id="txt_edit_prepaid_date" name="txt_edit_prepaid_date" value="{{ $prepaid_to_edit->date }}" readonly>
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_edit_prepaid_payable_type">Payable Type</label>
                                          <input type="text" class="form-control" id="txt_edit_prepaid_payable_type" name="txt_edit_prepaid_payable_type" value="{{ $prepaid_to_edit->payable_type }}" readonly>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-5 mb-3">
                                          <label for="txt_edit_prepaid_amount">Amount</label>
                                          <input type="text" class="form-control" id="txt_edit_prepaid_amount" name="txt_edit_prepaid_amount" value="{{ $prepaid_to_edit->amount }}" readonly>
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_edit_prepaid_payable_project">Project Type</label>
                                          <input type="text" class="form-control" id="txt_edit_prepaid_payable_project" name="txt_edit_prepaid_payable_project" value="{{ $prepaid_to_edit->project }}" readonly>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-10">
                                          <label for="txt_edit_prepaid_comment">Comment</label>
                                          <textarea readonly class="form-control" name="txt_edit_prepaid_comment" id="txt_edit_prepaid_comment">{{ $prepaid_to_edit->comment }}</textarea>
                                          <span class="text-danger">@error('txt_edit_prepaid_comment') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-1"></div>
                                        <div class="form-group col-md-5 mb-3">
                                          <label for="txt_prepaid_receipt_number">Receipt Number</label>
                                          <input type="text" class="form-control" id="txt_prepaid_receipt_number" name="txt_prepaid_receipt_number" value="{{ old('txt_prepaid_receipt_number') }}">
                                          <span class="text-danger">@error('txt_prepaid_receipt_number') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="txt_prepaid_receipt_amount">Receipt Amount</label>
                                          <input type="text" class="form-control" id="txt_prepaid_receipt_amount" name="txt_prepaid_receipt_amount" value="{{ old('txt_prepaid_receipt_amount') }}">
                                          <span class="text-danger">@error('txt_prepaid_receipt_amount') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="btn_save_payable" class="btn btn_save_payable">Save</button>
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


