<?php
namespace Modules\Coupon\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Booking\Models\Booking;
use Modules\Coupon\Models\Coupon;

class CouponController extends Controller
{
    public function __construct()
    {

    }

    public function applyCoupon($code , Request $request){
        //dd('hi');
        $validator = \Validator::make($request->all(), [
            'coupon_code' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first());
        }
        $coupon = Coupon::where('code',$request->input('coupon_code'))->where("status","publish")->first();
        if(empty($coupon)){
            return $this->sendError( __("Invalid coupon code!"));
        }
        if(empty($coupon->user_type)){
        $booking = Booking::where('code', $code)->first();
        }else{
            $booking = Booking::where('code', $code)->where('vendor_id',$coupon->create_user)->first();
          if(empty($booking)){
            return $this->sendError( __("Invalid coupon code!"));
            }            
        }
        if ( !empty($booking) and !in_array($booking->status , ['draft','unpaid'])) {
            return $this->sendError( __("Booking not found!"));
        }
        $res = $coupon->applyCoupon($booking,'add');
        if($res['status']==1){
            $res['reload'] = 1;
        }
        return $this->sendSuccess($res);
    }

    public function removeCoupon($code , Request $request){
        $coupon = Coupon::where('code',$request->input('coupon_code'))->where("status","publish")->first();
        if(empty($coupon)){
            return $this->sendError( __("Invalid coupon code!"));
        }
        $booking = Booking::where('code', $code)->first();
        if ( !empty($booking) and !in_array($booking->status , ['draft','unpaid'])) {
            return $this->sendError( __("Booking not found!"));
        }
        $res = $coupon->applyCoupon($booking,'remove');
        if($res['status']==1){
            $res['reload'] = 1;
        }
        return $this->sendSuccess($res);
    }
}
