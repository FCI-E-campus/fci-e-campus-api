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
        'http://10.0.2.2/E-campus/public/student/login',
        'http://10.0.3.2/E-campus/public/student/login',

        'http://localhost/E-campus/public/student/signup',
        'http://10.0.2.2/E-campus/public/student/signup',
        'http://10.0.3.2/E-campus/public/student/signup',

        'http://localhost/E-campus/public/student/updatePass',
        'http://10.0.2.2/E-campus/public/student/updatePass',
        'http://10.0.3.2/E-campus/public/student/updatePass',

        'http://localhost/E-campus/public/professor/login',
        'http://10.0.2.2/E-campus/public/professor/login',
        'http://10.0.3.2/E-campus/public/professor/login',

        'http://localhost/E-campus/public/professor/signup',
        'http://10.0.2.2/E-campus/public/professor/signup',
        'http://10.0.3.2/E-campus/public/professor/signup',

        'http://localhost/E-campus/public/ta/login',
        'http://10.0.2.2/E-campus/public/ta/login',
        'http://10.0.3.2/E-campus/public/ta/login',

        'http://localhost/E-campus/public/ta/signup',
        'http://10.0.2.2/E-campus/public/ta/signup',
        'http://10.0.3.2/E-campus/public/ta/signup',

        'http://localhost/E-campus/public/ta/updatePass',
        'http://10.0.2.2/E-campus/public/ta/updatePass',
        'http://10.0.3.2/E-campus/public/ta/updatePass',

        'http://localhost/E-campus/public/ta/activate',
        'http://10.0.2.2/E-campus/public/ta/activate',
        'http://10.0.3.2/E-campus/public/ta/activate',

        'http://localhost/E-campus/public/professor/activate',
        'http://10.0.2.2/E-campus/public/professor/activate',
        'http://10.0.3.2/E-campus/public/professor/activate',

        'http://localhost/E-campus/public/professor/updatePass',
        'http://10.0.2.2/E-campus/public/professor/updatePass',
        'http://10.0.3.2/E-campus/public/professor/updatePass',

        'http://localhost/E-campus/public/admin/login'
    ];
}
