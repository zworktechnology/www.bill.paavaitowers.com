@extends('layouts.auth')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Update Coupon Code</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form autocomplete="off" method="POST" action="{{ route('coupon.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="modal-body">
                                       <div class="row mb-4">
                                          <label for="horizontal-firstname-input" class="col-sm-7 col-form-label" >
                                                Coupon Code </label>
                                          <div class="col-sm-12">
                                                <input type="text" class="form-control" name="coupon_code" placeholder="Enter Coupon Code" value="{{ $data->coupon_code }}" >
                                          </div>
                                       </div>
                                       <div class="row mb-4">
                                          <label for="horizontal-firstname-input" class="col-sm-7 col-form-label" >
                                                Reduction Perentage </label>
                                          <div class="col-sm-11">
                                                <input type="text" class="form-control reduction_percentage" name="reduction_percentage" placeholder="Enter Reduction Perentage" value="{{ $data->reduction_percentage }}" >
                                          </div>
                                          <div class="col-sm-1">%</div>
                                       </div>
                                       <div class="row mb-4">
                                          <label for="horizontal-firstname-input" class="col-sm-7 col-form-label" >
                                                Reduction Amount </label>
                                          <div class="col-sm-12">
                                                <input type="text" class="form-control" name="reduction_amount" placeholder="Enter Reduction amount" value="{{ $data->reduction_amount }}" >
                                          </div>
                                       </div>
                                       <div class="row mb-4">
                                          <label for="horizontal-firstname-input" class="col-sm-7 col-form-label" >
                                                Coupon Person </label>
                                          <div class="col-sm-12">
                                                <input type="text" class="form-control" name="friendname" placeholder="Coupon Person" value="{{ $data->friendname }}" >
                                          </div>
                                       </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
