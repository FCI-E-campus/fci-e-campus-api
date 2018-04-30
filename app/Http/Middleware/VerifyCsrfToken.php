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
        'http://localhost/E-campus/public/student/login',
        'http://localhost/E-campus/public/student/signup',
        'http://localhost/E-campus/public/professor/login',
        'http://localhost/E-campus/public/professor/signup',
        'http://localhost/E-campus/public/ta/login',
        'http://localhost/E-campus/public/ta/signup',
        'http://localhost/E-campus/public/admin/login',
        'http://localhost/E-campus/public/w',
    ];
}
