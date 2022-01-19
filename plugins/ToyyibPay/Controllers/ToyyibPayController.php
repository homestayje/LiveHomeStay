<?php

namespace Plugins\ToyyibPay\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Booking\Models\Booking;

class ToyyibPayController extends Controller
{
    public function status()
    {
        $response = request()->all(['status_id', 'billcode', 'order_id']);
        $booking = Booking::where('code', $response['order_id'])->first();

        // if payment success
        if (!empty($booking) and in_array($booking->status, [$booking::UNPAID]) and $response['status_id'] == 1) {
            $payment = $booking->payment;
            if ($payment) {
                $payment->status = 'completed';
                $payment->logs = request()->all();
                $payment->save();
            }

            try {
                $booking->paid += (float)$booking->pay_now;
                $booking->markAsPaid();
            } catch (\Swift_TransportException $e) {
                Log::warning($e->getMessage());
            }
            return redirect($booking->getDetailUrl())->with("success", __("You payment has been processed successfully"));
        }

        // if payment fail
        if (!empty($booking) and in_array($booking->status, [$booking::UNPAID]) and $response['status_id'] == 3) {
            $payment = $booking->payment;
            if ($payment) {
                $payment->status = 'fail';
                $payment->logs = request()->all();
                $payment->save();
            }

            try {
                $booking->markAsPaymentFailed();
            } catch (\Swift_TransportException $e) {
                Log::warning($e->getMessage());
            }
            return redirect($booking->getDetailUrl())->with("error", __("Payment Failed"));
        }

        if (!empty($booking)) {
            return redirect($booking->getDetailUrl(false));
        } else {
            return redirect(url('/'));
        }
    }

    public function callback()
    {
        //$response = request()->all();
    }
}
