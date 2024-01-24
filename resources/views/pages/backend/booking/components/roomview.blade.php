<div class="modal-dialog  modal-xl " >
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:green;text-transform:uppercase">Room No  {{ $bookingData['room_no'] }}  - Floor {{ $bookingData['room_floor'] }}</h5>
                                                        <button type="button" class="btn-close "
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body" >
                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-2 col-form-label">Customer Name </label>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" readonly=""
                                                                    value="{{ $bookingData['customer_name'] }}">
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-2 col-form-label">Contact Number </label>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" readonly=""
                                                                    value="{{ $bookingData['phone_number'] }}">
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-2 col-form-label">Check-In Date</label>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" readonly=""
                                                                    value="{{ $bookingData['checkindate'] }}">
                                                            </div>
                                                        </div>


                                                        <div class="row mb-4">
                                                            
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-2 col-form-label">Check-Out Date</label>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" readonly=""
                                                                    value="{{ $bookingData['chick_out_date'] }}">
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-2 col-form-label">No Of Days</label>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" readonly=""
                                                                    value="{{ $bookingData['days'] }}">
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-2 col-form-label">Count Head</label>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" readonly=""
                                                                    value="{{ $bookingData['count_head'] }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-2 col-form-label">Grand Total</label>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" readonly=""
                                                                    value="{{ $bookingData['grand_total'] }}" >
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-2 col-form-label">Total Paid</label>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" readonly=""
                                                                    value="{{ $bookingData['total_paid'] }}">
                                                            </div>
                                                            
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-2 col-form-label">Balance Amount</label>
                                                            <div class="col-sm-2">
                                                                    <input type="text" class="form-control" readonly=""
                                                                       value="{{ $bookingData['balance_amount'] }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-2 col-form-label">Payment Paid</label>
                                                            <div class="col-sm-6 row">
                                                                @foreach ($bookingData['terms'] as $index => $term_arr)
                                                                    @if ($term_arr['booking_id'] == $bookingData['latest_booking_id'])
                                                                        <span class="col-sm-4">
                                                                            <input type="text" 
                                                                                readonly=""
                                                                                class="form-control"id=""
                                                                                value="{{ $term_arr['term'] }}">
                                                                        </span>
                                                                        <span class="col-sm-4">
                                                                            <input type="text"
                                                                                readonly=""
                                                                                class="form-control"id=""
                                                                                value="{{ $term_arr['payable_amount'] }}">
                                                                        </span>
                                                                        <span class="col-sm-4">
                                                                            <input type="text" 
                                                                                readonly=""
                                                                                class="form-control"id=""
                                                                                value="{{ $term_arr['payment_method'] }}">
                                                                        </span>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-2 col-form-label">Check In Staff</label>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" readonly=""
                                                                    value="{{ $bookingData['checkin_staff'] }}">
                                                            </div>
                                                        </div>

                                                    

                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-3 col-form-label">Proof Image View</label>
                                                            <div class="col-sm-8 row">
                                                                <span class="col-sm-4">
                                                                    <img src="{{ asset('assets/customer_details/proofimage_one/' .$bookingData['proofimage_one']) }}"
                                                                        alt="image description"
                                                                        style="width:70px; height:50px;">
                                                                </span>
                                                                <span class="col-sm-4">
                                                                    <img src="{{ asset('assets/customer_details/proofimage_two/' .$bookingData['proofimage_two']) }}"
                                                                        alt="image description"
                                                                        style="width:70px; height:50px;">
                                                                </span>
                                                                <span class="col-sm-4">
                                                                    <img src="{{ asset('assets/customer_details/customer_photo/' .$bookingData['customer_photo']) }}"
                                                                        alt="image description"
                                                                        style="width:70px; height:50px;">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    

                                                    </div>

                                                </div>
                                            </div>