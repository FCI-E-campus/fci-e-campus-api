<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/studentLogin/{userName}/{password}',['uses'=>'StudentController@show']);

Route::get('/studentSignUP/{userName}/{password}/{email}/{phoneNumber}/{facultyId}/{isModerator}',['uses'=>'StudentController@store']);
