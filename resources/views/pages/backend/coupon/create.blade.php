<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header" hidden>
            <h5 class="modal-title" id="staticBackdropLabel">New CouponCode</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form method="POST" action="{{ route('coupon.store') }}" autocomplete="off">
            @csrf
            <div class="modal-body">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-7 col-form-label" hidden>
                        Coupon Code </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="coupon_code" placeholder="Enter Coupon Code">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-7 col-form-label" hidden>
                        Reduction Perentage </label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control reduction_percentage" name="reduction_percentage" placeholder="Enter Reduction Perentage">
                    </div>
                    <div class="col-sm-1">%</div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-7 col-form-label" hidden>
                        Reduction Amount </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="reduction_amount" placeholder="Enter Reduction amount" >
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-7 col-form-label" hidden>
                        Coupon Person </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="friendname" placeholder="Coupon Person">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal" hidden>Close</button>
                <button type="submit" class="btn btn-primary">Save now</button>
            </div>
        </form>
    </div>
</div>
