<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\CloseAccount;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Room;
use App\Models\Staff;
use App\Models\BookingRoom;
use App\Models\OpenAccount;
use App\Models\Booking;
use App\Models\BookingPayment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        $checkins = Booking::where('check_in_date', '=', $today)->where('soft_delete', '!=', 1)->where('status', '=', 1)->count();
        $checkouts = Booking::where('out_date', '=', $today)->where('soft_delete', '!=', 1)->where('status', '=', 2)->count();
        $availablerooms = Room::where('soft_delete', '!=', 1)->where('booking_status', '!=', 1)->count();
        $totalrooms = Room::where('soft_delete', '!=', 1)->count();

        $staff = Staff::where('soft_delete', '!=', 1)->get();

        $room_details = Room::where('soft_delete', '!=', 1)->get();
        $rooms_arr = [];
        foreach ($room_details as $key => $room_details_arr) {
            $last_inserted_room_id = BookingRoom::where('room_id', '=', $room_details_arr->id)->latest('id')->first();

            if($last_inserted_room_id != ""){
                $latest_booking_id = $last_inserted_room_id->booking_id;
            }else {
                $latest_booking_id = '';
            }

            $booking_id = Booking::where('id', '=', $latest_booking_id)->where('soft_delete', '!=', 1)->first();
            if($booking_id != ''){

                if($room_details_arr->booking_status == 1){
                    $status = 'Booked Green';
                }else {
                    $status = 'Open';
                }

                $customer_name = $booking_id->customer_name;
                $checkindate = date('d M Y', strtotime($booking_id->check_in_date));
                $checkoutdate = date('d M Y', strtotime($booking_id->check_out_date));
                $whats_app_number = $booking_id->whats_app_number;
                $phone_number = $booking_id->phone_number;
                $days = $booking_id->days;
                $count_head = $booking_id->male_count + $booking_id->female_count + $booking_id->child_count;
                $total = $booking_id->total;
                $gst_amount = $booking_id->gst_amount;
                $grand_total = $booking_id->grand_total;
                $balance_amount = $booking_id->balance_amount;
                $webstatus = $booking_id->webstatus;

                $payment_data = BookingPayment::where('booking_id', '=', $booking_id->id)->get();
                $paymentterms = [];
                if($payment_data != ""){
                    foreach ($payment_data as $key => $payment_datas) {

                        $paymentterms[] = array(
                            'booking_id' => $booking_id->id,
                            'term' => $payment_datas->term,
                            'payable_amount' => $payment_datas->payable_amount,
                            'id' => $payment_datas->id,
                            'payment_method' => $payment_datas->payment_method,
                        );
                    }
                }else {
                    $paymentterms[] = array(
                        'booking_id' => '',
                        'term' =>  '',
                        'payable_amount' => '',
                        'id' => '',
                        'payment_method' => '',
                    );
                }
                

                $roomsbooked = BookingRoom::where('booking_id', '=', $booking_id->id)->get();
                foreach ($roomsbooked as $key => $rooms_booked) {
                    $Rooms = Room::findOrFail($rooms_booked->room_id);

                    if($rooms_booked->room_price != ""){
                        $room_price = $rooms_booked->room_price;
                        $room_cal_price = $rooms_booked->room_cal_price;
                    }else {
                        $room_price = '';
                        $room_cal_price = '';
                    }

                    $room_list[] = array(
                        'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor'. ' - ' . $rooms_booked->room_type ,
                        'booking_id' => $booking_id->id,
                        'booking_room_price' => $room_price,
                        'room_cal_price' => $room_cal_price,
                        'id' => $rooms_booked->id,
                        'room_id' => $rooms_booked->room_id,
                        'room_type' => $rooms_booked->room_type,
                    );
                }

                $checkin_staffname = Staff::findOrFail($booking_id->check_in_staff);
                $checkin_staff = $checkin_staffname->name;
                $proofimage_one = $booking_id->proofimage_one;
                $proofimage_two = $booking_id->proofimage_two;
                $customer_photo = $booking_id->customer_photo;
                $booking_status = $booking_id->status;
                $total_paid = $booking_id->total_paid;
                $check_out_time = $booking_id->check_out_time;
                $gst_per = $booking_id->gst_per;
                $bookingauto_id = $booking_id->id;
            }else {
                $customer_name = '';
                $phone_number = '';
                $checkindate = '';
                $checkoutdate = '';
                $whats_app_number = '';
                $days = '';
                $count_head = '';
                $total = '';
                $gst_amount = '';
                $status = 'Open';
                $grand_total = '';
                $balance_amount = '';
                $checkin_staff = '';
                $proofimage_one = '';
                $proofimage_two = '';
                $customer_photo = '';
                $bookingauto_id = '';
                $booking_status = '';
                $total_paid = '';
                $check_out_time = '';
                $gst_per = '';
                $webstatus = '';

                $paymentterms[] = array(
                    'booking_id' => '',
                    'term' =>  '',
                    'payable_amount' => '',
                    'id' => '',
                    'payment_method' => '',
                );

                $room_list[] = array(
                    'room' => '' ,
                    'booking_id' => '',
                    'booking_room_price' => '',
                    'room_cal_price' => '',
                    'id' => '',
                    'room_id' => '',
                    'room_type' => '',
                );
            }

            $rooms_arr[] = array(
                'room_no' => $room_details_arr->room_number,
                'room_floor' => $room_details_arr->room_floor,
                'latest_booking_id' => $latest_booking_id,
                'id' => $room_details_arr->id,
                'status' => $status,
                'customer_name' => $customer_name,
                'phone_number' => $phone_number,
                'whats_app_number' => $whats_app_number,
                'checkindate' => $checkindate,
                'chick_out_date' => $checkoutdate,
                'days' => $days,
                'count_head' => $count_head,
                'total' => $total,
                'gst_amount' => $gst_amount,
                'grand_total' => $grand_total,
                'terms' => $paymentterms,
                'balance_amount' => $balance_amount,
                'checkin_staff' => $checkin_staff,
                'proofimage_one' => $proofimage_one,
                'proofimage_two' => $proofimage_two,
                'customer_photo' => $customer_photo,
                'id' => $bookingauto_id,
                'booking_status' => $booking_status,
                'total_paid' => $total_paid,
                'chick_out_time' => $check_out_time,
                'room_list' => $room_list,
                'gst_per' => $gst_per,
                'webstatus' => $webstatus,
            );
        }



        $data = Booking::where('soft_delete', '!=', 1)
        ->where('status', '=', 1)
        ->orderBy('created_at', 'desc')->get();

        $bookingtable = [];
        $room_list = [];
        $terms = [];

        foreach ($data as $key => $datas) {
            $roomsbooked = BookingRoom::where('booking_id', '=', $datas->id)->get();
            foreach ($roomsbooked as $key => $rooms_booked) {
                $Rooms = Room::findOrFail($rooms_booked->room_id);

             

                if($rooms_booked->room_price != ""){
                    $room_prices = $rooms_booked->room_price;
                    $room_cal_prices = $rooms_booked->room_cal_price;
                }else {
                    $room_prices = '';
                    $room_cal_prices = '';
                }



                $room_list[] = array(
                    'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor'. ' - ' . $rooms_booked->room_type ,
                    'booking_id' => $datas->id,
                    'booking_room_price' => $room_prices,
                    'room_cal_price' => $room_cal_prices,
                    'id' => $rooms_booked->id,
                    'room_id' => $rooms_booked->room_id,
                    'room_type' => $rooms_booked->room_type,
                    'roomcolor_status' => '',
                );
            }
            $payment_data = BookingPayment::where('booking_id', '=', $datas->id)->get();
            foreach ($payment_data as $key => $payment_datas) {

                $terms[] = array(
                    'booking_id' => $datas->id,
                    'term' => $payment_datas->term,
                    'payable_amount' => $payment_datas->payable_amount,
                    'id' => $payment_datas->id,
                    'payment_method' => $payment_datas->payment_method,
                );
            }
            $checkin_staffname = Staff::findOrFail($datas->check_in_staff);

            if($datas->check_out_staff != NULL){
                $checkout_staffname = Staff::findOrFail($datas->check_out_staff);
                $checkoutstaff = $checkout_staffname->name;
            }else {
                $checkoutstaff = '';
            }

            if($datas->balance_amount < 0){
                $refund = $datas->balance_amount;
              }else {
                $refund = '';
              }

              if($datas->balance_amount > 0){
                $balancepayableamount = $datas->balance_amount;
              }else {
                $balancepayableamount = '';
              }

            $bookingtable[] = array(
                'customer_name' => $datas->customer_name,
                'branch' => '',
                'chick_in_date' => $datas->check_in_date,
                'chick_in_time' => $datas->check_in_time,
                'whats_app_number' => $datas->whats_app_number,
                'id' => $datas->id,
                'room_list' => $room_list,
                'chick_out_date' => $datas->check_out_date,
                'out_date' => $datas->out_date,
                'chick_out_time' => $datas->check_out_time,
                'phone_number' => $datas->phone_number,
                'grand_total' => $datas->grand_total,
                'totalamount_afterdiscount' => $datas->totalamount_afterdiscount,
                'branch_id' => $datas->branch_id,
                'total_paid' => $datas->total_paid,
                'balance_amount' => $datas->balance_amount,
                'days' => $datas->days,
                'gst_per' => $datas->gst_per,
                'gst_amount' => $datas->gst_amount,
                'disc_per' => $datas->disc_per,
                'disc_amount' => $datas->disc_amount,
                'additional_amount' => $datas->additional_amount,
                'additional_notes' => $datas->additional_notes,
                'total' => $datas->total,
                'terms' => $terms,
                'status' => $datas->status,
                'extended_date' => $datas->extended_date,
                'extended_time' => $datas->extended_time,
                'out_date' => $datas->out_date,
                'out_time' => $datas->out_time,
                'booking_invoiceno' => $datas->booking_invoiceno,
                'couple' => $datas->couple,
                'check_in_staff' => $checkin_staffname->name,
                'checkoutstaff' => $checkoutstaff,
                'proofimage_one' => $datas->proofimage_one,
                'proofimage_two' => $datas->proofimage_two,
                'customer_photo' => $datas->customer_photo,
                'webstatus' => $datas->webstatus,
                'booking_type' => $datas->booking_type,
                'refund' => $refund,
                'balancepayableamount' => $balancepayableamount,
            );
        }

        return view('home', compact('today', 'rooms_arr', 'bookingtable', 'timenow', 'staff'));
    }

   



    public function lang_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('lang_code', $request->lang); 
  
        return redirect()->back();
    }
}
