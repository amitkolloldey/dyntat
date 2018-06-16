<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/payment/sslvalidation',
        '/payment/editSslvalidation',
        '/payment/adminEditCondetionvalidation',
        '/payment/editCondetionvalidation',
        '/payment/condetionvalidation',
        '/payment/sslfaild',
        '/payment/sslcancel',
        '/DataApi',
        '/api/order',
        '/ajax/addCoupon'
    ];
}
