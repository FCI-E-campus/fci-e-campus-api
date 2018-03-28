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

Route::get('/studentLogin/{STUDUSERNAME}/{STUDPASSWORD}',['uses'=>'StudentController@show']);

Route::get('/studentSignUP/{STUDUSERNAME}/{DEPTID}/{DEP_DEPTID}/{STUDPASSWORD}/{FIRSTNAME}/{LASTNAME}/{EMAIL}/{PHONENUMBER}/{FACULTYID}/{ISMODERATOR}',
    ['uses'=>'StudentController@store']);

Route::get('/teacherSignUP/{PROFUSERNAME}/{DEPTID}/{PROFPASSWORD}/{FIRSTNAME}/{LASTNAME}/{EMAIL}/{PHONENUMBER}',
    ['uses'=>'TeacherController@store']);

Route::get('/teacherLogin/{PROFUSERNAME}/{PROFPASSWORD}',['uses'=>'TeacherController@show']);

Route::get('/addDepartment/{DEPTID}/{DEPARTMENTNAME}/{DESCRIPTION}',['uses'=>'DepartmentController@store']);
