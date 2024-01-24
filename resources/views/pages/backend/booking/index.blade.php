@extends('layouts.auth')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <a href="{{ route('booking.create') }}"><button
                                    type="button" class="btn btn-primary waves-effect waves-light mb-3"><i
                                        class="mdi mdi-plus me-1"></i> {{ __('messages.newbooking_title') }}</button></a>

                            <div class="page-title-right" style="display:flex">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <ol class="breadcrumb m-0">
                                        <form autocomplete="off" method="POST"
                                            action="{{ route('booking.datefilter') }}"
                                            style="display: flex;">
                                            @method('PUT')
                                            @csrf
                                            <li style="margin-left: 10px;"><input type="date" name="from_date" required
                                                    class="form-control from_date" value="{{ $today }}"></li>
                                            <li style="margin-left: 10px;"><button type="submit"
                                                    class="btn btn-primary home_search">Search</button></li>
                                        </form>
                                    </ol>
                                </div>
                                <div class="page-title-box d-flex align-items-center justify-content-between"
                                    style="margin-left: 10px;">
                                    <div class="page-title-right">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true">
                                                Filter by Status <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -41.3167px);"
                                                data-popper-placement="top-start">
                                                <a class="dropdown-item {{ Route::is('booking.index') ? 'mm-active' : '' }}"
                                                    href="{{ route('booking.index') }}">{{ __('messages.openedbooking_title') }}</a>
                                                <a class="dropdown-item {{ Route::is('booking.today') ? 'mm-active' : '' }}"
                                                    href="{{ route('booking.today') }}">{{ __('messages.closedbooking_title') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($rooms_arr as $bookingData)
                                    @if($bookingData['status'] == 'Booked Green')
                                        <div class="col-md-1"
                                            style="border: 2px solid; margin: 10px; padding: 10px; border-radius: 10px;background:green;">

                                            <a href="#room_view{{ $bookingData['latest_booking_id'] }}"
                                                data-bs-toggle="modal" data-id="{{ $bookingData['latest_booking_id'] }}"
                                                class="room_view{{ $bookingData['latest_booking_id'] }}"
                                                data-bs-target="#room_view{{ $bookingData['latest_booking_id'] }}">

                                                <div>
                                                    <h4 class="mb-1 mt-1" style="color:white;">
                                                        {{ $bookingData['room_no'] }}
                                                    </h4>
                                                    <p class=" mb-0" style="color:white;">Floor.
                                                        {{ $bookingData['room_floor'] }}</p>
                                                </div>

                                            </a>

                                        </div>
                                    @elseif($bookingData['status'] == 'Open')
                                        <div class="col-md-1"
                                            style="border: 2px solid; margin: 10px; padding: 10px; border-radius: 10px;">
                                            <div>
                                                <h4 class="mb-1 mt-1">{{ $bookingData['room_no'] }}</h4>
                                                <p class="text-muted mb-0">Floor. {{ $bookingData['room_floor'] }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="modal fade" id="room_view{{ $bookingData['latest_booking_id'] }}"
                                        data-bs-backdrop="static" aria-hidden="true" 
                                        aria-labelledby="..." tabindex="-1" >
                                        @include('pages.backend.booking.components.roomview')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div style="display: flex;">
                        <div class="col-md-4" style="margin-right: 15px;">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Room Details</h4>
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>
                                                        {{ $totalrooms }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Avaiable</td>
                                                    <td>
                                                        {{ $availablerooms }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Booked</td>
                                                    <td>
                                                        {{ $totalrooms - $availablerooms }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0" id="booking_datatable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Sl.No</th>
                                                    <th>Bill.No</th>
                                                    <th>Booking Type</th>
                                                    <th>Room Deatails</th>
                                                    <th>Customer</th>
                                                    <th>Staff</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dailyentryData as $keydata => $dailyentryDatas)
                                                    <tr>
                                                        <td>{{ ++$keydata }}</td>
                                                        <td>{{ $dailyentryDatas['booking_invoiceno'] }}</td>
                                                        
                                                        <td>{{ $dailyentryDatas['booking_type'] }}</td>
                                                        <td>
                                                            @foreach ($dailyentryDatas['room_lists'] as $index => $room_lists_arr)
                                                                @if ($room_lists_arr['booking_id'] == $dailyentryDatas['id'])

                                                                        <span>{{ $room_lists_arr['room'] }}<br /></span>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{ $dailyentryDatas['customer_name'] }}
                                                        </td>
                                                        <td>
                                                            {{ $dailyentryDatas['checkinstaff'] }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive nowrap" id="bookings_datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>{{ __('messages.billno') }}</th>
                                            <th>Room Details</th>>
                                            <th>{{ __('messages.customer') }}</th>
                                                    <th>Booking Type</th>
                                            <th>Manager Name</th>
                                            <th>Check In Date & Time</th>
                                            <th>Check Out Date & Time</th>
                                            <th>{{ __('messages.action_title') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookingtable as $bookingDatas)
                                            <tr>
                                                <td>{{ $bookingDatas['booking_invoiceno'] }}</td>
                                                <td>
                                                        @foreach ($bookingDatas['room_list'] as $index => $room_lists)
                                                            @if ($room_lists['booking_id'] == $bookingDatas['id'])
                                                                    <span >{{ $room_lists['room'] }}<br /></span>
                                                            @endif
                                                        @endforeach
                                                </td>
                                                <td href="#basic{{ $bookingDatas['id'] }}" data-bs-toggle="modal"
                                                    data-bs-target="#basic{{ $bookingDatas['id'] }}" class="pointer" style="color:green">
                                                    {{ $bookingDatas['customer_name'] }}</td>
                                                    <td>{{ $bookingDatas['booking_type'] }}</td>
                                                <td>{{ $bookingDatas['check_in_staff'] }}</td>
                                                <td><span>{{ date('d M Y', strtotime($bookingDatas['chick_in_date'])) }}
                                                        -
                                                        ({{ date('h:i A', strtotime($bookingDatas['chick_in_time'])) }})
                                                    </span></td>
                                                <td>
                                                    @if ($bookingDatas['status'] == 2)
                                                        <span>{{ date('d M Y', strtotime($bookingDatas['out_date'])) }}
                                                            -
                                                            ({{ date('h:i A', strtotime($bookingDatas['out_time'])) }})
                                                        </span>
                                                    @elseif (($bookingDatas['chick_out_date'] < $today) & ($bookingDatas['status'] == 2))
                                                        <span>{{ date('d M Y', strtotime($bookingDatas['chick_out_date'])) }}
                                                            -
                                                            ({{ date('h:i A', strtotime($bookingDatas['chick_out_time'])) }})</span>
                                                    @else
                                                        <span>{{ date('d M Y', strtotime($bookingDatas['chick_out_date'])) }}
                                                            -
                                                            ({{ date('h:i A', strtotime($bookingDatas['chick_out_time'])) }})</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                                        @if ($bookingDatas['balance_amount'] != 0)
                                                            <li>
                                                                <a href="#paybalance{{ $bookingDatas['id'] }}"
                                                                    data-bs-toggle="modal"
                                                                    data-id="{{ $bookingDatas['id'] }}"
                                                                    class="btn btn-sm btn-soft-warning paybalance{{ $bookingDatas['id'] }}"
                                                                    data-bs-target="#paybalance{{ $bookingDatas['id'] }}">Pay
                                                                    Balance</a>
                                                            </li>
                                                        @endif


                                                        @if ($bookingDatas['balance_amount'] == 0)
                                                            @if ($bookingDatas['webstatus'] == 1)

                                                                <li>
                                                                    <a class="btn btn-sm btn-soft-success">Pay</a>
                                                                </li>
                                                            @elseif ($bookingDatas['webstatus'] != 1)

                                                                @if ($bookingDatas['status'] != 2)
                                                                    @if ($bookingDatas['chick_out_date'] >= $today)
                                                                        <li>
                                                                            <a href="#checkout{{ $bookingDatas['id'] }}"
                                                                                data-bs-toggle="modal"
                                                                                data-id="{{ $bookingDatas['id'] }}"
                                                                                class="btn btn-sm btn-soft-success checkout{{ $bookingDatas['id'] }}"
                                                                                data-bs-target="#checkout{{ $bookingDatas['id'] }}">Checkout</a>
                                                                        </li>
                                                                    @else
                                                                        <li>
                                                                            <a href="#" class="btn btn-sm btn-soft-success">Over Date</a>
                                                                        </li>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endif

                                                        <li>
                                                            <a href="{{ route('booking.view', ['id' => $bookingDatas['id']]) }}"
                                                                class="btn btn-sm btn-soft-secondary">View</a>
                                                        </li>

                                                        {{-- <li>
                                                                <a href="#viewproof{{ $bookingDatas['id'] }}" data-bs-toggle="model"
                                                                    data-bs-target="#viewproof{{ $bookingDatas['id'] }}" class="pointer btn btn-sm btn-soft-secondary">View Proof</a>
                                                            </li> --}}

                                                        @if ($bookingDatas['status'] != 2)
                                                            <li>
                                                                <a href="{{ route('booking.edit', ['id' => $bookingDatas['id']]) }}"
                                                                    class="btn btn-sm btn-soft-info">Edit</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </td>
                                            </tr>


                                            @if ($bookingDatas['balance_amount'] != 0)
                                                <div class="modal fade" id="paybalance{{ $bookingDatas['id'] }}"
                                                    data-bs-backdrop="static" aria-hidden="true" aria-labelledby="..."
                                                    class="paybalance{{ $bookingDatas['id'] }}" tabindex="-1">
                                                    @include('pages.backend.booking.components.paybalance')
                                                </div>
                                            @endif

                                            @if ($bookingDatas['balance_amount'] == 0)
                                                @if ($bookingDatas['status'] != 2)
                                                    <div class="modal fade" id="checkout{{ $bookingDatas['id'] }}"
                                                        data-bs-backdrop="static" aria-hidden="true"
                                                        aria-labelledby="..." tabindex="-1">
                                                        @include('pages.backend.booking.components.checkout')
                                                    </div>
                                                @endif
                                            @endif

                                            <div class="modal fade" id="basic{{ $bookingDatas['id'] }}"
                                                aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                @include('pages.backend.booking.components.basic')
                                            </div>

                                            <div class="modal fade" id="viewproof{{ $bookingDatas['id'] }}"
                                                aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                @include('pages.backend.booking.components.viewproof')
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#booking_datatable').DataTable();
        });

        $(document).ready(function() {
            $('#bookings_datatable').DataTable();
        });

        $(".room_viewclose").click(function() {
            window.location.reload();
        });



        // Calculate Days



        //$(document).ready(function() {
        //  $(".clicktocheckin").click(function() {
        //alert('');
        //     var clicktocheckin = this.value;
        //     var booking_id = $('#booking_id').val();
        //     console.log(booking_id);

        //             $.ajax({
        //                url: '/AddCheckin/',
        //                 type: 'get',
        //                  data: {
        //                     _token: "{{ csrf_token() }}",
        //                     clicktocheckin: clicktocheckin,
        //                     booking_id: booking_id
        //                 },
        //                dataType: 'json',
        //                 success: function(response) {
        //                     //console.log(response);
        //                     if (response.status == 'success') {
        //
        //                         alert('Checkin record detail successfully added');
        //                         location.reload();
        //                      }
        //
        //                 }
        //             });
        //  });
        //});
    </script>
@endsection
