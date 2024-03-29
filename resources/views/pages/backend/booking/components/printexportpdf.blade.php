@extends('layouts.auth')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">PDF Detail</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" style="-webkit-box-shadow: none; box-shadow: none;">
                            <div class="card-body">
                                <hr>
                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1">
                                                    Manager : <span style="color: #acafb7;">{{ $manager->name }}</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-4" style="text-align: end;">
                                        <div class="text-muted text-sm-end">
                                            <div>
                                                <h5 class="font-size-16 mb-1">
                                                    From Date : <span
                                                        style="color: #acafb7;">{{ date('d M, Y', strtotime($from_date)) }}</span>
                                                </h5>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">
                                                    To Date : <span
                                                        style="color: #acafb7;">{{ date('d M, Y', strtotime($to_date)) }}</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br><br>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1" style="color: red;">
                                                    Room Deatails
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Booking ID</th>
                                                    <th>Check In Date</th>
                                                    <th>CheckIn Staff</th>
                                                    <th>Room Details</th>
                                                    <th>Payment</th>
                                                    <th>CheckOut Staff</th>
                                                    <th>Check Out Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                            $total_cashincome = 0;
                                            @endphp

                                            @foreach ($Export_Array as $keydata => $Export_Arrays)

                                                    @if(($Export_Arrays['payment']) != '')
                                                        @php 
                                                            $total_cashincome += $Export_Arrays['payment'];
                                                        @endphp
                                                    @endif
                                                    <tr>
                                                        <td>{{ $Export_Arrays['booking_invoiceno'] }}</td>
                                                        <td>{{ $Export_Arrays['check_in_date'] }}</td>
                                                        <td style="color:{{$Export_Arrays['cicolor']}};font-weight:{{$Export_Arrays['cifontweight']}}">{{ $Export_Arrays['checkin_manager'] }}</td>
                                                        <td>
                                                        @foreach ($Export_Arrays['room_list'] as $index => $room_lists)
                                                                @if ($room_lists['booking_id'] == $Export_Arrays['id'])
                                                                  {{ $room_lists['roomno'] }} - {{ $room_lists['roomtype'] }},<br/>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $Export_Arrays['term'] }} - {{ $Export_Arrays['payment'] }}</td>
                                                        <td style="color:{{$Export_Arrays['cocolor']}};font-weight:{{$Export_Arrays['cofontweight']}}">{{ $Export_Arrays['checkout_staff'] }}</td>
                                                        <td>{{ $Export_Arrays['out_date'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                            <thead>
                                            
                                                <tr style="color: darkorange">
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Total :</th>
                                                    <th>{{ $total_cashincome }}</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <hr>
                                </div>

                                <br>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1" style="color: red;">
                                                    Other Income
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Details</th>
                                                    <th>Note</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($income as $keydata => $incomes)
                                                    <tr>
                                                        <td>{{ date('d M,Y', strtotime($incomes->date)) }}</td>
                                                        <td>{{ $incomes->namelist->name }}</td>
                                                        <td>{{ $incomes->note }}</td>
                                                        <td>{{ $incomes->amount }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <thead>
                                                <tr style="color: darkorange">
                                                    <th>Totel :</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{ $income_total }}</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <hr>
                                </div>

                                <br>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1" style="color: red;">
                                                    Other Expence
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Details</th>
                                                    <th>Note</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($expence as $keydata => $expences)
                                                    <tr>
                                                        <td>{{ date('d M,Y', strtotime($expences->date)) }}</td>
                                                        <td>{{ $expences->namelist->name }}</td>
                                                        <td>{{ $expences->note }}</td>
                                                        <td>{{ $expences->amount }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <thead>
                                                <tr style="color: darkorange">
                                                    <th>Totel :</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{ $expence_total }}</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <hr>
                                </div>

                                <br>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-8 col-8">
                                        <div class="text-muted">
                                            <div>
                                                <h5 class="font-size-16 mb-1" style="color: red;">
                                                    Calculation
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Room Income</th>
                                                    <th>Other Income</th>
                                                    <th>Total</th>
                                                    <th>Expence</th>
                                                    <th>Online Payment</th>
                                                    <th>Grand Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $room_cash_income + $room_online_income }}</td>
                                                    <td>{{ $income_total }}</td>
                                                    <td>{{ $room_cash_income + $income_total + $room_online_income }}</td>
                                                    <td>{{ $expence_total }}</td>
                                                    <td>{{ $room_online_income }}</td>
                                                    <td>{{ $room_cash_income + $income_total + $room_online_income - ($expence_total + $room_online_income) }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                </div>

                                <br>

                                <div class="row" style="display: flex;">
                                    <div class="col-sm-6 col-6">
                                        <br><br><br>
                                        <h6 class="m-0">Manager Signature</h6>
                                    </div>
                                    <div class="col-sm-6 col-6" style="text-align: end;">
                                        <br><br><br>
                                        <h6 class="m-0">For <span
                                                style="font-family: 'Cinzel Decorative', cursive; font-weight: bold;">Paavai Towers
                                                </span></h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-print-none mt-4">
                                    <div class="float-end">
                                        <a href="javascript:window.print()"
                                            class="btn btn-primary w-md waves-effect waves-light"><i
                                                class="fa fa-print"></i>&nbsp;&nbsp; Print</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
