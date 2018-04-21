<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://localhost/E-campus/public/studentLogin',
        'http://localhost/E-campus/public/teacherLogin',
        'http://localhost/E-campus/public/adminLogin',
        'http://localhost/E-campus/public/studentSignUP',
        'http://localhost/E-campus/public/teacherSignUP',
    ];
}
