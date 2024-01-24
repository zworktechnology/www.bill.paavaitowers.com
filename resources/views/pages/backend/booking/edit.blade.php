@extends('layouts.auth')

@section('content')
    <style>
        .not-allowed {
            cursor: not-allowed;
        }
    </style>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Edit Booking</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="modal-body">
                                    <form autocomplete="off" method="POST" action="{{ route('booking.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    
                                                <div class="row mb-4">
                                                    <div class="col-md-5 col-12">
                                                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                            Booking Type <span style="color: red;">*</span> </label>
                                                        <select class="form-control booking_type" name="booking_type" disabled required>
                                                            <option value="" selected hidden class="text-muted">Select Payment Via</option>
                                                            <option value="Cash"{{ $data->booking_type == 'Cash' ? 'selected' : '' }} class="text-muted">Cash</option>
                                                            <option value="Google Pay"{{ $data->booking_type == 'Google Pay' ? 'selected' : '' }} class="text-muted">Google Pay</option>
                                                            <option value="Make My Trip"{{ $data->booking_type == 'Make My Trip' ? 'selected' : '' }} class="text-muted"> Make My Trip</option>
                                                            <option value="Goibibo"{{ $data->booking_type == 'Goibibo' ? 'selected' : '' }} class="text-muted"> Goibibo</option>
                                                            <option value="Agoda"{{ $data->booking_type == 'Agoda' ? 'selected' : '' }} class="text-muted"> Agoda</option>
                                                            <option value="Booking.com"{{ $data->booking_type == 'Booking.com' ? 'selected' : '' }} class="text-muted">Booking.com</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <h4 class="card-title mb-4" style="color: #5b73e8">Profile</h4>
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                        Customer Name <span style="color: red;">*</span> </label>
                                                    <div class="col-sm-9">
                                                        <input type="name" class="form-control" name="booking_customer_name"
                                                            placeholder="Enter here " value="{{ $data->customer_name }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                        Contact Number <span style="color: red;">*</span> </label>
                                                    <div class="col-sm-4">
                                                        <input type="number" class="form-control" name="phone_number"
                                                            id="phone_number" placeholder="Enter here "
                                                            value="{{ $data->phone_number }}" required>
                                                        <div class="form-check mt-2">
                                                            <input type="checkbox" class="form-check-input whatsapp_check"
                                                                id="formrow-customCheck">
                                                            <label class="form-check-label" for="formrow-customCheck">Same as
                                                                Whatsapp number</label>
                                                        </div>
                                                    </div>
                                                    <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                        Whatsapp <span style="color: red;">*</span> </label>
                                                    <div class="col-sm-4">
                                                        <input type="number" class="form-control whats_app_number"
                                                            name="whats_app_number" value="{{ $data->whats_app_number }}"
                                                            placeholder="Enter here " required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                        Email ID </label>
                                                    <div class="col-sm-4">
                                                        <input type="email" class="form-control" name="email_id"
                                                            value="{{ $data->email_id }}" placeholder="Enter here ">
                                                    </div>
                                                    <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                        Address </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" name="address"
                                                            value="{{ $data->address }}" placeholder="Enter here ">
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                        GST Number </label>
                                                    <div class="col-sm-9">
                                                        <input type="name" class="form-control" name="gst_number"
                                                            placeholder="Enter here " value="{{ $data->gst_number }}">
                                                    </div>
                                                </div>
                                                <hr>



                                                <h4 class="card-title mb-4" style="color: #5b73e8">Head Rooms</h4>

                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                        Count <span style="color: red;">*</span> </label>
                                                    <div class="col-sm-3">
                                                        <input type="number" class="form-control" name="male_count"
                                                            value="{{ $data->male_count }}"
                                                            placeholder="Male Count - Enter here " required>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="number" class="form-control" name="female_count"
                                                            value="{{ $data->female_count }}"
                                                            placeholder="Female Count- Enter here " required>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="number" class="form-control" name="child_count"
                                                            value="{{ $data->child_count }}"
                                                            placeholder="Child Count - Enter here " required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                        Check In Date <span style="color: red;">*</span> </label>
                                                    <div class="col-sm-4">
                                                        <input type="date" class="form-control check_in_date"
                                                            name="check_in_date" placeholder="Enter here "
                                                            value="{{ $data->check_in_date }}" required>
                                                    </div>
                                                    <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                        Time <span style="color: red;">*</span> </label>
                                                    <div class="col-sm-4">
                                                        <input type="time" class="form-control" name="check_in_time"
                                                            placeholder="Enter here " value="{{ $data->check_in_time }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                        No of Days - Stay <span style="color: red;">*</span> </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control days" id="days"
                                                            value="{{ $data->days }}" name="days"
                                                            placeholder="Enter here " required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                        Check Out Date </label>
                                                    <div class="col-sm-4">
                                                        <input type="date" class="form-control check_out_date"
                                                            name="check_out_date"
                                                            placeholder="Enter here "value="{{ $data->check_out_date }}">
                                                    </div>
                                                    <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                        Time </label>
                                                    <div class="col-sm-4">
                                                        <input type="time" class="form-control" name="check_out_time"
                                                            placeholder="Enter here " value="{{ $data->check_out_time }}">
                                                    </div>
                                                </div>
                                            
                                                <div data-repeater-list="group-a">
                                                    <div data-repeater-item class="row">
                                                        <div class="inner-repeater mb-4">
                                                            <div data-repeater-list="inner-group" class="inner form-group">
                                                                <div data-repeater-item class="inner mb-3 row">
                                                                    <div class="col-sm-3">
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-form-label">
                                                                            Room Details <span style="color: red;">*</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="dynamic_field col-sm-9">
                                                                        <table class="table-fixed col-12 " id="">
                                                                            <button style="width: 100px;"
                                                                                class="py-2 mr-5 text-white font-medium rounded-lg text-sm  text-center btn btn-success"
                                                                                type="button" id="addroomfields"
                                                                                value="Add">Add</button>
                                                                            <tbody id="roomfields" class="responsive_cls">
                                                                                @foreach ($BookingRooms as $index => $BookingRoomss)
                                                                                    <tr class="outer">
                                                                                        <td class="col-12 col-md-3 pr-2 py-1 text-left text-xs font-medium text-black-700  tracking-wider">
                                                                                            <input type="hidden"
                                                                                                id="room_auto_id"
                                                                                                name="room_auto_id[]"
                                                                                                value="{{ $BookingRoomss->id }}" />


                                                                                            @foreach ($room as $rooms)
                                                                                                @if ($rooms->id == $BookingRoomss->room_id)
                                                                                                    <script>
                                                                                                        var booking_id = {{ $data->id }};

                                                                                                        $(document).on("keyup", '#room_price' + {{ $data->id }}{{ $index }}, function() {

                                                                                                            var price = $(this).val();
                                                                                                            var days = $(".days").val();
                                                                                                            var Amount = days * price;
                                                                                                            $('#room_cal_price' + {{ $data->id }}{{ $index }}).val(Amount);


                                                                                                            var sum = 0;
                                                                                                            $(".room_cal_price").each(function(){
                                                                                                                sum += +$(this).val();
                                                                                                            });

                                                                                                            $(".total_calc_price").val(sum.toFixed(2));
                                                                                                            $('.totalamount_afterdiscount').val(sum.toFixed(2));
                                                                                                            $('.grand_total').val(sum.toFixed(2));

                                                                                                            var discountamount = $(".discountamount").val();
                                                                                                            var total_calc_price = $(".total_calc_price").val();
                                                                                                            var totalamount_afterdiscount = Number(total_calc_price) - Number(discountamount);
                                                                                                            $('.totalamount_afterdiscount').val(totalamount_afterdiscount);


                                                                                                            var gst_percentage = $(".gst_percentage").val();
                                                                                                            var gst_in_amount = (gst_percentage / 100) * totalamount_afterdiscount;
                                                                                                            $('.gst_amount').val(gst_in_amount.toFixed(2));
                                                                                                            var grand_total = (Number(totalamount_afterdiscount) + Number(gst_in_amount.toFixed(2)));
                                                                                                            $('.grand_total').val(grand_total.toFixed(2));



                                                                                                            var payable_amount = 0;
                                                                                                                $(".payable_amount").each(function(){
                                                                                                                    payable_amount += +$(this).val();
                                                                                                                });
                                                                                                                $(".total_payable").val(payable_amount.toFixed(2));

                                                                                                            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount.toFixed(2));
                                                                                                            $('.balance_amount').val(balance.toFixed(2));

                                                                                                        });

                                                                                                        $(document).on("keyup", 'input.days', function() {
                                                                                                            var days = $(this).val();
                                                                                                            var room_price = $('#room_price' + {{ $data->id }}{{ $index }}).val();
                                                                                                            var total = room_price * days;
                                                                                                            $('#room_cal_price' + {{ $data->id }}{{ $index }}).val(total);


                                                                                                            var sum = 0;
                                                                                                            $(".room_cal_price").each(function(){
                                                                                                                sum += +$(this).val();
                                                                                                            });

                                                                                                            $(".total_calc_price").val(sum.toFixed(2));
                                                                                                            $('.totalamount_afterdiscount').val(sum.toFixed(2));
                                                                                                            $('.grand_total').val(sum.toFixed(2));

                                                                                                            var discountamount = $(".discountamount").val();
                                                                                                            var total_calc_price = $(".total_calc_price").val();
                                                                                                            var totalamount_afterdiscount = Number(total_calc_price) - Number(discountamount);
                                                                                                            $('.totalamount_afterdiscount').val(totalamount_afterdiscount);


                                                                                                            var gst_percentage = $(".gst_percentage").val();
                                                                                                            var gst_in_amount = (gst_percentage / 100) * totalamount_afterdiscount;
                                                                                                            $('.gst_amount').val(gst_in_amount.toFixed(2));
                                                                                                            var grand_total = (Number(totalamount_afterdiscount) + Number(gst_in_amount.toFixed(2)));
                                                                                                            $('.grand_total').val(grand_total.toFixed(2));



                                                                                                            var payable_amount = 0;
                                                                                                                $(".payable_amount").each(function(){
                                                                                                                    payable_amount += +$(this).val();
                                                                                                                });
                                                                                                                $(".total_payable").val(payable_amount.toFixed(2));

                                                                                                            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount.toFixed(2));
                                                                                                            $('.balance_amount').val(balance.toFixed(2));
                                                                                                        });
                                                                                                    </script>

                                                                                                    <input type="text"
                                                                                                        class="form-control not-allowed customer_booked_room"
                                                                                                        disabled
                                                                                                        name="customer_booked_room[]"
                                                                                                        placeholder=""
                                                                                                        value="Room No {{ $rooms->room_number }} - {{ $rooms->room_floor }} Floor">
                                                                                                    <input type="hidden"
                                                                                                        id="room_id"
                                                                                                        name="room_id[]"
                                                                                                        value="{{ $rooms->id }}" />
                                                                                                @endif
                                                                                            @endforeach
                                                                                            </select>
                                                                                        </td>
                                                                                        <td class="col-12 col-md-3">
                                                                                            <select
                                                                                                class="form-control room_type"
                                                                                                id="room_type{{ $data->id }}{{ $index }}"
                                                                                                name="room_type[]" required>
                                                                                                <option value="" selected
                                                                                                    hidden class="text-muted">
                                                                                                    Select Room Type</option>
                                                                                                <option value="Standard A/C"{{ $BookingRoomss->room_type == 'Standard A/C' ? 'selected' : '' }} class="text-muted">Standard A/C</option>
                                                                                                <option value="Deluxe A/C"{{ $BookingRoomss->room_type == 'Deluxe A/C' ? 'selected' : '' }} class="text-muted">Deluxe A/C</option>
                                                                                                <option value="Standard Non A/C"{{ $BookingRoomss->room_type == 'Standard Non A/C' ? 'selected' : '' }} class="text-muted">Standard Non A/C</option>
                                                                                                <option value="King Size A/C"{{ $BookingRoomss->room_type == 'King Size A/C' ? 'selected' : '' }} class="text-muted">King Size A/C</option>
                                                                                                <option value="Group Room"{{ $BookingRoomss->room_type == 'Group Room' ? 'selected' : '' }} class="text-muted">Group Room</option>
                                                                                            </select>
                                                                                        </td>
                                                                                        <td class="col-12 col-md-2"><input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                id="room_price{{ $data->id }}{{ $index }}"
                                                                                                name="room_price[]"
                                                                                                placeholder="Price Per Day"
                                                                                                value="{{ $BookingRoomss->room_price }}" />
                                                                                        </td>
                                                                                        <td class="col-12 col-md-2"><input
                                                                                                type="text"
                                                                                                class="form-control  room_cal_price"
                                                                                                id="room_cal_price{{ $data->id }}{{ $index }}"
                                                                                                name="room_cal_price[]" readonly
                                                                                                placeholder="Price"
                                                                                                value="{{ $BookingRoomss->room_cal_price }}" />
                                                                                        </td>
                                                                                        <td class="col-12 col-md-1"><button
                                                                                                style="width: 100px;"
                                                                                                class="text-white font-medium rounded-lg text-sm  text-center btn btn-danger remove-tr"
                                                                                                type="button">Remove</button>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                            <tbody id="webroomfields">

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>




                                                <hr>
                                                <h4 class="card-title mb-4" style="color: #5b73e8">Pricing Calculation</h4>

                                                <div data-repeater-list="group-a">
                                                    <div data-repeater-item class="row">
                                                        <div class="inner-repeater mb-4">
                                                            <div data-repeater-list="inner-group" class="inner form-group">
                                                                <div data-repeater-item class="inner mb-3 row">
                                                                    <div class="col-md-3 col-12">
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-form-label">
                                                                            Total - Room Price <span style="color: red;">*</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-9 col-12">
                                                                        <input type="text" class="form-control total_calc_price" name="total_calc_price"
                                                                            id="total_calc_price" value="{{ $data->total }}" readonly
                                                                            placeholder="Enter here " required>
                                                                    </div>
                                                                </div>
                                                                @if ($data->webstatus == '')

                                                                    <div data-repeater-item class="inner mb-3 row">
                                                                        <div class="col-md-3 col-12">
                                                                            <label for="horizontal-firstname-input"
                                                                                class="col-form-label">
                                                                                Coupon Code<span
                                                                                    style="color: red;">*</span> </label>
                                                                        </div>
                                                                        <div class="col-md-9 col-12">
                                                                            <select class="form-control js-example-basic-single coupon_codeid" name="coupon_codeid"
                                                                                >
                                                                                <option value="" disabled selected hiddden>
                                                                                    Select One</option>
                                                                                @foreach ($coupon as $coupons)
                                                                                    <option value="{{ $coupons->id }}"@if ($coupons->id == $data->coupon_codeid) selected='selected' @endif>
                                                                                        {{ $coupons->coupon_code }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    <div data-repeater-item class="inner mb-3 row">
                                                                        <div class="col-md-3 col-12">
                                                                            <label for="horizontal-firstname-input"
                                                                                class="col-form-label">
                                                                                Total After Discount <span
                                                                                    style="color: red;">*</span> </label>
                                                                        </div>
                                                                        <div class="col-md-5 col-12">
                                                                            <input type="text" class="form-control totalamount_afterdiscount" value="{{ $data->totalamount_afterdiscount }}"
                                                                                name="totalamount_afterdiscount" readonly >
                                                                        </div>
                                                                        <div class="col-md-4 col-12">
                                                                            <input type="text" class="form-control discountamount" value="{{ $data->disc_amount }}"
                                                                                name="discountamount" placeholder="Discount Amout" readonly >
                                                                        </div>
                                                                    </div>
                                                                   

                                                                <div class="row mb-4">
                                                                    <label for="horizontal-firstname-input"
                                                                        class="col-sm-3 col-form-label">
                                                                        GST Amount <span style="color: red;">*</span> </label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control gst_amount"
                                                                            name="gst_amount" placeholder="GST Amount - Enter here "
                                                                            value="{{ $data->gst_amount }}" required>
                                                                    </div>
                                                                    <label for="horizontal-firstname-input"
                                                                        class="col-sm-1 col-form-label">
                                                                        GST % <span style="color: red;">*</span> </label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control gst_percentage"
                                                                            name="gst_percentage" placeholder="Gst % - Enter here "
                                                                            value="{{ $data->gst_per }}" required>
                                                                    </div>
                                                                </div>
                                                              
                                                                <div data-repeater-item class="inner mb-3 row">
                                                                    <div class="col-md-3 col-8">
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-form-label">
                                                                            Grand Total - To Pay <span style="color: red;">*</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-9 col-3">
                                                                        <input type="text" class="form-control grand_total" name="grand_total"
                                                                            value="{{ $data->grand_total }}" readonly style="background-color:#69d074ad"
                                                                            placeholder="Enter here " required>
                                                                    </div>
                                                                </div>
                                                               
                                                                


                                                                <div class="row mb-4">
                                                                    <label for="horizontal-firstname-input"
                                                                        class="col-sm-3 col-form-label">
                                                                        Paid Amounts </label>
                                                                    <div class="col-sm-9">
                                                                        <table class="table-fixed col-12 " id="">
                                                                            <tr>
                                                                                <th>Terms</th>
                                                                                <th>Amount</th>
                                                                                <th>Payment Method</th>
                                                                            </tr>
                                                                            @foreach ($paymentdata as $index => $paymentdatas)
                                                                                <script>
                                                                                    $(document).on("keyup", '#payable_amount' + {{ $paymentdatas->id }}, function() {
                                                                                        var payableamount = $(this).val();
                                                                                        var totalAmount = 0;
                                                                                        $("input[name='payable_amount[]']").each(function() {
                                                                                            //alert($(this).val());
                                                                                            totalAmount = Number(totalAmount) + Number($(this).val());
                                                                                            $('.total_payable').val(totalAmount);
                                                                                        });
                                                                                    });
                                                                                </script>

                                                                                <tr>
                                                                                    <td class="col-sm-3">
                                                                                        <select class="form-control"
                                                                                            name="payment_term[]">
                                                                                            <option value="" selected
                                                                                                class="text-muted">Terms</option>
                                                                                            <option
                                                                                                value="Term I"{{ $paymentdatas->term == 'Term I' ? 'selected' : '' }}
                                                                                                class="text-muted">Term I</option>
                                                                                            <option
                                                                                                value="Term II"{{ $paymentdatas->term == 'Term II' ? 'selected' : '' }}
                                                                                                class="text-muted">Term II</option>
                                                                                            <option
                                                                                                value="Term III"{{ $paymentdatas->term == 'Term III' ? 'selected' : '' }}
                                                                                                class="text-muted">Term III</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="col-sm-3">
                                                                                        <input type="text"
                                                                                            class="form-control payable_amount"
                                                                                            id="payable_amount{{ $paymentdatas->id }}"
                                                                                            value="{{ $paymentdatas->payable_amount }}"
                                                                                            name="payable_amount[]"
                                                                                            placeholder="Enter here ">
                                                                                        <input type="hidden"
                                                                                            class="form-control booking_payment_id"
                                                                                            value="{{ $paymentdatas->id }}"
                                                                                            name="booking_payment_id[]"
                                                                                            placeholder="Enter here ">
                                                                                    </td>
                                                                                    <td class="col-sm-3">
                                                                                        <select class="form-control "
                                                                                            name="payment_method[]">
                                                                                            <option value="" selected hidden
                                                                                                class="text-muted">Select 
                                                                                            </option>
                                                                                            <option value="Cash" {{ $paymentdatas->payment_method == 'Cash' ? 'selected' : '' }}class="text-muted">Cash</option>
                                                                                            <option value="Online Payment"{{ $paymentdatas->payment_method == 'Online Payment' ? 'selected' : '' }}class="text-muted">Online Payment</option>
                                                                                            <option value="Advance Payment"{{ $paymentdatas->payment_method == 'Advance Payment' ? 'selected' : '' }} class="text-muted">Advance Payment</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach

                                                                            <tr>
                                                                                    <td class="col-sm-3">
                                                                                        <select class="form-control"
                                                                                            name="payment_term[]">
                                                                                            <option value="" selected
                                                                                                class="text-muted">Select</option>
                                                                                            <option
                                                                                                value="Term I"
                                                                                                class="text-muted">Term I</option>
                                                                                            <option
                                                                                                value="Term II"
                                                                                                class="text-muted">Term II</option>
                                                                                            <option
                                                                                                value="Term III"
                                                                                                class="text-muted">Term III</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="col-sm-3">
                                                                                        <input type="text"
                                                                                            class="form-control payable_amount"
                                                                                            id="payable_amount"
                                                                                            name="payable_amount[]"
                                                                                            placeholder="Enter here ">
                                                                                        <input type="hidden"
                                                                                            class="form-control booking_payment_id"
                                                                                            name="booking_payment_id[]"
                                                                                            placeholder="Enter here ">
                                                                                    </td>
                                                                                    <td class="col-sm-3">
                                                                                        <select class="form-control "
                                                                                            name="payment_method[]">
                                                                                            <option value="" selected hidden
                                                                                                class="text-muted">Select 
                                                                                            </option>
                                                                                            <option
                                                                                                value="Cash"
                                                                                                class="text-muted">Cash</option>
                                                                                            <option
                                                                                                value="Online Payment"
                                                                                                class="text-muted">Online Payment
                                                                                            </option>
                                                                                            <option value="Advance Payment" class="text-muted">Advance Payment</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>

                                                                        </table>
                                                                    </div>


                                                                </div>


                                                                <div data-repeater-item class="inner mb-3 row">
                                                                    <div class="col-md-3 col-12">
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-form-label">
                                                                            Total Paid </label>
                                                                    </div>
                                                                    <div class="col-md-9 col-12">
                                                                        <input type="text" class="form-control total_payable" value="{{ $data->total_paid }}" readonly
                                                                            name="total_payable" placeholder="Enter here ">
                                                                    </div>
                                                                </div>


                                                                <div data-repeater-item class="inner mb-3 row">
                                                                    <div class="col-md-3 col-12">
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-form-label">
                                                                            Balance Amount </label>
                                                                    </div>
                                                                    <div class="col-md-9 col-12">
                                                                        <input type="text" class="form-control balance_amount"
                                                                            style="color:red;" readonly
                                                                            value="{{ $data->balance_amount }}" name="balance_amount"
                                                                            placeholder="Enter here ">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">
                                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                                        Check In Staff <span style="color: red;">*</span> </label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control"
                                                                            name="check_in_staff" required>
                                                                            <option value="" disabled selected hiddden>Select One</option>
                                                                            @foreach ($staff as $staffs)
                                                                                <option value="{{ $staffs->id }}"
                                                                                    @if ($staffs->id == $data->check_in_staff) selected='selected' @endif>
                                                                                    {{ $staffs->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>


                                                <div class="row mb-4">
                                                    <div class="col-sm-3">
                                                        <h4 class="card-title mb-4" style="color: #5b73e8">Proof</h4>
                                                    </div>
                                                </div>

                                                <div id="singleproof">
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-3 col-form-label">
                                                            Proof <span style="color: red;">*</span> </label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control " name="prooftype_one"
                                                                style="width: 100%;">
                                                                <option value="" disabled selected hidden
                                                                    class="text-muted">Select Type</option>
                                                                <option
                                                                    value="Aadhaar Card"{{ $data->prooftype_one == 'Aadhaar Card' ? 'selected' : '' }}
                                                                    class="text-muted">Aadhaar Card</option>
                                                                <option
                                                                    value="Pan Card"{{ $data->prooftype_one == 'Pan Card' ? 'selected' : '' }}
                                                                    class="text-muted">Pan Card</option>
                                                                <option
                                                                    value="Voter ID"{{ $data->prooftype_one == 'Voter ID' ? 'selected' : '' }}
                                                                    class="text-muted">Voter ID</option>
                                                                <option
                                                                    value="Driving Licence"{{ $data->prooftype_one == 'Driving Licence' ? 'selected' : '' }}
                                                                    class="text-muted">Driving Licence</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row mb-4" id="proof1" >
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Proof Front<span style="color: red;">*</span> </label>
                                                    <div class="col-sm-9">
                                                        <div style="display: flex">
                                                            <div><img src="{{ asset('assets/customer_details/proofimage_one/' .$data->proofimage_one) }}" alt="" style="width: 200px !important; height: 150px !important; margin-right: 40px !important; margin-top: 25px !important;"></div>
                                                            <div id="my_camera_front"></div>
                                                            <div id="captured_image_front"></div>
                                                        </div>
                                                        <input type=button class=" btn btn-sm btn-soft-primary"value="Take a Snap - Front Proof" onClick="take_snapshot_front()">
                                                        <input type="hidden" class="form-control image-tagfront" name="proofimage_one">
                                                            <div class="col-sm-4">
                                                                <div id="captured_image_front"></div>
                                                            </div>

                                                    </div>
                                                </div>


                                                <div class="row mb-4" id="proof2" >
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Proof  Back<span style="color: red;">*</span> </label>
                                                    <div class="col-sm-9">
                                                        <div style="display: flex">
                                                            <div><img src="{{ asset('assets/customer_details/proofimage_two/' .$data->proofimage_two) }}" alt="" style="width: 200px !important; height: 150px !important; margin-right: 40px !important; margin-top: 25px !important;"></div>
                                                            <div id="my_camera_back"></div>
                                                            <div id="captured_image_back"></div>
                                                        </div>
                                                        <input type=button class=" btn btn-sm btn-soft-primary"value="Take a Snap - Back Proof" onClick="take_snapshot_back()">
                                                        <input type="hidden" class="form-control image-tagback" name="proofimage_two">

                                                    </div>
                                                </div>


                                                <div class="row mb-4" id="proof_photo" >
                                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Photo <span style="color: red;">*</span> </label>
                                                    <div class="col-sm-9">
                                                        <div style="display: flex">
                                                            <div><img src="{{ asset('assets/customer_details/customer_photo/' .$data->customer_photo) }}" alt="" style="width: 200px !important; height: 150px !important; margin-right: 40px !important; margin-top: 25px !important;"></div>
                                                            <div id="my_camera"></div>
                                                            <div id="captured_cameraimage"></div>
                                                        </div>
                                                        <input type=button class=" btn btn-sm btn-soft-primary"value="Take a Snap - Photo" onClick="takesnapshot()">
                                                        <input type="hidden" class="form-control image-tagcamera" name="customer_photo">
                                                    </div>
                                                </div>


                                                    <div class="row mb-4" id="proof1" hidden>
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-3 col-form-label">Proof Front<span
                                                                style="color: red;">*</span> </label>
                                                        <div class="col-sm-9">
                                                        <input type="file" class="form-control"
                                                                name="proofimage_one">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4" id="proof2" hidden>
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-3 col-form-label">Proof Back<span
                                                                style="color: red;">*</span> </label>
                                                        <div class="col-sm-9">
                                                        <input type="file" class="form-control"
                                                                name="proofimage_two">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4" id="proof_photo" hidden>
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-3 col-form-label">Photo<span
                                                                style="color: red;">*</span> </label>
                                                        <div class="col-sm-9">
                                                        <input type="file" class="form-control"
                                                                name="customer_photo">
                                                        </div>
                                                    </div>



                                                <div class="modal-footer">

                                                    <button type="submit" class="btn btn-primary" name="checkin"
                                                        style="margin-right: 10%;">Update</button>
                                                </div>




                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        ;
        (function($, window, document, undefined) {
            $("#days").on("keyup", function() {
                var date = new Date($(".check_in_date").val()),
                    days = parseInt($("#days").val(), 10);

                if (!isNaN(date.getTime())) {
                    date.setDate(date.getDate() + days);

                    $(".check_out_date").val(date.toInputFormat());
                } else {
                    alert("Invalid Date");
                }
            });
            //From: http://stackoverflow.com/questions/3066586/get-string-in-yyyymmdd-format-from-js-date-object
            Date.prototype.toInputFormat = function() {
                var yyyy = this.getFullYear().toString();
                var mm = (this.getMonth() + 1).toString(); // getMonth() is zero-based
                var dd = this.getDate().toString();
                return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]); // padding
            };
        })(jQuery, this, document);

     

        $(document).ready(function() {

            $('.whatsapp_check').click(function() {
                if ($(this).is(':checked')) {
                    var phone_number = $('#phone_number').val();
                    $('.whats_app_number').val(phone_number);
                } else {
                    $('.whats_app_number').val('');
                }
            });


            var phone_number = $('#phone_number').val();
            var whats_app_number = $('.whats_app_number').val();
            if (phone_number == whats_app_number) {
                $('.whatsapp_check').prop('checked', true);
            } else {
                $('.whatsapp_check').prop('checked', false);
            }



           



            $('.coupon_codeid').on('change', function() {
                var coupon_codeid = $(this).val();

                //$('.oldblance').val('');
                $.ajax({
                    url: '/getCouponDiscount/',
                    type: 'get',
                    data: {
                            _token: "{{ csrf_token() }}",
                            coupon_codeid: coupon_codeid
                        },
                    dataType: 'json',
                    success: function(response) {
                        $('.totalamount_afterdiscount').val('');
                        console.log(response);
                        var len = response.length;
                        for (var i = 0; i < len; i++) {
                            if(response[i].reduction_amount){

                                var total_calc_price = $(".total_calc_price").val();
                                var totalaount = Number(total_calc_price) - Number(response[i].reduction_amount);
                                $('.totalamount_afterdiscount').val(totalaount);
                                $('.discountamount').val(response[i].reduction_amount);

                                var totalamount_afterdiscount = $(".totalamount_afterdiscount").val();
                                
                                var gst_percentage = $(".gst_percentage").val();
                                var gst_in_amount = (gst_percentage / 100) * totalamount_afterdiscount;
                                $('.gst_amount').val(gst_in_amount.toFixed(2));
                                var grand_total = (Number(totalamount_afterdiscount) + Number(gst_in_amount.toFixed(2)));
                                $('.grand_total').val(grand_total.toFixed(2));

                                var payable_amount = 0;
                                $(".payable_amount").each(function(){
                                    payable_amount += +$(this).val();
                                });
                                $(".total_payable").val(payable_amount.toFixed(2));

                                var balance = Number(grand_total.toFixed(2)) - Number(payable_amount.toFixed(2));
                                $('.balance_amount').val(balance.toFixed(2));

                            }else if(response[i].reduction_percentage){

                                var total_calc_price = $(".total_calc_price").val();
                                var reduction_amount = (response[i].reduction_percentage / 100) * total_calc_price;
                                var totalaount = Number(total_calc_price) - Number(reduction_amount.toFixed(2));
                                $('.totalamount_afterdiscount').val(totalaount);
                                $('.discountamount').val(reduction_amount);

                                var totalamount_afterdiscount = $(".totalamount_afterdiscount").val();

                                var gst_percentage = $(".gst_percentage").val();
                                var gst_in_amount = (gst_percentage / 100) * totalamount_afterdiscount;
                                $('.gst_amount').val(gst_in_amount.toFixed(2));
                                var grand_total = (Number(totalamount_afterdiscount) + Number(gst_in_amount.toFixed(2)));
                                $('.grand_total').val(grand_total.toFixed(2));

                                var payable_amount = 0;
                                $(".payable_amount").each(function(){
                                    payable_amount += +$(this).val();
                                });
                                $(".total_payable").val(payable_amount.toFixed(2));

                                var balance = Number(grand_total.toFixed(2)) - Number(payable_amount.toFixed(2));
                                $('.balance_amount').val(balance.toFixed(2));
                            }
                        }
                    }
                });
            });



        });





        var i = 1;
        var j = 1;
        var l = 1;
        var h = 1;


        $(document).ready(function() {


            $("#addroomfields").click(function() {
                ++i;
                $("#roomfields").append(
                    '<tr class="outer"><td class="col-12 col-md-3 pr-2 py-1 text-left text-xs font-medium text-black-700 tracking-wider"><input type="hidden" id="room_auto_id" name="room_auto_id[]" /><select class="form-control js-example-basic-single room_id" name="room_id[]" id="room_id' + i + '" required><option value="" selected hidden class="text-muted">Select Room</option></select></td><td class="col-12 col-md-3" style="margin-left: 3px;"><select class="form-control room_type" name="room_type[]" required>' +
                    '<option value="" selected hidden class="text-muted">Select Room Type</option>' +
                    '<option value="Standard A/C" class="text-muted">Standard A/C</option>' +
                    '<option value="Deluxe A/C" class="text-muted">Deluxe A/C</option>' +
                    '<option value="Standard Non A/C" class="text-muted">Standard Non A/C</option>' +
                    '<option value="King Size A/C" class="text-muted">King Size A/C</option>' +
                    '<option value="Group Room" class="text-muted">Group Room</option>' +
                    '</select></td><td class="col-12 col-md-2" style="margin-left: 3px;"><input type="text" class="form-control" id="room_price' + i + '" name="room_price[]" placeholder="Price Per Day" value="" required/></td>' +
                    '<td class="col-12 col-md-2" style="margin-left: 3px;"><input type="text" class="form-control room_cal_price" id="room_cal_price' + i + '" name="room_cal_price[]" placeholder="Price" value="" required/></td>' +
                    '<td class="col-12 col-md-1" style="margin-left: 4px;"><button style="width: 100px;" class="text-white font-medium rounded-lg text-sm  text-center btn btn-danger remove-tr" type="button" >Remove</button></td></tr>'
                );

                //alert('branch_id');
                $.ajax({
                    url: '/getBranchwiseRoom/',
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response['data']);
                        var len = response['data'].length;

                        var selectedValues = new Array();
                        if (len > 0) {
                            for (var i = 0; i < len; i++) {
                                if (response['data'][i].booking_status != 1) {

                                    var id = response['data'][i].id;
                                    var name = 'Room No ' + response['data'][i].room_number +
                                        ' - ' + response['data'][i].room_floor + ' Floor';
                                    var option = "<option value='" + id + "'>" + name +
                                        "</option>";
                                    selectedValues.push(option);

                                }
                            }
                        }

                        ++j;
                        $('#room_id' + j).append(selectedValues);
                    }
                });





            });





        });




        $(document).on("blur", "input[name*=room_price]", function() {
            var room_price = $(this).val();
            //alert(room_price);
            var days = $(".days").val();
            var subtotal = room_price * days;
            $(this).parents('tr').find('input.room_cal_price').val(subtotal);

            var sum = 0;
                            $(".room_cal_price").each(function(){
                                sum += +$(this).val();
                            });

                            $(".total_calc_price").val(sum.toFixed(2));
                            $('.totalamount_afterdiscount').val(sum.toFixed(2));
                            $('.grand_total').val(sum.toFixed(2));

                            var discountamount = $(".discountamount").val();
                            var total_calc_price = $(".total_calc_price").val();
                            var totalamount_afterdiscount = Number(total_calc_price) - Number(discountamount);
                            $('.totalamount_afterdiscount').val(totalamount_afterdiscount);

                            var gst_percentage = $(".gst_percentage").val();
                            var gst_in_amount = (gst_percentage / 100) * totalamount_afterdiscount;
                            $('.gst_amount').val(gst_in_amount.toFixed(2));
                            var grand_total = (Number(totalamount_afterdiscount) + Number(gst_in_amount.toFixed(2)));
                            $('.grand_total').val(grand_total.toFixed(2));

                            var payable_amount = 0;
                                $(".payable_amount").each(function(){
                                    payable_amount += +$(this).val();
                                });
                                $(".total_payable").val(payable_amount.toFixed(2));

                            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount.toFixed(2));
                            $('.balance_amount').val(balance.toFixed(2));

        });



        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();

            var sum = 0;
                            $(".room_cal_price").each(function(){
                                sum += +$(this).val();
                            });

                            $(".total_calc_price").val(sum.toFixed(2));



                            var discountamount = $(".discountamount").val();
                            var total_calc_price = $(".total_calc_price").val();
                            var totalamount_afterdiscount = Number(total_calc_price) - Number(discountamount);
                            $('.totalamount_afterdiscount').val(totalamount_afterdiscount);

                            var gst_percentage = $(".gst_percentage").val();
                            var gst_in_amount = (gst_percentage / 100) * totalamount_afterdiscount;
                            $('.gst_amount').val(gst_in_amount.toFixed(2));
                            var grand_total = (Number(totalamount_afterdiscount) + Number(gst_in_amount.toFixed(2)));
                            $('.grand_total').val(grand_total.toFixed(2));

                            var payable_amount = 0;
                                $(".payable_amount").each(function(){
                                    payable_amount += +$(this).val();
                                });
                                $(".total_payable").val(payable_amount.toFixed(2));

                            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount.toFixed(2));
                            $('.balance_amount').val(balance.toFixed(2));
        });




        $(document).on("keyup", 'input.days', function() {
            var days = $(this).val();

            for (var i = 0; i < 100; i++) {
                var room_price = $('#room_price' + i).val();

                var total = room_price * days;
                console.log(total);
                $('#room_cal_price' + i).val(total);
            }

            var sum = 0;
                            $(".room_cal_price").each(function(){
                                sum += +$(this).val();
                            });

                            $(".total_calc_price").val(sum.toFixed(2));
                            $('.totalamount_afterdiscount').val(sum.toFixed(2));
                            $('.grand_total').val(sum.toFixed(2));

                            var discountamount = $(".discountamount").val();
                            var total_calc_price = $(".total_calc_price").val();
                            var totalamount_afterdiscount = Number(total_calc_price) - Number(discountamount);
                            $('.totalamount_afterdiscount').val(totalamount_afterdiscount);

                            var gst_percentage = $(".gst_percentage").val();
                            var gst_in_amount = (gst_percentage / 100) * totalamount_afterdiscount;
                            $('.gst_amount').val(gst_in_amount.toFixed(2));
                            var grand_total = (Number(totalamount_afterdiscount) + Number(gst_in_amount.toFixed(2)));
                            $('.grand_total').val(grand_total.toFixed(2));

                            var payable_amount = 0;
                                $(".payable_amount").each(function(){
                                    payable_amount += +$(this).val();
                                });
                                $(".total_payable").val(payable_amount.toFixed(2));

                            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount.toFixed(2));
                            $('.balance_amount').val(balance.toFixed(2));
        });



        // GST Calculation

        $(document).on("keyup", 'input.gst_percentage', function() {
            var gst_percentage = $(this).val();
            var totalamount_afterdiscount = $(".totalamount_afterdiscount").val();
            var gst_in_amount = (gst_percentage / 100) * totalamount_afterdiscount;
            $('.gst_amount').val(gst_in_amount.toFixed(2));

            var gst_amount = $(".gst_amount").val();

            var grand_total = (Number(totalamount_afterdiscount) + Number(gst_amount))
            $('.grand_total').val(grand_total.toFixed(2));

            var payable_amount = 0;
                                $(".payable_amount").each(function(){
                                    payable_amount += +$(this).val();
                                });
                                $(".total_payable").val(payable_amount.toFixed(2));

                            var balance = Number(grand_total.toFixed(2)) - Number(payable_amount.toFixed(2));
            $('.balance_amount').val(balance.toFixed(2));
        });





        $(document).on("keyup", 'input.payable_amount', function() {

            var total_paid = 0;
                        $(".payable_amount").each(function(){
                            total_paid += +$(this).val();
                        });
            $(".total_payable").val(total_paid.toFixed(2));
            var grand_total = $(".grand_total").val();
            var balance = Number(grand_total) - Number(total_paid.toFixed(2));
            $('.balance_amount').val(balance.toFixed(2));

        });


        $(document).on("keyup", 'input.payable_amount', function() {
            var payable_amount = $(this).val();
            var grand_total = $(".grand_total").val();

            if (Number(payable_amount) > Number(grand_total)) {
                alert('You are entering Maximum Amount of Total');
                $(".payable_amount").val('');
            }
        });


        $(document).on("keyup", 'input.gst_percentage', function() {
            var gst_percentage = $(this).val();
            if ($.isNumeric(gst_percentage)) {
                console.log($.isNumeric(gst_percentage));
            } else {
                alert('Add the data in numbers only');
                $(".gst_percentage").val('');
            }
        });



        // Web Camera Script

        Webcam.set({
             width: 200,
             height: 200,
             image_format: 'jpeg',
             jpeg_quality: 90,
             facingMode: 'environment'
         });

         Webcam.attach('#my_camera_front');
         function take_snapshot_front() {
             Webcam.snap(function(data_uri) {
                 $(".image-tagfront").val(data_uri);
                 document.getElementById('captured_image_front').innerHTML = '<img src="' + data_uri + '" style="width: 200px !important; height: 150px !important; margin-left: 40px !important; margin-top: 25px !important;"/>';
             });
         }

         Webcam.attach('#my_camera_back');
         function take_snapshot_back() {
             Webcam.snap(function(data_uri) {
                 $(".image-tagback").val(data_uri);
                 document.getElementById('captured_image_back').innerHTML = '<img src="' + data_uri + '" style="width: 200px !important; height: 150px !important; margin-left: 40px !important; margin-top: 25px !important;"/>';
             });
         }

         Webcam.attach('#my_camera');
         function takesnapshot() {
             Webcam.snap(function(data_uri) {
                 $(".image-tagcamera").val(data_uri);
                 document.getElementById('captured_cameraimage').innerHTML = '<img src="' + data_uri + '" style="width: 200px !important; height: 150px !important; margin-left: 40px !important; margin-top: 25px !important;"/>';
             });
         }


         // web fields
Webcam.attach('#web_camera_front');

function take_snapshot_webfront() {
    Webcam.snap(function(data_uri) {
        $(".webimage-tagfront").val(data_uri);
        document.getElementById('captured_webimage_front').innerHTML = '<img src="' + data_uri +
            '" style="height: 220px !important;width: 300px !important;margin-top: 40px;margin-left: 40px;"/>';
    });
}

Webcam.attach('#web_camera_back');

function take_snapshot_webback() {
    Webcam.snap(function(data_uri) {
        $(".webimage-tagback").val(data_uri);
        document.getElementById('captured_webimage_back').innerHTML = '<img src="' + data_uri +
            '" style="height: 220px !important;width: 300px !important;margin-top: 40px;margin-left: 40px;"/>';
    });
}

Webcam.attach('#web_camera');

function takewebsnapshot() {
    Webcam.snap(function(data_uri) {
        $(".webimage-tagcamera").val(data_uri);
        document.getElementById('captured_webcameraimage').innerHTML = '<img src="' + data_uri +
            '" style="height: 220px !important;width: 300px !important;margin-top: 40px;margin-left: 40px;"/>';
    });
}
    </script>
@endsection
