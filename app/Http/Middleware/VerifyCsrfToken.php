<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/api/v0/kraken/make_order',
        '/api/v0/kraken/login', 
        '/api/v0/kraken/token',
        '/api/v0/paypal/payout',
        '/api/v0/paypal/payment', 
        '/api/v0/paypal/paymentstatus' ,
        '/payout',
        '/deposit/deposit_address' ,
        '/withdraw_request' ,
        '/payment_receive' ,
        '/currency_exchange',
        '/request',
        '/getprice',
        '/getnewaddress',
        '/offer_loan',
        '/get_loan',
        '/cancel_loan',
        '/cancel_offer',
        '/active_offers',
        '/active_loans',
        '/pending_loans',
        '/pending_offers',
        '/paid',
        '/add_collateral',
    ];
}
