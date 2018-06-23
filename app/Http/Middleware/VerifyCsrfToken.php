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
        'http://e-campus.herokuapp.com/student/login',

        'http://localhost/E-campus/public/student/login',
        'http://localhost/E-campus/public/professor/login',
        'http://localhost/E-campus/public/ta/login',
        'http://localhost/E-campus/public/student/signup',

        'http://e-campus.herokuapp.com/student/signup',

        'http://e-campus.herokuapp.com/professor/login',

        'http://e-campus.herokuapp.com/professor/signup',

        'http://e-campus.herokuapp.com/ta/login',

        'http://e-campus.herokuapp.com/ta/signup',


        'http://e-campus.herokuapp.com/ta/activate',


        'http://e-campus.herokuapp.com/department/add/new',



        'http://e-campus.herokuapp.com/professor/activate',


        'http://e-campus.herokuapp.com/admin/login',

        'http://e-campus.herokuapp.com/course/showCourse'
    ];
}
