<?php

namespace Plugins\ToyyibPay;

use Modules\ModuleServiceProvider;
use Plugins\ToyyibPay\Gateway\ToyyibPayGateway;

class ModuleProvider extends ModuleServiceProvider
{
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getPaymentGateway()
    {
        return [
            'toyyib_pay_gateway' => ToyyibPayGateway::class
        ];
    }

    public static function getPluginInfo()
    {
        return [
            'title'   => __('Gateway ToyyibPay'),
            'desc'    => __('Gateway ToyyibPay enable pay securely using your online banking through ToyyibPay.'),
            'author'  => "Pisyek Studios",
            'version' => "1.0.0",
        ];
    }

}
