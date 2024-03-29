<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Branch;
use App\Models\Room;
use App\Models\BookingRoom;
use App\Models\Staff;
use App\Models\Income;
use App\Models\BookingPayment;
use App\Models\Expense;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class BookingController extends Controller
{
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




        $Daily_entry = Booking::where('soft_delete', '!=', 1)
                        ->where('check_in_date', '=', $today)
                        ->orderBy('created_at', 'desc')->get();

        $dailyentryData = [];
        $room_lists = [];
        foreach ($Daily_entry as $key => $Daily_entries) {




            $roomsbookeds = BookingRoom::where('booking_id', '=', $Daily_entries->id)->get();
            foreach ($roomsbookeds as $key => $rooms_bookeds) {
                $Rooms = Room::findOrFail($rooms_bookeds->room_id);

              

                if($rooms_bookeds->room_price != ""){
                    $room_price = $rooms_bookeds->room_price;
                    $room_cal_price = $rooms_bookeds->room_cal_price;
                }else {
                    $room_price = '';
                    $room_cal_price = '';
                }


                $room_lists[] = array(
                    'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor'. ' - ' . $rooms_bookeds->room_type ,
                    'booking_id' => $Daily_entries->id,
                    'booking_room_price' => $room_price,
                    'room_cal_price' => $room_cal_price,
                    'id' => $rooms_bookeds->id,
                    'room_id' => $rooms_bookeds->room_id,
                    'room_type' => $rooms_bookeds->room_type,
                    'roomcolor_status' => '',
                );
            }
            $checkinstaff = Staff::findOrFail($Daily_entries->check_in_staff);

          if($Daily_entries->balance_amount < 0){
            $refund = $Daily_entries->balance_amount;
          }else {
            $refund = '';
          }

          if($Daily_entries->balance_amount > 0){
            $balancepayableamount = $Daily_entries->balance_amount;
          }else {
            $balancepayableamount = '';
          }

            $dailyentryData[] = array(
                'customer_name' => $Daily_entries->customer_name,
                'room_lists' => $room_lists,
                'checkinstaff' => $checkinstaff->name,
                'id' => $Daily_entries->id,
                'branch' => '',
                'booking_invoiceno' => $Daily_entries->booking_invoiceno,
                'booking_type' => $Daily_entries->booking_type,
                'refund' => $refund,
                'balancepayableamount' => $balancepayableamount,
                
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

        return view('pages.backend.booking.index', compact('rooms_arr', 'totalrooms', 'checkins', 'checkouts', 'availablerooms', 'staff', 'today', 'timenow', 'dailyentryData', 'bookingtable'));
    }

   


    public function dailycheckout()
    {

        $data = Booking::where('soft_delete', '!=', 1)->get();

        foreach ($data as $key => $datas) {
            $today = Carbon::now()->format('Y-m-d');
            $Extend_data = [];
            $checkout_data = [];
            $extendcheckout_date = Booking::where('soft_delete', '!=', 1)->where('extended_date', '=', $today)->get();
            foreach ($extendcheckout_date as $key => $extend_checkout_date) {
                $Extend_data[] = $extend_checkout_date;
            }
            $checkout_date = Booking::where('soft_delete', '!=', 1)->where('check_out_date', '=', $today)->get();
            foreach ($checkout_date as $key => $checkout_date_arr) {
                $checkout_data[] = $checkout_date_arr;
            }
            $Array = array_merge($Extend_data , $checkout_data);
            $checkout_data_arr = Booking::where('soft_delete', '!=', 1)->where('check_out_date', '=', $today)->get();
            $bookingData = [];
            $room_list = [];
            $terms = [];
            foreach ($checkout_data_arr as $key => $Array_data) {
                $branch = Branch::findOrFail($Array_data->branch_id);
                $roomsbooked = BookingRoom::where('booking_id', '=', $Array_data->id)->get();
                    foreach ($roomsbooked as $key => $rooms_booked) {
                        $Rooms = Room::findOrFail($rooms_booked->room_id);

                        if($Array_data->couple == 1){
                            if($rooms_booked->room_type == 'A/C'){
                                $roomcolor_status = 'Couple Orange';
                            }else if($rooms_booked->room_type == 'Non - A/C'){
                                $roomcolor_status = 'Couple Pink';
                            }

                        }else {
                            if($rooms_booked->room_type == 'A/C'){
                                $roomcolor_status = 'Booked Red';
                            }else if($rooms_booked->room_type == 'Non - A/C'){
                                $roomcolor_status = 'Booked Green';
                            }
                        }



                        $room_list[] = array(
                            'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $rooms_booked->room_type,
                            'booking_id' => $Array_data->id,
                            'booking_room_price' => $rooms_booked->room_price,
                            'room_cal_price' => $rooms_booked->room_cal_price,
                            'id' => $rooms_booked->id,
                            'room_id' => $rooms_booked->room_id,
                            'roomcolor_status' => $roomcolor_status,
                        );
                    }
                    $payment_data = BookingPayment::where('booking_id', '=', $Array_data->id)->get();
                    foreach ($payment_data as $key => $payment_datas) {
                        $terms[] = array(
                            'booking_id' => $Array_data->id,
                            'term' => $payment_datas->term,
                            'payable_amount' => $payment_datas->payable_amount,
                        );
                    }
                    $bookingData[] = array(
                        'customer_name' => $Array_data->customer_name,
                        'branch' => $branch->name,
                        'chick_in_date' => $Array_data->check_in_date,
                        'whats_app_number' => $Array_data->whats_app_number,
                        'id' => $Array_data->id,
                        'room_list' => $room_list,
                        'phone_number' => $Array_data->phone_number,
                        'grand_total' => $Array_data->grand_total,
                        'total_paid' => $Array_data->total_paid,
                        'balance_amount' => $Array_data->balance_amount,
                        'days' => $Array_data->days,
                        'gst_per' => $Array_data->gst_per,
                        'gst_amount' => $Array_data->gst_amount,
                        'disc_per' => $Array_data->disc_per,
                        'disc_amount' => $Array_data->disc_amount,
                        'additional_amount' => $Array_data->additional_amount,
                        'additional_notes' => $Array_data->additional_notes,
                        'total' => $Array_data->total,
                        'terms' => $terms,
                        'status' => $Array_data->status,
                        'chick_out_date' => $Array_data->check_out_date,
                        'out_date' => $Array_data->out_date,
                        'chick_out_time' => $Array_data->check_out_time,
                        'extended_date' => $Array_data->extended_date,
                        'extended_time' => $Array_data->extended_time,
                    );
                }
                $timenow = Carbon::now()->format('H:i');
            return view('pages.backend.booking.dailycheckout', compact('bookingData', 'today', 'timenow'));
        }
    }

    public function create()
    {
        $roomsarr = Room::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');
        $staff = Staff::where('soft_delete', '!=', 1)->get();
        $coupon = Coupon::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.booking.create', compact('staff', 'roomsarr', 'today', 'timenow', 'coupon'));
    }

    public function noncash_gpaystore(Request $request)
    {
        
       
        $checkin_website = $request->get('checkin_website');
        

        if($checkin_website == 'Submit')
        {
            $random_no = rand(100,999);

            $OnlineBooking = new Booking();
            $OnlineBooking->booking_invoiceno = $request->get('webbooking_id');
            $OnlineBooking->customer_name = $request->get('webcustomername');
            $OnlineBooking->phone_number = $request->get('contactnumber');
            $OnlineBooking->whats_app_number = $request->get('webwhats_app_number');
            $OnlineBooking->male_count = $request->get('web_male_count');
            $OnlineBooking->female_count = $request->get('web_female_count');
            $OnlineBooking->child_count = $request->get('web_child_count');
            $OnlineBooking->check_in_date = $request->get('webcheck_in_date');
            $OnlineBooking->check_in_time = $request->get('webcheck_in_time');
            $OnlineBooking->days = $request->get('web_noofdays');
            $OnlineBooking->check_out_date = $request->get('webcheck_out_date');
            $OnlineBooking->check_out_time = $request->get('webcheck_out_time');
            $OnlineBooking->check_out_time = $request->get('webcheck_out_time');
            $OnlineBooking->check_in_staff = $request->get('webcheck_in_staff');
            $OnlineBooking->webstatus = 1;
            $OnlineBooking->status = 1;
            $OnlineBooking->booking_type = $request->get('booking_type');


            $OnlineBooking->prooftype_one = $request->get('prooftype_one');
             // Profile Image
            if ($request->customer_photo != "") {
                $customer_photo = $request->customer_photo;
                $folderPath = "assets/customer_details/customer_photo";
                $image_parts = explode(";base64,", $customer_photo);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = $OnlineBooking->customer_name . '_' . $random_no . '_' . 'customer image' . '.png';
                $customerimgfile = $folderPath . $fileName;
                file_put_contents($customerimgfile, $image_base64);
                $OnlineBooking->customer_photo = $customerimgfile;
            }else {
                $contactno = $request->get('phone_number');
               $get_mobno_person = Booking::where('phone_number', '=', $contactno)->latest('id')->first();
                $old_customer_photo = $get_mobno_person->customer_photo;
                $OnlineBooking->customer_photo = $old_customer_photo;
            }



            //Proof Front
            if ($request->proofimage_one != "") {
                $proofimage_one = $request->proofimage_one;
                $front_folderPath = "assets/customer_details/proofimage_one";
                $front_image_parts = explode(";base64,", $proofimage_one);
                $frontimage_type_aux = explode("image/", $front_image_parts[0]);
                $frontimage_type = $frontimage_type_aux[1];
                $frontimage_base64 = base64_decode($front_image_parts[1]);
                $frontfileName = $OnlineBooking->customer_name . '_' . $random_no . '_' . 'proof front image' . '.png';
                $frontimgfile = $front_folderPath . $frontfileName;
                file_put_contents($frontimgfile, $frontimage_base64);
                $OnlineBooking->proofimage_one = $frontimgfile;
            } else {
                $contactno = $request->get('phone_number');
                $get_mobno_person = Booking::where('phone_number', '=', $contactno)->latest('id')->first();
                $old_proofimage_one = $get_mobno_person->proofimage_one;
                $OnlineBooking->proofimage_one = $old_proofimage_one;
            }


           //  Proof Back
                if ($request->proofimage_two != "") {
                    $proofimage_two = $request->proofimage_two;
                    $back_folderPath = "assets/customer_details/proofimage_two";
                    $back_image_parts = explode(";base64,", $proofimage_two);
                    $backimage_type_aux = explode("image/", $back_image_parts[0]);
                    $backimage_type = $backimage_type_aux[1];
                    $backimage_base64 = base64_decode($back_image_parts[1]);
                    $backfileName = $OnlineBooking->customer_name . '_' . $random_no . '_' . 'proof back image' . '.png';
                    $backimgfile = $back_folderPath . $backfileName;
                    file_put_contents($backimgfile, $backimage_base64);
                    $OnlineBooking->proofimage_two = $backimgfile;
               }else {
                    $contactno = $request->get('phone_number');
                    $get_mobno_person = Booking::where('phone_number', '=', $contactno)->latest('id')->first();
                    $old_proofimage_two = $get_mobno_person->proofimage_two;
                   $OnlineBooking->proofimage_two = $old_proofimage_two;
               }




        // if ($request->proofimage_one != "") {
        //     $proofimage_one = $request->proofimage_one;
        //     $filename_one = $OnlineBooking->customer_name . '_' . $random_no . '_' . 'proof front image' . '.' . $proofimage_one->getClientOriginalExtension();
        //     $request->proofimage_one->move('assets/customer_details/proofimage_one', $filename_one);
        //     $OnlineBooking->proofimage_one = $filename_one;
        // }else {
        //     $contactno = $request->get('phone_number');
        //      $get_mobno_person = Booking::where('phone_number', '=', $contactno)->latest('id')->first();
        //      $old_proofimage_one = $get_mobno_person->proofimage_one;
        //      $OnlineBooking->proofimage_one = $old_proofimage_one;
        // }
          
        // if ($request->proofimage_two != "") {
        //     $proofimage_two = $request->proofimage_two;
        //     $filename_two = $OnlineBooking->customer_name . '_' . $random_no . '_' . 'proof back image' . '_' . '.' . $proofimage_two->getClientOriginalExtension();
        //     $request->proofimage_two->move('assets/customer_details/proofimage_two', $filename_two);
        //     $OnlineBooking->proofimage_two = $filename_two;
        // }else {
        //     $contactno = $request->get('phone_number');
        //     $get_mobno_person = Booking::where('phone_number', '=', $contactno)->latest('id')->first();
        //     $old_proofimage_two = $get_mobno_person->proofimage_two;
        //     $OnlineBooking->proofimage_two = $old_proofimage_two;
        // }
          

        //  $customer_photo = $request->customer_photo;
        //   $filename_customer_photo = $OnlineBooking->customer_name . '_' . $random_no . '_' . 'Photo' . '.' . $customer_photo->getClientOriginalExtension();
        //   $request->customer_photo->move('assets/customer_details/customer_photo', $filename_customer_photo);
        //   $OnlineBooking->customer_photo = $filename_customer_photo;


            $OnlineBooking->save();


            $BookingID = $OnlineBooking->id;


            // Booking Rooms
            foreach ($request->get('webroom_id') as $key => $webroom_id) {
                $GetWroomDetails = Room::findOrFail($webroom_id);

                $BookingWebRoom = new BookingRoom;
                $BookingWebRoom->booking_id = $BookingID;
                $BookingWebRoom->room_id = $webroom_id;
                $BookingWebRoom->room_type = $GetWroomDetails->room_category;
                $BookingWebRoom->room_floor = $GetWroomDetails->room_floor;
                $BookingWebRoom->save();

                DB::table('rooms')->where('id', $webroom_id)->update(['booking_status' => 1]);
            }

            return redirect()->route('booking.index')->with('add', 'New booking information has been added to your list.');
        }

    }


    public function cash_gpaystore(Request $request)
    {
        $checkin = $request->get('checkin');

        
        if($checkin == 'checkin')
        {

            $data = new Booking();
            $random_no = rand(100,999);
            $billno = 1;

            $whatsapp = $request->get('whats_app_number');
            $customer_name = $request->get('booking_customer_name');
            
                $last_branchid = Booking::where('soft_delete', '!=', 1)->where('webstatus', '=', NULL)->latest('id')->first();

                    if($last_branchid != '')
                    {
                        $added_billno = substr ($last_branchid->booking_invoiceno, -5);
                        //dd($added_billno);
                        $invoiceno = '#0000' . ($added_billno) + 1;
                    } else {
                        $invoiceno = '#0000'.$billno;
                    }

            $data->booking_invoiceno = $invoiceno;
            $data->customer_name = $request->get('booking_customer_name');
            $data->phone_number = $request->get('phone_number');
            $data->whats_app_number = $request->get('whats_app_number');
            $data->email_id = $request->get('email_id');
            $data->address = $request->get('address');
            $data->gst_number = $request->get('gst_number');

            $data->male_count = $request->get('male_count');
            $data->female_count = $request->get('female_count');
            $data->child_count = $request->get('child_count');
            $data->check_in_date = $request->get('check_in_date');
            $data->check_in_time = $request->get('check_in_time');
            $data->days = $request->get('days');
            $data->check_out_date = $request->get('check_out_date');
            $data->check_out_time = $request->get('check_out_time');
            $data->extended_date = $request->get('check_out_date');
            $data->extended_time = $request->get('check_out_time');
            $data->branch_id = $request->get('branch_id');

            $data->prooftype_one = $request->get('prooftype_one');
            $data->booking_type = $request->get('cash_booking_type');

         

            // Profile Image
            if ($request->customer_photo != "") {
                $customer_photo = $request->customer_photo;
                $folderPath = "assets/customer_details/customer_photo";
                $image_parts = explode(";base64,", $customer_photo);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = $data->customer_name . '_' . $random_no . '_' . 'customer image' . '.png';
                $customerimgfile = $folderPath . $fileName;
                file_put_contents($customerimgfile, $image_base64);
                $data->customer_photo = $customerimgfile;
            }else {
                $contactno = $request->get('phone_number');
               $get_mobno_person = Booking::where('phone_number', '=', $contactno)->latest('id')->first();
                $old_customer_photo = $get_mobno_person->customer_photo;
                $data->customer_photo = $old_customer_photo;
            }



            //Proof Front
            if ($request->proofimage_one != "") {
                $proofimage_one = $request->proofimage_one;
                $front_folderPath = "assets/customer_details/proofimage_one";
                $front_image_parts = explode(";base64,", $proofimage_one);
                $frontimage_type_aux = explode("image/", $front_image_parts[0]);
                $frontimage_type = $frontimage_type_aux[1];
                $frontimage_base64 = base64_decode($front_image_parts[1]);
                $frontfileName = $data->customer_name . '_' . $random_no . '_' . 'proof front image' . '.png';
                $frontimgfile = $front_folderPath . $frontfileName;
                file_put_contents($frontimgfile, $frontimage_base64);
                $data->proofimage_one = $frontimgfile;
            } else {
                $contactno = $request->get('phone_number');
                $get_mobno_person = Booking::where('phone_number', '=', $contactno)->latest('id')->first();
                $old_proofimage_one = $get_mobno_person->proofimage_one;
                $data->proofimage_one = $old_proofimage_one;
            }


           //  Proof Back
                if ($request->proofimage_two != "") {
                    $proofimage_two = $request->proofimage_two;
                    $back_folderPath = "assets/customer_details/proofimage_two";
                    $back_image_parts = explode(";base64,", $proofimage_two);
                    $backimage_type_aux = explode("image/", $back_image_parts[0]);
                    $backimage_type = $backimage_type_aux[1];
                    $backimage_base64 = base64_decode($back_image_parts[1]);
                    $backfileName = $data->customer_name . '_' . $random_no . '_' . 'proof back image' . '.png';
                    $backimgfile = $back_folderPath . $backfileName;
                    file_put_contents($backimgfile, $backimage_base64);
                    $data->proofimage_two = $backimgfile;
               }else {
                    $contactno = $request->get('phone_number');
                    $get_mobno_person = Booking::where('phone_number', '=', $contactno)->latest('id')->first();
                    $old_proofimage_two = $get_mobno_person->proofimage_two;
                   $data->proofimage_two = $old_proofimage_two;
               }




        //    if ($request->proofimage_one != "") {
        //         $proofimage_one = $request->proofimage_one;
        //         $filename_one = $data->customer_name . '_' . $random_no . '_' . 'proof front image' . '.' . $proofimage_one->getClientOriginalExtension();
        //         $request->proofimage_one->move('assets/customer_details/proofimage_one', $filename_one);
        //         $data->proofimage_one = $filename_one;
        //     }else {
        //         $contactno = $request->get('phone_number');
        //          $get_mobno_person = Booking::where('phone_number', '=', $contactno)->latest('id')->first();
        //          $old_proofimage_one = $get_mobno_person->proofimage_one;
        //          $data->proofimage_one = $old_proofimage_one;
        //     }
              
        //     if ($request->proofimage_two != "") {
        //         $proofimage_two = $request->proofimage_two;
        //         $filename_two = $data->customer_name . '_' . $random_no . '_' . 'proof back image' . '_' . '.' . $proofimage_two->getClientOriginalExtension();
        //         $request->proofimage_two->move('assets/customer_details/proofimage_two', $filename_two);
        //         $data->proofimage_two = $filename_two;
        //     }else {
        //         $contactno = $request->get('phone_number');
        //         $get_mobno_person = Booking::where('phone_number', '=', $contactno)->latest('id')->first();
        //         $old_proofimage_two = $get_mobno_person->proofimage_two;
        //         $data->proofimage_two = $old_proofimage_two;
        //     }
              

        //      $customer_photo = $request->customer_photo;
        //       $filename_customer_photo = $data->customer_name . '_' . $random_no . '_' . 'Photo' . '.' . $customer_photo->getClientOriginalExtension();
        //       $request->customer_photo->move('assets/customer_details/customer_photo', $filename_customer_photo);
        //       $data->customer_photo = $filename_customer_photo;

              
            $data->total = $request->get('total_calc_price');
            $data->coupon_codeid = $request->get('coupon_codeid');
            $data->disc_amount = $request->get('discountamount');
            $data->totalamount_afterdiscount = $request->get('totalamount_afterdiscount');
            $data->gst_per = $request->get('gst_percentage');
            $data->gst_amount = $request->get('gst_amount');
            $data->grand_total = $request->get('grand_total');
            $data->total_paid = $request->get('total_payable');
            $data->balance_amount = $request->get('balance_amount');
            $data->check_in_staff = $request->get('check_in_staff');
            $status = 1;
            $data->status = $status;

            $data->save();

            $insertedId = $data->id;

            // Booking Payments
            foreach ($request->get('payable_amount') as $key => $payable_amount) {
                $paid_date = Carbon::now()->format('Y-m-d');

                if($payable_amount != ""){
                    $BookingPayment = new BookingPayment;
                    $BookingPayment->booking_id = $insertedId;
                    $BookingPayment->term = $request->payment_term[$key];
                    $BookingPayment->check_in_staff = $request->get('check_in_staff');
                    $BookingPayment->payable_amount = $payable_amount;
                    $BookingPayment->paid_date = $paid_date;
                    $BookingPayment->payment_method = $request->payment_method[$key];
                    $BookingPayment->save();
                }
                
            }
            

            // Booking Rooms
            foreach ($request->get('room_id') as $key => $room_id) {
                $GetroomDetails = Room::findOrFail($room_id);

                $BookingRoom = new BookingRoom;
                $BookingRoom->booking_id = $insertedId;
                $BookingRoom->room_id = $room_id;
                $BookingRoom->room_type = $GetroomDetails->room_category;
                $BookingRoom->room_floor = $GetroomDetails->room_floor;
                $BookingRoom->room_price = $request->room_price[$key];
                $BookingRoom->room_cal_price = $request->room_cal_price[$key];
                $BookingRoom->save();

                DB::table('rooms')->where('id', $room_id)->update(['booking_status' => 1]);
            }

            return redirect()->route('booking.index')->with('add', 'New booking information has been added to your list.');

            //$message_key = 'Dear%20'.$customer_name.'%0a%0aWelcome%20to%20Sri%20Maruthi%20Inn!%20We%20are%20thrilled%20to%20have%20you%20stay%20with%20us.%20Our%20team%20is%20dedicated%20to%20ensuring%20you%20have%20a%20comfortable%20and%20memorable%20stay.%20If%20you%20need%20any%20assistance%20during%20your%20stay,%20please%20don%27t%20hesitate%20to%20contact%20our%20front%20desk.%0a%0aWe%20hope%20you%20have%20a%20wonderful%20time%20at%20our%20resort!%20If%20there%27s%20anything%20we%20can%20do%20to%20make%20your%20stay%20even%20more%20enjoyable,%20please%20let%20us%20know.%20We%27re%20here%20to%20help.%0a%0aThank%20you%20for%20choosing%20Sri%20Maruthi%20Inn%20for%20your%20stay%0a%0aFind%20your%20ebill%20here:%20https://srimaruti.com/booking/'.$data->id.'/invoice/detail';
            //$access_token_key = env('WHATSAPP_ACCESS_TOKEN');
            //$instance_id_key = env('WHATSAPP_INSTANCE_ID');

            //$response = Http::post('https://smstool.in/api/send.php?number=91'.$whatsapp.'&type=text&message='.$message_key.'&instance_id='.$instance_id_key.'&access_token='.$access_token_key.'');

            //if($response->successful()){
            //    return redirect()->route('booking.index', ['user_branch_id' => $data->branch_id])->with('add', 'New booking information has been added to your list, and notification send to customer.');
            //} else {
            //    return redirect()->route('booking.index', ['user_branch_id' => $data->branch_id])->with('add', 'New booking information has been added to your list.');
            //}

        }
    }

    public function edit($id)
    {
        $data = Booking::findOrFail($id);
        $room = Room::where('soft_delete', '!=', 1)->where('soft_delete', '!=', 1)->get();
        $BookingRooms = BookingRoom::where('booking_id', '=', $id)->get();
        $paymentdata = BookingPayment::where('booking_id', '=', $id)->get();
        $staff = Staff::where('soft_delete', '!=', 1)->get();
        $coupon = Coupon::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.booking.edit', compact('staff', 'data', 'BookingRooms', 'room', 'paymentdata', 'coupon'));
    }

    public function update(Request $request, $id)
    {
        $today = Carbon::now()->format('Y-m-d');

        $BookingData = Booking::findOrFail($id);

        $random_no =   rand(100,999);
        $BookingData->customer_name = $request->get('booking_customer_name');
        $BookingData->phone_number = $request->get('phone_number');
        $BookingData->whats_app_number = $request->get('whats_app_number');
        $BookingData->email_id = $request->get('email_id');
        $BookingData->address = $request->get('address');
        $BookingData->gst_number = $request->get('gst_number');

        $BookingData->male_count = $request->get('male_count');
        $BookingData->female_count = $request->get('female_count');
        $BookingData->child_count = $request->get('child_count');
        $BookingData->check_in_date = $request->get('check_in_date');
        $BookingData->check_in_time = $request->get('check_in_time');
        $BookingData->days = $request->get('days');
        $BookingData->check_out_date = $request->get('check_out_date');
        $BookingData->check_out_time = $request->get('check_out_time');
        
        


        $BookingData->prooftype_one = $request->get('prooftype_one');
        // Camera
         if ($request->customer_photo != "") {
            $customer_photo = $request->customer_photo;
            $folderPath = "assets/customer_details/customer_photo";
            $image_parts = explode(";base64,", $customer_photo);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = $BookingData->customer_name . '_' . $random_no . '_' . 'customer image' . '.png';
            $customerimgfile = $folderPath . $fileName;
            file_put_contents($customerimgfile, $image_base64);
            $BookingData->customer_photo = $customerimgfile;
         }else{
           $Insertedcustomer_photo = $BookingData->customer_photo;
           $BookingData->customer_photo = $Insertedcustomer_photo;
         }



         // Proof Front
         if ($request->proofimage_one != "") {
            $proofimage_one = $request->proofimage_one;
            $front_folderPath = "assets/customer_details/proofimage_one";
            $front_image_parts = explode(";base64,", $proofimage_one);
            $frontimage_type_aux = explode("image/", $front_image_parts[0]);
            $frontimage_type = $frontimage_type_aux[1];
            $frontimage_base64 = base64_decode($front_image_parts[1]);
            $frontfileName = $BookingData->customer_name . '_' . $random_no . '_' . 'proof front image' . '.png';
            $frontimgfile = $front_folderPath . $frontfileName;
            file_put_contents($frontimgfile, $frontimage_base64);
            $BookingData->proofimage_one = $frontimgfile;
            }else{
              $Insertedproofimage_one = $BookingData->proofimage_one;
              $BookingData->proofimage_one = $Insertedproofimage_one;
            }


            // Proof Back
         if ($request->proofimage_two != "") {
            $proofimage_two = $request->proofimage_two;
            $back_folderPath = "assets/customer_details/proofimage_two";
            $back_image_parts = explode(";base64,", $proofimage_two);
            $backimage_type_aux = explode("image/", $back_image_parts[0]);
            $backimage_type = $backimage_type_aux[1];
            $backimage_base64 = base64_decode($back_image_parts[1]);
            $backfileName = $BookingData->customer_name . '_' . $random_no . '_' . 'proof back image' . '.png';
            $backimgfile = $back_folderPath . $backfileName;
            file_put_contents($backimgfile, $backimage_base64);
            $BookingData->proofimage_two = $backimgfile;
            }else{
              $Insertedproofimage_two = $BookingData->proofimage_two;
              $BookingData->proofimage_two = $Insertedproofimage_two;
            }


        // if ($request->file('proofimage_one') != "") {
        //    $proofimage_one = $request->proofimage_one;
        //    $filename_one = $BookingData->customer_name . '_' . $random_no . '_' . 'proof front image' . '.' . $proofimage_one->getClientOriginalExtension();
        //    $request->proofimage_one->move('assets/customer_details/proofimage_one', $filename_one);
        //    $BookingData->proofimage_one = $filename_one;
        // } else {
        //    $Insertedproof_image_one = $BookingData->proofimage_one;
        //    $BookingData->proofimage_one = $Insertedproof_image_one;
        // }


        // if ($request->file('proofimage_two') != "") {
        //    $proofimage_two = $request->proofimage_two;
        //    $filename_two = $BookingData->customer_name . '_' . $random_no . '_' . 'proof back image' . '_' . '.' . $proofimage_two->getClientOriginalExtension();
        //    $request->proofimage_two->move('assets/customer_details/proofimage_two', $filename_two);
        //    $BookingData->proofimage_two = $filename_two;
        // } else {
        //    $Insertedproof_image_two = $BookingData->proofimage_two;
        //    $BookingData->proofimage_two = $Insertedproof_image_two;
        // }

        // if ($request->file('customer_photo') != "") {
        //    $customer_photo = $request->customer_photo;
        //    $filename_customer_photo = $BookingData->customer_name . '_' . $random_no . '_' . 'Photo' . '.' . $customer_photo->getClientOriginalExtension();
        //    $request->customer_photo->move('assets/customer_details/customer_photo', $filename_customer_photo);
        //    $BookingData->customer_photo = $filename_customer_photo;
        // } else {
        //    $Insertedproof_customer_photo = $BookingData->customer_photo;
        //    $BookingData->customer_photo = $Insertedproof_customer_photo;
        // }


        $BookingData->total = $request->get('total_calc_price');
        $BookingData->coupon_codeid = $request->get('coupon_codeid');
        $BookingData->totalamount_afterdiscount = $request->get('totalamount_afterdiscount');
        $BookingData->disc_amount = $request->get('discountamount');
        $BookingData->gst_per = $request->get('gst_percentage');
        $BookingData->gst_amount = $request->get('gst_amount');
        $BookingData->grand_total = $request->get('grand_total');
        $BookingData->total_paid = $request->get('total_payable');
        $BookingData->balance_amount = $request->get('balance_amount');
        $BookingData->check_in_staff = $request->get('check_in_staff');
        $BookingData->update();

        $booking_id = $id;

        // Booking Payments
        
        foreach ($request->get('booking_payment_id') as $key => $booking_payment_id) {

            if ($booking_payment_id > 0) {


                $ids = $booking_payment_id;
                $bookingID = $booking_id;
                $payment_term = $request->payment_term[$key];
                $payable_amount = $request->payable_amount[$key];
                $payment_method = $request->payment_method[$key];
                $check_in_staff = $request->get('check_in_staff');

                DB::table('booking_payments')->where('id', $ids)->update([
                    'booking_id' => $bookingID,  'term' => $payment_term,  'payable_amount' => $payable_amount,  'payment_method' => $payment_method,  'check_in_staff' => $check_in_staff
                ]);



            } else if ($booking_payment_id == '') {
                if ($request->payment_term[$key] != "") {

                    $payment_term = $request->payment_term[$key];
                    $payable_amount = $request->payable_amount[$key];
                    $payment_method = $request->payment_method[$key];
                    $check_in_staff = $request->get('check_in_staff');
                    $paid_date = $today;
                    $bookingID = $booking_id;

                    $BookingPayment = new BookingPayment;
                    $BookingPayment->booking_id = $bookingID;
                    $BookingPayment->term = $payment_term;
                    $BookingPayment->payable_amount = $payable_amount;
                    $BookingPayment->payment_method = $payment_method;
                    $BookingPayment->check_in_staff = $check_in_staff;
                    $BookingPayment->paid_date = $paid_date;
                    $BookingPayment->save();

                }
            }
        }

        $total_paid = 0;
        $getinsertedBookingP = BookingPayment::where('booking_id', '=', $booking_id)->get();
        foreach ($getinsertedBookingP as $key => $getinsertedBookingPs) {
            $total_paid += $getinsertedBookingPs->payable_amount;
        }

        
        $Booking_Data = Booking::findOrFail($id);

        $total_amount = $Booking_Data->grand_total;
        $balanceamount = $total_amount - $total_paid;

        $Booking_Data->total_paid = $total_paid;
        $Booking_Data->balance_amount = $balanceamount;
        $Booking_Data->update();



        

        // Booking Rooms
        $getinsertedBookingRooms = BookingRoom::where('booking_id', '=', $booking_id)->get();
        $BookingRooms = array();
        foreach ($getinsertedBookingRooms as $key => $getinsertedBookingRoom) {
            $BookingRooms[] = $getinsertedBookingRoom->id;
        }
        $updatedroom_id = $request->room_auto_id;
        $updatedroomIDs = array_filter($updatedroom_id);
        $different_ids = array_merge(array_diff($BookingRooms, $updatedroomIDs), array_diff($updatedroomIDs, $BookingRooms));
        if (!empty($different_ids)) {
            foreach ($different_ids as $key => $different_id) {
                $Rooms_ids = BookingRoom::findOrFail($different_id);
                DB::table('rooms')->where('id', $Rooms_ids->room_id)->update([
                    'booking_status' => 0
                ]);
            }
        }

        if (!empty($different_ids)) {
            foreach ($different_ids as $key => $different_id) {
                BookingRoom::where('id', $different_id)->delete();
            }
        }

        foreach ($request->get('room_auto_id') as $key => $room_auto_id) {
            if ($room_auto_id > 0) {


                $ids = $room_auto_id;
                $bookingID = $booking_id;
                $room_id = $request->room_id[$key];
                $room_price = $request->room_price[$key];
                $room_cal_price = $request->room_cal_price[$key];

                $GetroomDetails = Room::findOrFail($room_id);

                $room_type = $GetroomDetails->room_category;

                DB::table('booking_rooms')->where('id', $ids)->update([
                    'booking_id' => $bookingID,  'room_id' => $room_id,  'room_price' => $room_price,  'room_cal_price' => $room_cal_price, 'room_type' => $room_type
                ]);
            } else if ($room_auto_id == '') {
                if ($request->room_id[$key] > 0) {

                    $GetroomDetails = Room::findOrFail($request->room_id[$key]);

                    $new_room_id =  $request->room_id[$key];
                    $room_price =  $request->room_price[$key];
                    $room_cal_price =  $request->room_cal_price[$key];

                    $BookingRoom = new BookingRoom;
                    $BookingRoom->booking_id = $booking_id;
                    $BookingRoom->room_id = $new_room_id;
                    $BookingRoom->room_type = $GetroomDetails->room_category;
                    $BookingRoom->room_floor = $GetroomDetails->room_floor;
                    $BookingRoom->room_price = $room_price;
                    $BookingRoom->room_cal_price = $room_cal_price;

                    $BookingRoom->save();

                    DB::table('rooms')->where('id', $new_room_id)
                        ->update(['booking_status' => 1]);
                }
            }
        }

       return redirect()->route('booking.index')->with('update', 'Updated booking information has been added to your list.');
    }

    public function delete($id)
    {
        $data = Booking::findOrFail($id);
        $data->soft_delete = 1;
        $data->update();

        $BookingRooms = BookingRoom::where('booking_id', '=', $id)->get();
        foreach ($BookingRooms as $key => $BookingRooms_arr) {
            $bookingroom_data = BookingRoom::findOrFail($BookingRooms_arr->id);
            $bookingroom_data->soft_delete = 1;
            $bookingroom_data->update();
        }

        return redirect()->route('booking.index')->with('soft_destroy', 'Successfully deleted the booking record !');
    }

    public function destroy($id)
    {
        $data = Booking::findOrFail($id);

        $data->delete();

        return redirect()->route('booking.index')->with('destroy', 'Successfully erased the booking record !');
    }

    public function checkout(Request $request, $id)
    {
        $data = Booking::findOrFail($id);

        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        if($data->balance_amount < 0){

            $refundamount = $data->balance_amount;

            $lastpayment = BookingPayment::where('soft_delete', '!=', 1)->where('booking_id', '=', $id)->latest('id')->first();
            if($lastpayment->payable_amount > $refundamount){
                $new_paidamount = $lastpayment->payable_amount + ($refundamount);

                $lastpayment->payable_amount = $new_paidamount;
                $lastpayment->update();
            }else {
                $secondlastpayment = BookingPayment::where('soft_delete', '!=', 1)->where('booking_id', '=', $id)->skip(1)->take(1)->first();
                if($secondlastpayment->payable_amount > $refundamount){
                    $news_paidamount = $secondlastpayment->payable_amount + ($refundamount);
                    $secondlastpayment->payable_amount = $news_paidamount;
                    $secondlastpayment->update();
                }
            }

           
            $grandtotal = $data->grand_total;
            $paidamount = $data->total_paid;
            $updated_paid = $paidamount + ($refundamount);
            $balance = $grandtotal - $updated_paid;

            $data->total_paid = $updated_paid;
            $data->balance_amount = $balance;
        }

        $data->out_time = $request->get('out_time');
        $data->out_date = $request->get('out_date');
        $data->check_out_staff = $request->get('check_out_staff');
        $status = 2;
        $data->status = $status;

        $data->update();

        $customer_name = $data->customer_name;
        $whatsapp = $data->whats_app_number;

        foreach ($request->get('room_id') as $key => $room_id) {
            DB::table('rooms')->where('id', $room_id)
            ->update(['booking_status' => 0]);
        }

        $BookingPayments = BookingPayment::where('booking_id', '=', $id)->get();
        foreach ($BookingPayments as $key => $BookingPayments_arr) {
            $BookingPayments_arr->check_out_staff = $request->get('check_out_staff');
            $BookingPayments_arr->update();
        }


        return redirect()->route('booking.view', ['id' => $data->id])->with('add', 'Checkout information has been updated to your list.');

    }

    public function pay_balance(Request $request, $id)
    {
        $paid_date = Carbon::now()->format('Y-m-d');
        $data = Booking::findOrFail($id);



        $BookingPayment = new BookingPayment;
        $BookingPayment->booking_id = $id;
        $BookingPayment->term = $request->get('payment_term');
        $BookingPayment->check_in_staff = $data->check_in_staff;
        $BookingPayment->payable_amount = $request->get('payable_amount');
        $BookingPayment->paid_date = $paid_date;
        $BookingPayment->payment_method = $request->get('payment_method');
        $BookingPayment->save();

        $payableAmount = $request->get('payable_amount');
        
        $total_paid_amount = $data->total_paid + $payableAmount;
        $balance = $data->grand_total - $total_paid_amount;
        $data->total_paid = $total_paid_amount;
        $data->balance_amount = $balance;
        $data->update();

        return redirect()->back()->with('update', 'Updated booking payment information has been added to your list.');
    }

    public function view($id)
    {
        $data = Booking::findOrFail($id);
        $today = Carbon::now()->format('d M Y');
        $roomsbooked = BookingRoom::where('booking_id', '=', $id)->get();

        $room_list = [];
        foreach ($roomsbooked as $key => $rooms_booked) {
            $Rooms = Room::findOrFail($rooms_booked->room_id);
            $room_list[] = array(
                'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $rooms_booked->room_type,
                'room_price' => $rooms_booked->room_price,
                'days' => $data->days,
                'room_cal_price' => $rooms_booked->room_cal_price,
            );
        }

        return view('pages.backend.booking.view', compact('data', 'room_list', 'today'));
    }

    public function bookingbillview($id)
    {
        $data = Booking::findOrFail($id);
        $today = Carbon::now()->format('d M Y');
        $roomsbooked = BookingRoom::where('booking_id', '=', $id)->get();
        $branch = Branch::findOrFail($data->branch_id);

        $room_list = [];
        foreach ($roomsbooked as $key => $rooms_booked) {
            $Rooms = Room::findOrFail($rooms_booked->room_id);
            $room_list[] = array(
                'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $rooms_booked->room_type,
                'room_price' => $rooms_booked->room_price,
                'days' => $data->days,
                'room_cal_price' => $rooms_booked->room_cal_price,
            );
        }

        return view('pages.backend.booking.bookingbillview', compact('data', 'branch', 'room_list', 'today'));
    }

    public function datefilter(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');
        $from_date = $request->get('from_date');
        $timenow = Carbon::now()->format('H:i');
        $staff = Staff::where('soft_delete', '!=', 1)->get();

        $checkins = Booking::where('check_in_date', '=', $from_date)->where('soft_delete', '!=', 1)->count();
        $checkouts = Booking::where('out_date', '=', $from_date)->where('soft_delete', '!=', 1)->count();
        $availablerooms = Room::where('soft_delete', '!=', 1)->where('booking_status', '!=', 1)->count();
        $totalrooms = Room::where('soft_delete', '!=', 1)->count();

        $checkin_Array = [];
        $room_list = [];
        $terms = [];

        $check_in_date = Booking::where('check_in_date', '=', $from_date)->orwhere('out_date', '=', $from_date)->where('soft_delete', '!=', 1)->get();

            foreach ($check_in_date as $key => $check_in_dates) {
                $roomsbooked = BookingRoom::where('booking_id', '=', $check_in_dates->id)->get();
                foreach ($roomsbooked as $key => $rooms_booked) {
                    $Rooms = Room::findOrFail($rooms_booked->room_id);
                    $room_list[] = array(
                        'room' => 'No. '. $Rooms->room_number . ' - ' . $Rooms->room_floor . 'th'  .' Floor ' . ' - ' . $rooms_booked->room_type,
                        'booking_id' => $check_in_dates->id,
                        'booking_room_price' => $rooms_booked->room_price,
                        'room_cal_price' => $rooms_booked->room_cal_price,
                        'id' => $rooms_booked->id,
                        'room_id' => $rooms_booked->room_id,
                    );
                }

                $payment_data = BookingPayment::where('booking_id', '=', $check_in_dates->id)->get();
                foreach ($payment_data as $key => $payment_datas) {

                    $terms[] = array(
                        'booking_id' => $check_in_dates->id,
                        'term' => $payment_datas->term,
                        'payable_amount' => $payment_datas->payable_amount,
                        'id' => $payment_datas->id,
                        'payment_method' => $payment_datas->payment_method,
                        'room_type' => $rooms_booked->room_type,
                    );
                }
                $checkin_staffname = Staff::findOrFail($check_in_dates->check_in_staff);

                if($check_in_dates->check_out_staff != ""){
                    $checkout_staff_name = Staff::findOrFail($check_in_dates->check_out_staff);
                    $checkout_staffname = $checkout_staff_name->name;
                }else {
                    $checkout_staffname = '';
                }
               
                $checkin_Array[] = array(
                        'customer_name' => $check_in_dates->customer_name,
                        'room_list' => $room_list,
                        'chick_in_date' => $check_in_dates->check_in_date,
                        'chick_in_time' => $check_in_dates->check_in_time,
                        'id' => $check_in_dates->id,
                        'chick_out_date' => $check_in_dates->check_out_date,
                        'out_date' => $check_in_dates->out_date,
                        'chick_out_time' => $check_in_dates->check_out_time,
                        'phone_number' => $check_in_dates->phone_number,
                        'grand_total' => $check_in_dates->grand_total,
                        'total_paid' => $check_in_dates->total_paid,
                        'balance_amount' => $check_in_dates->balance_amount,
                        'days' => $check_in_dates->days,
                        'gst_per' => $check_in_dates->gst_per,
                        'gst_amount' => $check_in_dates->gst_amount,
                        'disc_per' => $check_in_dates->disc_per,
                        'disc_amount' => $check_in_dates->disc_amount,
                        'additional_amount' => $check_in_dates->additional_amount,
                        'additional_notes' => $check_in_dates->additional_notes,
                        'total' => $check_in_dates->total,
                        'terms' => $terms,
                        'status' => $check_in_dates->status,
                        'extended_date' => $check_in_dates->extended_date,
                        'extended_time' => $check_in_dates->extended_time,
                        'out_date' => $check_in_dates->out_date,
                        'out_time' => $check_in_dates->out_time,
                        'booking_invoiceno' => $check_in_dates->booking_invoiceno,
                        'couple' => $check_in_dates->couple,
                        'check_in_staff' => $checkin_staffname->name,
                        'check_out_staff' => $checkout_staffname,
                        'proofimage_one' => $check_in_dates->proofimage_one,
                        'proofimage_two' => $check_in_dates->proofimage_two,
                        'customer_photo' => $check_in_dates->customer_photo,
                );
            }

        return view('pages.backend.booking.datefilter', compact('totalrooms', 'checkins', 'checkouts', 'availablerooms', 'timenow', 'staff', 'today', 'checkin_Array', 'from_date'));
    }

    public function autocomplete(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = Booking::select ("phone_number")
                    ->where('phone_number', 'LIKE', "%{$query}%")->distinct()->get();
            $output = '<ul class="dropdown-menu form-control" style="display:block; position:relative; padding: 9px;background: #9ddbdb2e;">';
            foreach(($data) as $row)
            {
                $output .= '<li><a href="#" style="color:black;padding:5px;">'.$row->phone_number.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function getoldCustomers($phone_no)
    {
        $GetCustomer = Booking::select('*')->where('phone_number', $phone_no)->latest('id')->first();
        $userData['data'] = $GetCustomer;
        echo json_encode($userData);
    }

    public function extend(Request $request, $id)
    {
        $data = Booking::findOrFail($id);

        $data->check_out_date = $request->get('extended_date');
        $data->check_out_time = $request->get('extended_time');
        // $data->extended_date = $request->get('extended_date');
        // $data->extended_time = $request->get('extended_time');
        $data->days = $request->get('no_of_days');
        $data->total = $request->get('total_calc_price');
        $data->gst_amount = $request->get('gst_amount');
        $data->gst_per = $request->get('gst_percentage');
        $data->disc_amount = $request->get('discount_amount');
        $data->disc_per = $request->get('discount_percentage');
        $data->additional_amount = $request->get('additional_charge');
        $data->additional_notes = $request->get('additional_charge_notes');
        $data->grand_total = $request->get('grand_total');
        $data->total_paid = $request->get('payable_amount');
        $data->balance_amount = $request->get('balance_amount');
        $status = 1;
        $data->status = $status;
        $data->update();

        if($request->get('balance_amount') > 0){

            $paiddate = Carbon::now()->format('Y-m-d');

            $BookingPayment = new BookingPayment;
            $BookingPayment->booking_id = $request->get('booking_id');
            $BookingPayment->term = $request->get('payment_term');
            $BookingPayment->payable_amount = $request->get('balance_amount');
            $BookingPayment->paid_date = $paiddate;
            $BookingPayment->payment_method = $request->get('payment_method');
            $BookingPayment->save();

            $payableAmount = $request->get('balance_amount');

            $booking_data = Booking::findOrFail($id);
            $total_paid_amount = $booking_data->total_paid + $payableAmount;
            $balance = $booking_data->grand_total - $total_paid_amount;
            $booking_data->total_paid = $total_paid_amount;
            $booking_data->balance_amount = $balance;
            $booking_data->update();

            foreach ($request->get('room_auto_id') as $key => $room_auto_id) {

                $ids = $room_auto_id;
                $bookingID = $request->get('booking_id');
                $booking_room_price = $request->booking_room_price[$key];
                $booking_room_cal_price = $request->booking_room_cal_price[$key];
                $room_id = $request->room_id[$key];
                DB::table('booking_rooms')->where('id', $ids)
                    ->update(['room_price' => $booking_room_price,  'room_cal_price' => $booking_room_cal_price]);
            }
        }

        return redirect()->back()->with('update', 'Updated booking information has been added to your list.');
    }

    public function pricing($id)
    {
        $data = Booking::findOrFail($id);
        return view('pages.backend.booking.checkout', compact('data'));
    }

    public function exportaspdf()
    {
        $branch = Branch::where('soft_delete', '!=', 1)->get();
        $staff = Staff::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.booking.components.exportaspdf', compact('branch', 'staff'));
    }

    public function printexportpdf(Request $request)
    {

        $manager_id = $request->get('manager_id');
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $manager = Staff::findOrFail($manager_id);




        $Export_Array = [];
        $checkin_Data = Booking::whereBetween('check_in_date', [$from_date, $to_date])
                        ->where('check_in_staff', '=', $manager_id)->orwhere('check_out_staff', '=', $manager_id)
                        ->orderBy('id', 'asc')
                        ->where('soft_delete', '!=', 1)
                        ->get();


        
        foreach (($checkin_Data) as $key => $checkin_Datas) {


                $roomsbooked = BookingRoom::where('booking_id', '=', $checkin_Datas->id)->get();
                foreach ($roomsbooked as $key => $rooms_booked) {
                   

                        $Rooms = Room::findOrFail($rooms_booked->room_id);
                        $room_list[] = array(
                            'roomno' => 'No. '. $Rooms->room_number,
                            'roomtype' => $rooms_booked->room_type,
                            'booking_room_price' => $rooms_booked->room_price,
                            'booking_id' => $checkin_Datas->id,
                        );
                }

            $BookingpaymentArr = BookingPayment::where('booking_id', '=', $checkin_Datas->id)
                                        ->where('soft_delete', '!=', 1)
                                        ->orderBy('booking_id', 'asc')
                                        ->get();
            foreach ($BookingpaymentArr as $key => $BookingpaymentArray) {

                $checkin_manager = Staff::findOrFail($checkin_Datas->check_in_staff);
                if($checkin_Datas->check_out_staff != ""){
                    $checkout_manager = Staff::findOrFail($checkin_Datas->check_out_staff);
                    $checkout_staff = $checkout_manager->name;

                    if($checkout_manager->name == $manager->name){
                        $cocolor = 'red';
                        $cofontweight = '600';
                    }else {
                        $cocolor = 'black';
                        $cofontweight = '';
                    }
                    $out_date = date('M d Y', strtotime($checkin_Datas->out_date));
                }else {
                    $checkout_staff = '';
                    $cocolor = '';
                    $cofontweight = '';
                    $out_date = '';
                }

                if($checkin_manager->name == $manager->name){
                    $cicolor = 'red';
                    $cifontweight = '600';
                }else {
                    $cicolor = 'black';
                    $cifontweight = '';
                }

              


                $Export_Array[] = array(
                    'booking_invoiceno' => $checkin_Datas->booking_invoiceno,
                    'check_in_date' => date('M d Y', strtotime($checkin_Datas->check_in_date)),
                    'checkin_manager' => $checkin_manager->name,
                    'checkout_staff' => $checkout_staff,
                    'cicolor' => $cicolor,
                    'cocolor' => $cocolor,
                    'cifontweight' => $cifontweight,
                    'cofontweight' => $cofontweight,
                    'room_list' => $room_list,
                    'id' => $checkin_Datas->id,
                    'term' => $BookingpaymentArray->term,
                    'payment' => $BookingpaymentArray->payable_amount,
                    'gst_amount' => $checkin_Datas->gst_amount,
                    'out_date' => $out_date,
                );
            }

            

        }








        $checkout_Data = Booking::whereBetween('out_date', [$from_date, $to_date])
                                ->where('check_out_staff', '=', $manager_id)
                                ->where('soft_delete', '!=', 1)
                                ->orderBy('out_date', 'asc')
                                ->get();
        $checkout_Array = [];
        $ch_oroom_list = [];
        foreach ($checkout_Data as $key => $checkout_Datas) {

                $coroomsbooked = BookingRoom::where('booking_id', '='
                , $checkout_Datas->id)->get();
                    foreach ($coroomsbooked as $key => $corooms_booked) {
                        $Rooms = Room::findOrFail($corooms_booked->room_id);
                        $ch_oroom_list[] = array(
                            'roomno' => 'No. '. $Rooms->room_number,
                            'roomtype' => $corooms_booked->room_type,
                            'booking_room_price' => $corooms_booked->room_price,
                            'booking_id' => $checkout_Datas->id,
                        );
                    }




                    $checkout_Array[] = array(
                        'room_list' => $ch_oroom_list,
                        'days' => $checkout_Datas->days,
                        'grand_total' => $checkout_Datas->grand_total,
                        'id' => $checkout_Datas->id,
                        'check_out_date' => $checkout_Datas->check_out_date,
                        'total' => $checkout_Datas->total,
                        'gst_amount' => $checkout_Datas->gst_amount,
                        'booking_invoiceno' => $checkout_Datas->booking_invoiceno,
                    );
        }

        $income = Income::whereBetween('date', [$from_date, $to_date])
                                ->where('staff_id', '=', $manager_id)
                                ->where('soft_delete', '!=', 1)
                                ->orderBy('date', 'asc')
                                ->get();

        $expence = Expense::whereBetween('date', [$from_date, $to_date])
                                ->where('staff_id', '=', $manager_id)
                                ->where('soft_delete', '!=', 1)
                                ->orderBy('date', 'asc')
                                ->get();

        $income_total = Income::whereBetween('date', [$from_date, $to_date])
                                ->where('staff_id', '=', $manager_id)
                                ->where('soft_delete', '!=', 1)
                                ->sum('amount');

        $expence_total = Expense::whereBetween('date', [$from_date, $to_date])
                                ->where('staff_id', '=', $manager_id)
                                ->where('soft_delete', '!=', 1)
                                ->sum('amount');



        $Total_room_income = Booking::whereBetween('check_in_date', [$from_date, $to_date])
                                ->where('check_in_staff', '=', $manager_id)
                                ->where('soft_delete', '!=', 1)
                                ->get();

        $room_cash_income_tax = 0;
        $room_cash_income = 0;
        foreach ($Total_room_income as $key => $Total_room_income_arr) {

            $payment_data_arr = BookingPayment::where('booking_id', '=', $Total_room_income_arr->id)
                                            ->where('payment_method', '=', 'Cash')
                                            ->get();

            foreach ($payment_data_arr as $key => $payment_data_array) {

                if($payment_data_array->booking_id == $Total_room_income_arr->id){
                    $room_cash_income += $payment_data_array->payable_amount;
                    $room_cash_income_tax += $Total_room_income_arr->gst_amount;
                }
            }
        }

        $room_online_income = 0;
        $room_online_income_tax = 0;
        foreach ($Total_room_income as $key => $Total_room_income_array) {
            $payment_onlinedata_arr = BookingPayment::where('booking_id', '=', $Total_room_income_array->id)
                                            ->where('payment_method', '=', 'Online Payment')
                                            ->get();

            foreach ($payment_onlinedata_arr as $key => $payment_onlinedata_array) {

                if($payment_onlinedata_array->booking_id == $Total_room_income_array->id){
                    $room_online_income += $Total_room_income_array->grand_total;
                    $room_online_income_tax += $Total_room_income_array->gst_amount;
                }
            }
        }



        return view('pages.backend.booking.components.printexportpdf', compact('room_online_income_tax', 'income_total', 'expence_total', 'income', 'expence', 'manager', 'from_date', 'to_date', 'Export_Array', 'checkout_Array', 'room_cash_income', 'room_online_income', 'room_cash_income_tax'));
    }

    public function export_reportpdf()
    {
        $branch = Branch::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.booking.components.export_reportpdf', compact('branch'));
    }

    public function print_reportpdf(Request $request)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');


        $Report_data = Booking::whereBetween('check_in_date', [$from_date, $to_date])
                                ->where('soft_delete', '!=', 1)
                                ->orderBy('check_in_date', 'asc')
                                ->get();

        $Reportdata_Array = [];
        foreach ($Report_data as $key => $Report_datas) {

                    $roomsbooked = BookingRoom::where('booking_id', '=', $Report_datas->id)->get();
                    foreach ($roomsbooked as $key => $rooms_booked) {
                        $Rooms = Room::findOrFail($rooms_booked->room_id);
                        $room_list[] = array(
                            'roomno' => 'No. '. $Rooms->room_number,
                            'roomtype' => $rooms_booked->room_type,
                            'booking_id' => $Report_datas->id,
                        );
                    }

                    $male_count = $Report_datas->male_count;
                    $female_count = $Report_datas->female_count;
                    $child_count = $Report_datas->child_count;



                    $Reportdata_Array[] = array(
                        'room_list' => $room_list,
                        'id' => $Report_datas->id,
                        'check_in_date' => $Report_datas->check_in_date,
                        'check_out_date' => $Report_datas->out_date,
                        'check_out_time' => $Report_datas->out_time,
                        'male_count' => $male_count,
                        'female_count' => $female_count,
                        'child_count' => $child_count,
                        'customer_name' => $Report_datas->customer_name,
                        'phone_number' => $Report_datas->phone_number,
                        'proofimage_one' => $Report_datas->proofimage_one,
                    );


        }

        return view('pages.backend.booking.components.print_reportpdf', compact('Reportdata_Array','from_date', 'to_date'));
    }
}
