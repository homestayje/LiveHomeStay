<?php


namespace Plugins\ToyyibPay\Gateway;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
use Modules\Booking\Gateways\BaseGateway;
use Modules\Booking\Models\Payment;
//use Omnipay\Omnipay;

class ToyyibPayGateway extends BaseGateway
{
    protected $id   = 'toyyib_pay_gateway';
    public    $name = 'ToyyibPay';
    protected $gateway;

    public function getOptionsConfigs()
    {
        return [
            [
                'type'  => 'checkbox',
                'id'    => 'enable',
                'label' => __('Enable ToyyibPay?')
            ],
            [
                'type'  => 'input',
                'id'    => 'name',
                'label' => __('Custom Name'),
                'std'   => __("ToyyibPay"),
                'multi_lang' => "1"
            ],
            [
                'type'  => 'upload',
                'id'    => 'logo_id',
                'label' => __('Custom Logo'),
            ],
            [
                'type'  => 'editor',
                'id'    => 'html',
                'label' => __('Custom HTML Description'),
                'multi_lang' => "1"
            ],
            [
                'type'  => 'input',
                'id'    => 'toyyibpay_secret_key',
                'label' => __('Secret Key'),
            ],
            [
                'type'  => 'input',
                'id'    => 'toyyibpay_category_code',
                'label' => __('Category Code'),
            ],
            [
                'type'    => 'select',
                'id'      => 'toyyibpay_payment_channel',
                'label'   => __('Payment Channel'),
                'desc'    => __('Choose your preferred payment channel - FPX and/or credit cards.'),
                'options' => $this->supportedPaymentChannel()
            ],
            [
                'type'  => 'checkbox',
                'id'    => 'toyyibpay_enable_sandbox',
                'label' => __('Enable Sandbox Mode'),
            ],
            [
                'type'  => 'input',
                'id'    => 'toyyibpay_secret_key_sandbox',
                'label' => __('Secret Key Sandbox'),
            ],
            [
                'type'  => 'input',
                'id'    => 'toyyibpay_category_code_sandbox',
                'label' => __('Category Code Sandbox'),
            ],
        ];
    }

    public function supportedPaymentChannel()
    {
        return [
            '0' => 'FPX only',
            '1' => 'Credit/Debit Card only',
            '2' => 'FPX and Credit/Debit Card'
        ];
    }

    public function process(Request $request, $booking, $service)
    {
        $bookingStatus = [
            $booking::PAID,
            $booking::COMPLETED,
            $booking::CANCELLED
        ];

        if (in_array($booking->status, $bookingStatus)) {
            throw new Exception(__("Booking status does need to be paid"));
        }

        if (!$booking->total) {
            throw new Exception(__("Booking total is zero. Can not process payment gateway!"));
        }

 //       $this->getGateway();
        $payment = new Payment();
        $payment->booking_id = $booking->id;
        $payment->payment_gateway = $this->id;
        $payment->status = 'draft';

        $data = $this->handlePurchaseData($request, $booking);
        $url = $this->getCreateBillUrl();

        $response = Http::asForm()->post($url, $data);

        if (!empty($response)) {
            $payment->save();
            $booking->status = $booking::UNPAID;
            $booking->payment_id = $payment->id;
            $booking->save();

            // redirect to offsite payment gateway
            response()->json([
                'url' => $this->getBillUrl($response[0]['BillCode'])
            ])->send();
        } else {
            throw new Exception('ToyyibPay Payment Gateway is not reachable.');
        }
    }

    public function handlePurchaseData($request, $booking)
    {
        return [
            'userSecretKey' => $this->getUserSecretKey(),
            'categoryCode' => $this->getCategoryCode(),
            'billName' => 'Homestayje.com',
            'billDescription' => 'Homestayje.com booking bill',
            'billPriceSetting' => 1, // 0 = dynamic bill
            'billPayorInfo' => 1, // 0 = payer info not required
            'billAmount' => (int) ($booking->pay_now * 100),
            'billReturnUrl' => url('/toyyibpay-status'),
            'billCallbackUrl' => url('/toyyibpay-callback'),
            'billExternalReferenceNo' => $booking->code,
            'billTo' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'billEmail' => $request->input('email'),
            'billPhone' => $request->input('phone'),
            'billSplitPayment' => 0,
            'billSplitPaymentArgs' => '',
            'billPaymentChannel' => $this->getOption('toyyibpay_payment_channel'),
            'billDisplayMerchant' => 1,
            'billContentEmail' => '',
            'billChargeToCustomer' => '',
        ];
    }

    public function getGateway()
    {
        $this->gateway = Omnipay::create('ToyyibPay');
        if ($this->getOption('toyyibpay_enable_sandbox')) {
            $this->gateway->setTestMode(1);
        }
    }

    public function getUrl()
    {
        return $this->getOption('toyyibpay_enable_sandbox') ?
            'https://dev.toyyibpay.com/' : 'https://toyyibpay.com/';
    }

    public function getUserSecretKey()
    {
        return $this->getOption('toyyibpay_enable_sandbox') ?
            $this->getOption('toyyibpay_secret_key_sandbox') : $this->getOption('toyyibpay_secret_key');
    }

    public function getCategoryCode()
    {
        return $this->getOption('toyyibpay_enable_sandbox') ?
            $this->getOption('toyyibpay_category_code_sandbox') : $this->getOption('toyyibpay_category_code');
    }

    public function getCreateBillUrl()
    {
        return $this->getOption('toyyibpay_enable_sandbox') ?
            'https://dev.toyyibpay.com/index.php/api/createBill' : 'https://toyyibpay.com/index.php/api/createBill';
    }

    public function getBillUrl($bill_code)
    {
        return $this->getOption('toyyibpay_enable_sandbox') ?
            'https://dev.toyyibpay.com/' . $bill_code : 'https://toyyibpay.com/' . $bill_code;
    }
}

