@extends('layouts.auth')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Coupon Code - {{$coupon_code->coupon_code}}</h4>
                    </div>
                </div>
            </div>

           

            <div class="row" style="display: flex">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                       <th>S.No</th>
                                        <th>Customer</th>
                                        <th>Phone Number</th>
                                        <th>E-Mail</th>
                                        <th>Grand Total</th>
                                        <th>Check-In </th>
                                        <th>Check-Out</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($booking_customers as $keydata => $booking_customer)
                                    <tr>
                                        <td>{{ ++$keydata }}</td>
                                        <td>{{ $booking_customer->customer_name }}</td>
                                       <td>{{ $booking_customer->phone_number }}</td>
                                       <td>{{ $booking_customer->email_id }}</td>
                                        <td>{{ $booking_customer->grand_total }}</td>
                                        <th>{{ date('d M Y', strtotime($booking_customer->check_in_date)) }}</th>
                                        @if ($booking_customer->out_date != '')
                                        <th>{{ date('d M Y', strtotime($booking_customer->out_date)) }}</th>
                                        @else
                                        <th></th>
                                        @endif
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
</div>
@endsection
