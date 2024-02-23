@extends('layouts.auth')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">{{ __('messages.dashboard_title') }}</h4>
                            <div class="page-title-right">
                                <form autocomplete="off" method="POST" action="{{ route('booking.datefilter') }}" style="display: flex;">
                                @method('PUT')
                                @csrf
                                <ol class="breadcrumb m-0">
                                    <li><input type="date" class="form-control date" name="from_date"
                                            value="{{ $today }}"></li>
                                    <li style="margin-left: 10px;"><button type="submit"
                                            class="btn btn-primary">Search</button></li>
                                </ol>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
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
                </div>


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0" id="bookings_datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width:10%">{{ __('messages.billno') }}</th>
                                            <th style="width:25%">Details</th>
                                            <th style="width:9%">{{ __('messages.customer') }}</th>
                                            <th style="width:7%">Refund</th>
                                            <th style="width:9%">Balance</th>
                                                    <th style="width:9%">Booking Type</th>
                                            <th style="width:9%">Manager</th>
                                            <th style="width:22%">{{ __('messages.action_title') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookingtable as $bookingDatas)
                                            <tr>
                                                <td>{{ $bookingDatas['booking_invoiceno'] }}</td>
                                                <td>
                                                        <span style="color:black;font-weight:600">Room </span>:
                                                        @foreach ($bookingDatas['room_list'] as $index => $room_lists)
                                                            @if ($room_lists['booking_id'] == $bookingDatas['id'])
                                                                    <span >{{ $room_lists['room'] }}<br /></span>
                                                            @endif
                                                        @endforeach

                                                        <span style="color:black;font-weight:600">Checkin </span>:
                                                        <span>{{ date('d M Y', strtotime($bookingDatas['chick_in_date'])) }}
                                                        
                                                        ({{ date('h:i A', strtotime($bookingDatas['chick_in_time'])) }})
                                                        </span><br/>
                                                        
                                                        <span style="color:black;font-weight:600">Checkout </span>:
                                                            @if ($bookingDatas['status'] == 2)
                                                            <span>{{ date('d M Y', strtotime($bookingDatas['out_date'])) }}<br/>
                                                                    
                                                                    ({{ date('h:i A', strtotime($bookingDatas['out_time'])) }})
                                                                </span>
                                                            @elseif (($bookingDatas['chick_out_date'] < $today) & ($bookingDatas['status'] == 2))
                                                                <span>{{ date('d M Y', strtotime($bookingDatas['chick_out_date'])) }}<br/>
                                                                    
                                                                    ({{ date('h:i A', strtotime($bookingDatas['chick_out_time'])) }})</span>
                                                            @else
                                                                <span>{{ date('d M Y', strtotime($bookingDatas['chick_out_date'])) }}<br/>
                                                                    
                                                                    ({{ date('h:i A', strtotime($bookingDatas['chick_out_time'])) }})</span>
                                                            @endif

                                                </td>
                                                <td href="#basic{{ $bookingDatas['id'] }}" data-bs-toggle="modal"
                                                    data-bs-target="#basic{{ $bookingDatas['id'] }}" class="pointer" style="color:green">
                                                    {{ $bookingDatas['customer_name'] }}</td>
                                                    <td style="color:red;"> {{ $bookingDatas['refund'] }}</td>
                                                    <td style="color:red;"> {{ $bookingDatas['balancepayableamount'] }}</td>
                                                    <td>{{ $bookingDatas['booking_type'] }}</td>

                                                <td>{{ $bookingDatas['check_in_staff'] }}</td>

                                               
                                                <td>
                                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                                        @if ($bookingDatas['balance_amount'] > 0)
                                                            <li>
                                                                <a href="#paybalance{{ $bookingDatas['id'] }}"
                                                                    data-bs-toggle="modal"
                                                                    data-id="{{ $bookingDatas['id'] }}"
                                                                    class="btn btn-sm btn-soft-warning paybalance{{ $bookingDatas['id'] }}"
                                                                    data-bs-target="#paybalance{{ $bookingDatas['id'] }}">Pay
                                                                    Balance</a>
                                                            </li>
                                                        @endif


                                                                  
                                                                        <li>
                                                                            <a href="#checkout{{ $bookingDatas['id'] }}"
                                                                                data-bs-toggle="modal"
                                                                                data-id="{{ $bookingDatas['id'] }}"
                                                                                class="btn btn-sm btn-soft-success checkout{{ $bookingDatas['id'] }}"
                                                                                data-bs-target="#checkout{{ $bookingDatas['id'] }}">Checkout</a>
                                                                        </li>
                                                                   
                                                       

                                                        <li>
                                                            <a href="{{ route('booking.view', ['id' => $bookingDatas['id']]) }}"
                                                                class="btn btn-sm btn-soft-secondary">View</a>
                                                        </li>


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

                                            @if ($bookingDatas['balance_amount'] <= 0)
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
            $('#bookings_datatable').DataTable();
        });
    </script>
@endsection


