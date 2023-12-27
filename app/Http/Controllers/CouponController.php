<?php

namespace App\Http\Controllers;
use App\Models\Coupon;
use App\Models\Booking;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App;

class CouponController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        $data = Coupon::where('soft_delete', '!=', 1)->get();
        $coupons_terms = [];
        foreach ($data as $key => $datas) {

            $used_coupons = Booking::where('coupon_codeid', '=', $datas->id)->where('soft_delete', '!=', 1)->count();

            $coupons_terms[] = array(
                'id' => $datas->id,
                'date' => $datas->date,
                'coupon_code' => $datas->coupon_code,
                'reduction_amount' => $datas->reduction_amount,
                'reduction_percentage' => $datas->reduction_percentage,
                'friendname' => $datas->friendname,
                'used_coupons' => $used_coupons,
            );
        }

        return view('pages.backend.coupon.index', compact('today', 'timenow', 'coupons_terms'));
    }


    public function store(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = new Coupon();
        $data->date = $today;
        $data->coupon_code = $request->get('coupon_code');
        $data->reduction_amount = $request->get('reduction_amount');
        $data->reduction_percentage = $request->get('reduction_percentage');
        $data->friendname = $request->get('friendname');

        $data->save();

        return redirect()->route('coupon.index')->with('add', 'New Coupon information has been added to your list.');
    }

    public function edit($id)
    {
        $data = Coupon::findOrFail($id);

        return view('pages.backend.coupon.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Coupon::findOrFail($id);

        $data->coupon_code = $request->get('coupon_code');
        $data->reduction_amount = $request->get('reduction_amount');
        $data->reduction_percentage = $request->get('reduction_percentage');
        $data->friendname = $request->get('friendname');

        $data->update();

        return redirect()->route('coupon.index')->with('update', 'Updated Coupon information has been added to your list.');
    }

    public function delete($id)
    {
        $data = Coupon::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('coupon.index')->with('soft_destroy', 'Successful removal of the Coupon record for the list.');
    }

    public function destroy($id)
    {
        $data = Coupon::findOrFail($id);

        $data->delete();

        return redirect()->route('coupon.index')->with('destroy', 'Successfully erased the Coupon record !');
    }


    public function getCouponDiscount()
    {
        $coupon_codeid = request()->get('coupon_codeid');

        $last_idrow = Coupon::findOrFail($coupon_codeid);
            $output[] = array(
                'reduction_amount' => $last_idrow->reduction_amount,
                'reduction_percentage' => $last_idrow->reduction_percentage,
            );
        
        echo json_encode($output);
    }


    public function usedcustomers($id)
    {
        $booking_customers = Booking::where('coupon_codeid', '=', $id)->get();
        $coupon_code = Coupon::findOrFail($id);
        return view('pages.backend.coupon.couponused_customers', compact('booking_customers', 'coupon_code'));
    }


}
