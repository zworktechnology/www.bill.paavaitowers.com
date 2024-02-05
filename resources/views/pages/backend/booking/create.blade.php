@extends('layouts.auth')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">New Booking</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                    <div class="modal-body">
                                            <form autocomplete="off" method="POST" action="{{ route('booking.noncash_gpaystore') }}" enctype="multipart/form-data">
                                            @csrf
                                                <div class="row mb-4">
                                                    <div class="col-md-5 col-12">
                                                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                            Booking Type <span style="color: red;">*</span> </label>
                                                        <select class="form-control booking_type" name="booking_type" required>
                                                            <option value="" selected hidden class="text-muted">Select Payment Via</option>
                                                            <option value="Spot Booking" class="text-muted">Spot Booking</option>
                                                            <option value="Make My Trip" class="text-muted"> Make My Trip</option>
                                                            <option value="Goibibo" class="text-muted"> Goibibo</option>
                                                            <option value="Agoda" class="text-muted"> Agoda</option>
                                                            <option value="Booking.com" class="text-muted">Booking.com</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4 websitediv" style="display:none">
                                                    <div class="col-md-4 col-12">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                            Booking ID <span style="color: red;">*</span> </label>
                                                        <input type="text" class="form-control webbooking_id"
                                                                name="webbooking_id" placeholder="Enter here " required>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                            Customer Name <span style="color: red;">*</span> </label>
                                                        <input type="text" class="form-control webcustomername"
                                                                name="webcustomername" placeholder="Enter here " required>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">
                                                        Contact Number <span style="color: red;">*</span> </label>
                                                        <input type="number" class="form-control contactnumber"
                                                            name="contactnumber" id="contactnumber" placeholder="Enter here "
                                                            required>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="websitediv" style="display:none">
                                                    <h4 class="card-title mb-4" style="color: #5b73e8">Head Rooms</h4>

                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                            Count <span style="color: red;">*</span> </label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control " name="web_male_count" required>
                                                                <option value="" selected hidden class="text-muted">Select Male Count</option>
                                                                <option value="0" class="text-muted">0</option>
                                                                <option value="1" class="text-muted">1</option>
                                                                <option value="2" class="text-muted">2</option>
                                                                <option value="3" class="text-muted">3</option>
                                                                <option value="4" class="text-muted">4</option>
                                                                <option value="5" class="text-muted">5</option>
                                                                <option value="6" class="text-muted">6</option>
                                                                <option value="7" class="text-muted">7</option>
                                                                <option value="8" class="text-muted">8</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <select class="form-control " name="web_female_count" required>
                                                                <option value="" selected hidden class="text-muted">Select Female Count</option>
                                                                <option value="0" class="text-muted">0</option>
                                                                <option value="1" class="text-muted">1</option>
                                                                <option value="2" class="text-muted">2</option>
                                                                <option value="3" class="text-muted">3</option>
                                                                <option value="4" class="text-muted">4</option>
                                                                <option value="5" class="text-muted">5</option>
                                                                <option value="6" class="text-muted">6</option>
                                                                <option value="7" class="text-muted">7</option>
                                                                <option value="8" class="text-muted">8</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <select class="form-control " name="web_child_count" required>
                                                                <option value="" selected hidden class="text-muted">Select Child Count</option>
                                                                <option value="0" class="text-muted">0</option>
                                                                <option value="1" class="text-muted">1</option>
                                                                <option value="2" class="text-muted">2</option>
                                                                <option value="3" class="text-muted">3</option>
                                                                <option value="4" class="text-muted">4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                            Check In Date <span style="color: red;">*</span> </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" class="form-control webcheck_in_date"
                                                                name="webcheck_in_date" placeholder="Enter here "
                                                                value="{{ $today }}" required>
                                                        </div>
                                                        <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                            Time <span style="color: red;">*</span> </label>
                                                        <div class="col-sm-4">
                                                            <input type="time" class="form-control" name="webcheck_in_time"
                                                                placeholder="Enter here " value="{{ $timenow }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                            No of Days - Stay <span style="color: red;">*</span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control web_noofdays" id="web_noofdays"
                                                                name="web_noofdays" placeholder="Enter here " required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                            Check Out Date </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" class="form-control webcheck_out_date"
                                                                name="webcheck_out_date" placeholder="Enter here " value="">
                                                        </div>
                                                        <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                            Time </label>
                                                        <div class="col-sm-4">
                                                            <input type="time" class="form-control" name="webcheck_out_time"
                                                                placeholder="Enter here " value="{{ $timenow }}">
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
                                                                                <tbody id="webroomfields" class="responsive_cls">
                                                                                    <tr>
                                                                                        <td
                                                                                            class="col-12 col-md-3 pr-2 py-1 text-left text-xs font-medium text-black-700  tracking-wider">
                                                                                            <input type="hidden" id="webroom_auto_id" name="webroom_auto_id[]" />
                                                                                            <select class="form-control webroom_id" name="webroom_id[]" id="webroom_id1" required>
                                                                                                <option value="" selected hidden class="text-muted"> Select Room</option>
                                                                                                @foreach ($roomsarr as $rooms_arr)
                                                                                                    @if ($rooms_arr->booking_status != 1)
                                                                                                        <option value="{{ $rooms_arr->id }}">
                                                                                                            Room No{{ $rooms_arr->room_number }}-{{ $rooms_arr->room_floor }} Floor
                                                                                                        </option>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </td>
                                                                                        <td class="col-12 col-md-3">
                                                                                            <select class="form-control webroom_type"
                                                                                                name="webroom_type[]" required>
                                                                                                <option value="" selected
                                                                                                    hidden class="text-muted">
                                                                                                    Select Room Type</option>
                                                                                                    <option value="Standard A/C" class="text-muted">Standard A/C</option>
                                                                                                <option value="Deluxe A/C" class="text-muted">Deluxe A/C</option>
                                                                                                <option value="Standard Non A/C" class="text-muted">Standard Non A/C</option>
                                                                                                <option value="King Size A/C" class="text-muted">King Size A/C</option>
                                                                                                <option value="Group Room" class="text-muted">Group Room</option>
                                                                                            </select>
                                                                                        </td>
                                                                                        <td class="col-12 col-md-1"><button
                                                                                                style="width: 100px;"
                                                                                                class="py-2 mr-5 text-white font-medium rounded-lg text-sm  text-center btn btn-success"
                                                                                                type="button" id="addwebroomfields"
                                                                                                value="Add">Add</button>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                                    <div class="row mb-4">
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-sm-3 col-form-label">
                                                                            Check In Staff <span style="color: red;">*</span>
                                                                        </label>
                                                                        <div class="col-sm-6">
                                                                            <select class="form-control" name="webcheck_in_staff"
                                                                                required>
                                                                                <option value="" disabled selected hiddden>
                                                                                    Select One</option>
                                                                                @foreach ($staff as $staffs)
                                                                                    <option value="{{ $staffs->id }}">
                                                                                        {{ $staffs->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
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
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control prooftype_one" name="prooftype_one"
                                                                                    style="width: 100%;" required>
                                                                                    <option value="" disabled selected hidden
                                                                                        class="text-muted">Select Type</option>
                                                                                    <option value="Aadhaar Card" class="text-muted">Aadhaar Card
                                                                                    </option>
                                                                                    <option value="Passport" class="text-muted">Passport</option>
                                                                                    <option value="Voter ID" class="text-muted">Voter ID</option>
                                                                                    <option value="Driving Licence" class="text-muted">Driving
                                                                                        Licence</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="row mb-4" id="proof1" >
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-sm-3 col-form-label">Proof Front<span
                                                                                style="color: red;">*</span> </label>
                                                                        <div class="col-sm-9">
                                                                        <input type="file" class="form-control"
                                                                                name="proofimage_one">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4" id="proof2" >
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-sm-3 col-form-label">Proof Back<span
                                                                                style="color: red;">*</span> </label>
                                                                        <div class="col-sm-9">
                                                                        <input type="file" class="form-control"
                                                                                name="proofimage_two">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4" id="proof_photo" >
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-sm-3 col-form-label">Photo<span
                                                                                style="color: red;">*</span> </label>
                                                                        <div class="col-sm-9">
                                                                        <input type="file" class="form-control"
                                                                                name="customer_photo">
                                                                        </div>
                                                                    </div>



                                                                    <div class="row mb-4" id="proof1" hidden>
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-sm-3 col-form-label">Proof Front<span
                                                                                style="color: red;">*</span> </label>
                                                                        <div class="col-sm-7">
                                                                            <div style="display: flex">
                                                                                <div id="web_camera_front"></div>
                                                                                <div id="captured_webimage_front"></div>
                                                                            </div>
                                                                            <input type=button
                                                                                class=" btn btn-sm btn-soft-primary"value="Take a Snap - Front Proof"
                                                                                onClick="take_snapshot_webfront()">
                                                                            <input type="hidden" class="form-control webimage-tagfront"
                                                                                name="proofimage_one">
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                        <div id="webprooffront"></div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="row mb-4" id="proof2" hidden>
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-sm-3 col-form-label">Proof Back<span
                                                                                style="color: red;">*</span> </label>
                                                                        <div class="col-sm-7">
                                                                            <div style="display: flex">
                                                                                <div id="web_camera_back"></div>
                                                                                <div id="captured_webimage_back"></div>
                                                                            </div>
                                                                            <input type=button
                                                                                class=" btn btn-sm btn-soft-primary"value="Take a Snap - Back Proof"
                                                                                onClick="take_snapshot_webback()">
                                                                            <input type="hidden" class="form-control webimage-tagback"
                                                                                name="proofimage_two">
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                        <div id="webproofback"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-4" id="proof_photo" hidden>
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-sm-3 col-form-label">Photo <span
                                                                                style="color: red;">*</span> </label>
                                                                        <div class="col-sm-7">
                                                                            <div style="display: flex">
                                                                                <div id="web_camera"></div>
                                                                                <div id="captured_webcameraimage"></div>
                                                                            </div>
                                                                            <input type=button class=" btn btn-sm btn-soft-primary"value="Take a Snap - Photo"
                                                                                onClick="takewebsnapshot()">
                                                                            <input type="hidden" class="form-control webimage-tagcamera"
                                                                                name="customer_photo">
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                        <div id="webproofcustomerphoto"></div>
                                                                        </div>
                                                                    </div>

                                                    <hr>

                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary" name="checkin_website" value="Submit" 
                                                            style="margin-right: 10%;" />
                                                    </div>
                                                </div>

                                            </form>  
                                               


                                                <br/>











                                            <form autocomplete="off" method="POST" action="{{ route('booking.cash_gpaystore') }}" enctype="multipart/form-data">
                                            @csrf


                                            <input type="hidden" class="form-control cash_booking_type"
                                                                name="cash_booking_type" id="cash_booking_type" value="" required>

                                                <div class="gpaydiv" style="display:none">
                                                    <h4 class="card-title mb-4" style="color: #5b73e8">Profile</h4>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                            Customer Name <span style="color: red;">*</span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="name" class="form-control booking_customer_name"
                                                                name="booking_customer_name" placeholder="Enter here " required>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                            Contact Number <span style="color: red;">*</span> </label>
                                                        <div class="col-sm-4">
                                                            <input type="number" class="form-control phone_number"
                                                                name="phone_number" id="phone_number" placeholder="Enter here "
                                                                required>
                                                            <div class="phonenumber_list" style="display:none"></div>
                                                            <div class="form-check mt-2">
                                                                <input type="checkbox" class="form-check-input whatsapp_check"
                                                                    id="formrow-customCheck">
                                                                <label class="form-check-label" for="formrow-customCheck">Same as
                                                                    Whatsapp number</label>
                                                            </div>
                                                        </div>
                                                        {{ csrf_field() }}
                                                        <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                            Whatsapp <span style="color: red;">*</span> </label>
                                                        <div class="col-sm-4">
                                                            <input type="number" class="form-control whats_app_number"
                                                                name="whats_app_number" placeholder="Enter here " required>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                            Email ID </label>
                                                        <div class="col-sm-4">
                                                            <input type="email" class="form-control email_id" name="email_id"
                                                                placeholder="Enter here ">
                                                        </div>
                                                        <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                            Address </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control address" name="address"
                                                                placeholder="Enter here ">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                            GST Number </label>
                                                        <div class="col-sm-9">
                                                            <input type="name" class="form-control" name="gst_number"
                                                                placeholder="Enter here ">
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <h4 class="card-title mb-4" style="color: #5b73e8">Head Rooms</h4>

                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                            Count <span style="color: red;">*</span> </label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control " name="male_count" required>
                                                                <option value="" selected hidden class="text-muted">Select Male Count</option>
                                                                <option value="0" class="text-muted">0</option>
                                                                <option value="1" class="text-muted">1</option>
                                                                <option value="2" class="text-muted">2</option>
                                                                <option value="3" class="text-muted">3</option>
                                                                <option value="4" class="text-muted">4</option>
                                                                <option value="5" class="text-muted">5</option>
                                                                <option value="6" class="text-muted">6</option>
                                                                <option value="7" class="text-muted">7</option>
                                                                <option value="8" class="text-muted">8</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <select class="form-control " name="female_count" required>
                                                                <option value="" selected hidden class="text-muted">Select Female Count</option>
                                                                <option value="0" class="text-muted">0</option>
                                                                <option value="1" class="text-muted">1</option>
                                                                <option value="2" class="text-muted">2</option>
                                                                <option value="3" class="text-muted">3</option>
                                                                <option value="4" class="text-muted">4</option>
                                                                <option value="5" class="text-muted">5</option>
                                                                <option value="6" class="text-muted">6</option>
                                                                <option value="7" class="text-muted">7</option>
                                                                <option value="8" class="text-muted">8</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <select class="form-control " name="child_count" required>
                                                                <option value="" selected hidden class="text-muted">Select Child Count</option>
                                                                <option value="0" class="text-muted">0</option>
                                                                <option value="1" class="text-muted">1</option>
                                                                <option value="2" class="text-muted">2</option>
                                                                <option value="3" class="text-muted">3</option>
                                                                <option value="4" class="text-muted">4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                            Check In Date <span style="color: red;">*</span> </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" class="form-control check_in_date"
                                                                name="check_in_date" placeholder="Enter here "
                                                                value="{{ $today }}" required>
                                                        </div>
                                                        <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                            Time <span style="color: red;">*</span> </label>
                                                        <div class="col-sm-4">
                                                            <input type="time" class="form-control" name="check_in_time"
                                                                placeholder="Enter here " value="{{ $timenow }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                            No of Days - Stay <span style="color: red;">*</span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control days" id="days"
                                                                name="days" placeholder="Enter here " required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                            Check Out Date </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" class="form-control check_out_date"
                                                                name="check_out_date" placeholder="Enter here " value="">
                                                        </div>
                                                        <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">
                                                            Time </label>
                                                        <div class="col-sm-4">
                                                            <input type="time" class="form-control" name="check_out_time"
                                                                placeholder="Enter here " value="{{ $timenow }}">
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
                                                                                <tbody id="roomfields" class="responsive_cls">
                                                                                    <tr>
                                                                                        <td
                                                                                            class="col-12 col-md-3 pr-2 py-1 text-left text-xs font-medium text-black-700  tracking-wider">
                                                                                            <input type="hidden" id="room_auto_id" name="room_auto_id[]" />
                                                                                            <select class="form-control room_id" name="room_id[]" id="room_id1" required>
                                                                                                <option value="" selected hidden class="text-muted"> Select Room</option>
                                                                                                @foreach ($roomsarr as $rooms_arr)
                                                                                                    @if ($rooms_arr->booking_status != 1)
                                                                                                        <option value="{{ $rooms_arr->id }}">
                                                                                                            Room No{{ $rooms_arr->room_number }}-{{ $rooms_arr->room_floor }} Floor
                                                                                                        </option>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </td>
                                                                                        <td class="col-12 col-md-3">
                                                                                            <select class="form-control room_type"
                                                                                                name="room_type[]" required>
                                                                                                <option value="" selected
                                                                                                    hidden class="text-muted">
                                                                                                    Select Room Type</option>
                                                                                                <option value="Standard A/C" class="text-muted">Standard A/C</option>
                                                                                                <option value="Deluxe A/C" class="text-muted">Deluxe A/C</option>
                                                                                                <option value="Standard Non A/C" class="text-muted">Standard Non A/C</option>
                                                                                                <option value="King Size A/C" class="text-muted">King Size A/C</option>
                                                                                                <option value="Group Room" class="text-muted">Group Room</option>
                                                                                            </select>
                                                                                        </td>
                                                                                        <td class="col-12 col-md-2"><input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                id="room_price1"
                                                                                                name="room_price[]"
                                                                                                placeholder="Price Per Day"
                                                                                                value="" required /></td>
                                                                                        <td class="col-12 col-md-2"><input
                                                                                                type="text"
                                                                                                class="form-control room_cal_price"
                                                                                                id="room_cal_price1" readonly
                                                                                                name="room_cal_price[]"
                                                                                                placeholder="Price" value=""
                                                                                                required /></td>
                                                                                        <td class="col-12 col-md-1"><button
                                                                                                style="width: 100px;"
                                                                                                class="py-2 mr-5 text-white font-medium rounded-lg text-sm  text-center btn btn-success"
                                                                                                type="button" id="addroomfields"
                                                                                                value="Add">Add</button>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

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
                                                                                Total - Room Price <span
                                                                                    style="color: red;">*</span> </label>
                                                                        </div>
                                                                        <div class="col-md-9 col-12">
                                                                            <input type="text"
                                                                                class="form-control total_calc_price" readonly name="total_calc_price" id="total_calc_price" required>
                                                                        </div>
                                                                    </div>
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
                                                                                    <option value="{{ $coupons->id }}">
                                                                                        {{ $coupons->coupon_code }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div data-repeater-item class="inner mb-3 row">
                                                                        <div class="col-md-3 col-12">
                                                                            <label for="horizontal-firstname-input"
                                                                                class="col-form-label">
                                                                                Total After Discount <span
                                                                                    style="color: red;">*</span> </label>
                                                                        </div>
                                                                        <div class="col-md-5 col-12">
                                                                            <input type="text" class="form-control totalamount_afterdiscount"
                                                                                name="totalamount_afterdiscount" readonly >
                                                                        </div>
                                                                        <div class="col-md-4 col-12">
                                                                            <input type="text" class="form-control discountamount"
                                                                                name="discountamount" placeholder="Discount Amout" readonly >
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-sm-3 col-form-label">
                                                                            GST % <span style="color: red;">*</span> </label>
                                                                        <div class="col-sm-4" >
                                                                            <input type="text" class="form-control gst_amount"
                                                                                name="gst_amount"
                                                                                placeholder="GST Amount - Enter here " readonly>
                                                                        </div>
                                                                        <div class="col-sm-5">
                                                                            <input type="text"
                                                                                class="form-control gst_percentage"
                                                                                name="gst_percentage"
                                                                                placeholder="Gst % - Enter here " required>
                                                                        </div>
                                                                    </div>
                                                                    <div data-repeater-item class="inner mb-3 row">
                                                                        <div class="col-md-3 col-12">
                                                                            <label for="horizontal-firstname-input"
                                                                                class="col-form-label">
                                                                                Grand Total - To Pay <span
                                                                                    style="color: red;">*</span> </label>
                                                                        </div>
                                                                        <div class="col-md-9 col-12">
                                                                            <input type="text" class="form-control grand_total"
                                                                            style="background-color:#69d074ad" readonly
                                                                                name="grand_total" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-4">
                                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Payable Amount </label>
                                                                        <div class="col-sm-9">
                                                                            <table class="table-fixed col-12 " id="">
                                                                                <tr>
                                                                                    <th>Terms</th>
                                                                                    <th>Amount</th>
                                                                                    <th>Payment Method</th>
                                                                                </tr>

                                                                                    <tr>
                                                                                        <td class="col-sm-3">
                                                                                            <select class="form-control" name="payment_term[]">
                                                                                                <option value="Term I" class="text-muted">Term I</option>
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
                                                                                            <select class="form-control" name="payment_method[]">
                                                                                                <option value="" selected  class="text-muted">Select</option>
                                                                                                <option value="Cash" class="text-muted">Cash</option>
                                                                                                <option value="GPay" class="text-muted">GPay</option>
                                                                                                <option value="Advance Payment" class="text-muted">Advance Payment</option>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="col-sm-3">
                                                                                            <select class="form-control" name="payment_term[]">
                                                                                                <option value="Term II" class="text-muted">Term II</option>
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
                                                                                            <select class="form-control " name="payment_method[]">
                                                                                                <option value="" selected  class="text-muted">Select</option>
                                                                                                <option value="Cash" class="text-muted">Cash</option>
                                                                                                <option value="GPay" class="text-muted">GPay</option>
                                                                                                <option value="Advance Payment" class="text-muted">Advance Payment</option>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="col-sm-3">
                                                                                            <select class="form-control" name="payment_term[]">
                                                                                                <option value="Term III" class="text-muted">Term III</option>
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
                                                                                            <select class="form-control " name="payment_method[]">
                                                                                                <option value="" selected  class="text-muted">Select</option>
                                                                                                <option value="Cash" class="text-muted">Cash</option>
                                                                                                <option value="GPay" class="text-muted">GPay</option>
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
                                                                                Total Paid Amount <span style="color: red;">*</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-9 col-12">
                                                                            <input type="text" class="form-control total_payable" name="total_payable" readonly  style="color: green;"  required>
                                                                        </div>
                                                                    </div>
                                                                    <div data-repeater-item class="inner mb-3 row">
                                                                        <div class="col-md-3 col-12">
                                                                            <label for="horizontal-firstname-input"
                                                                                class="col-form-label">
                                                                                Balance Amount <span style="color: red;">*</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-9 col-12">
                                                                            <input type="text"
                                                                                class="form-control balance_amount"
                                                                                style="color: red;" value="0" readonly
                                                                                name="balance_amount" placeholder="Enter here "
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <label for="horizontal-firstname-input"
                                                                            class="col-sm-3 col-form-label">
                                                                            Check In Staff <span style="color: red;">*</span>
                                                                        </label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-control" name="check_in_staff"
                                                                                required>
                                                                                <option value="" disabled selected hiddden>
                                                                                    Select One</option>
                                                                                @foreach ($staff as $staffs)
                                                                                    <option value="{{ $staffs->id }}">
                                                                                        {{ $staffs->name }}
                                                                                    </option>
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
                                                                <select class="form-control prooftype_one" name="prooftype_one"
                                                                    style="width: 100%;" required>
                                                                    <option value="" disabled selected hidden
                                                                        class="text-muted">Select Type</option>
                                                                    <option value="Aadhaar Card" class="text-muted">Aadhaar Card
                                                                    </option>
                                                                    <option value="Passport" class="text-muted">Passport</option>
                                                                    <option value="Voter ID" class="text-muted">Voter ID</option>
                                                                    <option value="Driving Licence" class="text-muted">Driving
                                                                        Licence</option>
                                                                </select>
                                                            </div>
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




                                                    <div class="row mb-4" id="proof1" >
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-3 col-form-label">Proof Front<span
                                                                style="color: red;">*</span> </label>
                                                        <div class="col-sm-7">
                                                            <div style="display: flex">
                                                                <div id="my_camera_front"></div>
                                                                <div id="captured_image_front"></div>
                                                            </div>
                                                            <input type=button
                                                                class=" btn btn-sm btn-soft-primary"value="Take a Snap - Front Proof"
                                                                onClick="take_snapshot_front()">
                                                            <input type="hidden" class="form-control image-tagfront"
                                                                name="proofimage_one">
                                                        </div>
                                                        <div class="col-sm-2">
                                                        <div id="prooffront"></div>
                                                        </div>
                                                    </div>


                                                    <div class="row mb-4" id="proof2" >
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-3 col-form-label">Proof Back<span
                                                                style="color: red;">*</span> </label>
                                                        <div class="col-sm-7">
                                                            <div style="display: flex">
                                                                <div id="my_camera_back"></div>
                                                                <div id="captured_image_back"></div>
                                                            </div>
                                                            <input type=button
                                                                class=" btn btn-sm btn-soft-primary"value="Take a Snap - Back Proof"
                                                                onClick="take_snapshot_back()">
                                                            <input type="hidden" class="form-control image-tagback"
                                                                name="proofimage_two">
                                                        </div>
                                                        <div class="col-sm-2">
                                                        <div id="proofback"></div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-4" id="proof_photo" >
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-3 col-form-label">Photo <span
                                                                style="color: red;">*</span> </label>
                                                        <div class="col-sm-7">
                                                            <div style="display: flex">
                                                                <div id="my_camera"></div>
                                                                <div id="captured_cameraimage"></div>
                                                            </div>
                                                            <div id="my_camera"></div><br />
                                                            <input type=button class=" btn btn-sm btn-soft-primary"value="Take a Snap - Photo"
                                                                onClick="takesnapshot()">
                                                            <input type="hidden" class="form-control image-tagcamera"
                                                                name="customer_photo">
                                                        </div>
                                                        <div class="col-sm-2">
                                                        <div id="proofcustomerphoto"></div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                            <input type="submit" class="btn btn-primary" name="checkin" value="checkin" 
                                                                style="margin-right: 10%;" />
                                                        </div>

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

    <script language="JavaScript">
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




        ;
        (function($, window, document, undefined) {
            $("#web_noofdays").on("keyup", function() {
                var date = new Date($(".check_in_date").val()),
                web_noofdays = parseInt($("#web_noofdays").val(), 10);

                if (!isNaN(date.getTime())) {
                    date.setDate(date.getDate() + web_noofdays);

                    $(".webcheck_out_date").val(date.toInputFormat());
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





        // AJAX call for autocomplete
        $(document).ready(function() {
            $(".phone_number").keyup(function() {

                var query = $(this).val();
                if (query != '') {
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('booking.autocomplete') }}",
                        data: {
                            query: query,
                            _token: _token
                        },

                        success: function(data) {
                            console.log(data);
                            $('.phonenumber_list').fadeIn();
                            $('.phonenumber_list').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function() {
                $('#phone_number').val($(this).text());
                $('.phonenumber_list').fadeOut();
                $.ajax({
                    url: '/getoldCustomers/' + $(this).text(),
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response['data']);
                    
                       
                        
                            //console.log(response[i].customer_name);
                            $('.booking_customer_name').val(response['data'].customer_name);
                            $('.whats_app_number').val(response['data'].whats_app_number);
                            $('.email_id').val(response['data'].email_id);
                            $('.address').val(response['data'].address);
                            $('.prooftype_one').val(response['data'].prooftype_one);
                            $("#prooffront").append("<img src='https://bill-paavaitowers.zworktechnology.in/" + response['data'].proofimage_one +"' style='width: 200px !important; height: 150px !important; margin-right: 40px !important; margin-top: 25px !important;'>");
                            $("#proofback").append("<img src='https://bill-paavaitowers.zworktechnology.in/" + response['data'].proofimage_two +"' style='width: 200px !important; height: 150px !important; margin-right: 40px !important; margin-top: 25px !important;'>");
                            $("#proofcustomerphoto").append("<img src='https://bill-paavaitowers.zworktechnology.in/" + response['data'].customer_photo +"' style='width: 200px !important; height: 150px !important; margin-right: 40px !important; margin-top: 25px !important;'>");

                            
                            $("#webprooffront").append("<img src='https://bill-paavaitowers.zworktechnology.in/" + response['data'].proofimage_one +"' style='width: 200px !important; height: 150px !important; margin-right: 40px !important; margin-top: 25px !important;'>");
                            $("#webproofback").append("<img src='https://bill-paavaitowers.zworktechnology.in/" + response['data'].proofimage_two +"' style='width: 200px !important; height: 150px !important; margin-right: 40px !important; margin-top: 25px !important;'>");
                            $("#webproofcustomerphoto").append("<img src='https://bill-paavaitowers.zworktechnology.in/" + response['data'].customer_photo +"' style='width: 200px !important; height: 150px !important; margin-right: 40px !important; margin-top: 25px !important;'>");
                            
                        
                    }
                });
            });
        });

        $(document).ready(function() {

            $('.whatsapp_check').click(function() {
                if ($(this).is(':checked')) {
                    var phone_number = $('#phone_number').val();
                    $('.whats_app_number').val(phone_number);
                } else {
                    $('.whats_app_number').val('');
                }
            });

          

            // Room onchange function

           



            $('.booking_type').on('change', function() {
                var booking_type = $(this).val();
                if (booking_type == 'Spot Booking') {
                    $(".gpaydiv").show();
                    $(".websitediv").hide();
                    $('.cash_booking_type').val('Spot Booking');
                } else if (booking_type == 'Make My Trip') {
                    $(".gpaydiv").hide();
                    $(".websitediv").show();
                } else if (booking_type == 'Goibibo') {
                    $(".gpaydiv").hide();
                    $(".websitediv").show();
                } else if (booking_type == 'Agoda') {
                    $(".gpaydiv").hide();
                    $(".websitediv").show();
                } else if (booking_type == 'Booking.com') {
                    $(".gpaydiv").hide();
                    $(".websitediv").show();
                }
            });


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

        // Add Another Room Script
        var i = 1;
        var j = 1;
        var l = 1;
        var h = 1;
        var m = 1;
        var n = 1;
        //var add_count = [];
        //console.log(add_count);


        $(document).ready(function() {
            $("#addroomfields").click(function() {
                ++i;
                $("#roomfields").append(
                    '<tr><td class="col-12 col-md-3 pr-2 py-1 text-left text-xs font-medium text-black-700 tracking-wider"><input type="hidden" id="room_auto_id" name="room_auto_id[]" /><select class="form-control js-example-basic-single room_id" name="room_id[]" id="room_id' +
                    i +
                    '" required><option value="" selected hidden class="text-muted">Select Room</option></select></td><td class="col-12 col-md-3" style="margin-left: 3px;">' +
                    '<select class="form-control room_type" name="room_type[]" required>' +
                    '<option value="" selected hidden class="text-muted">Select Room Type</option>' +
                    '<option value="Standard A/C" class="text-muted">Standard A/C</option>' +
                    '<option value="Deluxe A/C" class="text-muted">Deluxe A/C</option>' +
                    '<option value="Standard Non A/C" class="text-muted">Standard Non A/C</option>' +
                    '<option value="King Size A/C" class="text-muted">King Size A/C</option>' +
                    '<option value="Group Room" class="text-muted">Group Room</option>' +
                    '</select></td><td class="col-12 col-md-2" style="margin-left: 3px;"><input type="text" class="form-control" id="room_price' +
                    i +
                    '" name="room_price[]" placeholder="Price Per Day" value="" required/></td><td class="col-12 col-md-2" style="margin-left: 3px;"><input type="text" class="form-control room_cal_price" readonly id="room_cal_price' +
                    i +
                    '" name="room_cal_price[]" placeholder="Price" value="" required/></td><td class="col-12 col-md-1" style="margin-left: 4px;"><button style="width: 100px;" class="text-white font-medium rounded-lg text-sm  text-center btn btn-danger remove-tr" type="button" >Remove</button></td></tr>'
                );

                //alert('branch_id');
                $.ajax({
                    url: '/getBranchwiseRoom/',
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        //console.log(response['data']);
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

                                    var price = response['data'][i].price_per_day;
                                    selectedValues.push(option);
                                }
                            }
                        }
                        ++j;
                        $('#room_id' + j).append(selectedValues);
                        //add_count.push(Object.keys(selectedValues).length);
                    }
                });


            });
        });


        $(document).ready(function() {
            $("#addwebroomfields").click(function() {
                ++m;
                $("#webroomfields").append(
                    '<tr><td class="col-12 col-md-3 pr-2 py-1 text-left text-xs font-medium text-black-700  tracking-wider"><input type="hidden" id="webroom_auto_id" name="webroom_auto_id[]" />'+
                    '<select class="form-control webroom_id" name="webroom_id[]" id="webroom_id' + m + '" required><option value="" selected hidden class="text-muted"> Select Room</option></select></td>' +
                    '<td class="col-12 col-md-3"><select class="form-control webroom_type" name="webroom_type[]" required>' +
                    '<option value="" selected hidden class="text-muted">Select Room Type</option>' +
                    '<option value="Standard A/C" class="text-muted">Standard A/C</option>' +
                    '<option value="Deluxe A/C" class="text-muted">Deluxe A/C</option>' +
                    '<option value="Standard Non A/C" class="text-muted">Standard Non A/C</option>' +
                    '<option value="King Size A/C" class="text-muted">King Size A/C</option>' +
                    '<option value="Group Room" class="text-muted">Group Room</option>' +
                    '</select></td>' +
                    '<td class="col-12 col-md-1" style="margin-left: 4px;"><button style="width: 100px;" class="text-white font-medium rounded-lg text-sm  text-center btn btn-danger remove-webtr" type="button" >Remove</button></td></tr>'
                );

                //alert('branch_id');
                $.ajax({
                    url: '/getBranchwiseRoom/',
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        //console.log(response['data']);
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

                                    var price = response['data'][i].price_per_day;
                                    selectedValues.push(option);
                                }
                            }
                        }
                        ++n;
                        $('#webroom_id' + n).append(selectedValues);
                    }
                });


            });
        });


        $(document).on('click', '.remove-webtr', function() {
            $(this).parents('tr').remove();
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



        $(document).on("keyup", 'input.payable_amount', function() {
            var payable_amount = $(this).val();
            var grand_total = $(".grand_total").val();

            if (Number(payable_amount) > Number(grand_total)) {
                alert('You are entering Maximum Amount of Total');
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
            width: 300,
            height: 300,
            image_format: 'jpeg',
            jpeg_quality: 90,
            facingMode: 'environment'
        });

        Webcam.attach('#my_camera_front');

        function take_snapshot_front() {
            Webcam.snap(function(data_uri) {
                $(".image-tagfront").val(data_uri);
                document.getElementById('captured_image_front').innerHTML = '<img src="' + data_uri +
                    '" style="height: 220px !important;width: 300px !important;margin-top: 40px;margin-left: 40px;"/>';
            });
        }

        Webcam.attach('#my_camera_back');

        function take_snapshot_back() {
            Webcam.snap(function(data_uri) {
                $(".image-tagback").val(data_uri);
                document.getElementById('captured_image_back').innerHTML = '<img src="' + data_uri +
                    '" style="height: 220px !important;width: 300px !important;margin-top: 40px;margin-left: 40px;"/>';
            });
        }

        Webcam.attach('#my_camera');

        function takesnapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tagcamera").val(data_uri);
                document.getElementById('captured_cameraimage').innerHTML = '<img src="' + data_uri +
                    '" style="height: 220px !important;width: 300px !important;margin-top: 40px;margin-left: 40px;"/>';
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


    function bookingubmitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }
    </script>
@endsection
