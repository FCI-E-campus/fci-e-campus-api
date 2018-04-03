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

Route::get('/studentSignUP/{STUDUSERNAME}/{DEPTID}/{DEP_DEPTID}/{STUDPASSWORD}/{FIRSTNAME}/{LASTNAME}/{EMAIL}/{PHONENUMBER}/{DATEOFBIRTH}/{FACULTYID}/{ISMODERATOR}',
    ['uses'=>'StudentController@store']);

Route::get('/teacherSignUP/{PROFUSERNAME}/{DEPTID}/{PROFPASSWORD}/{FIRSTNAME}/{LASTNAME}/{EMAIL}/{PHONENUMBER}/{DATEOFBIRTH}',
    ['uses'=>'TeacherController@store']);

Route::get('/teacherLogin/{PROFUSERNAME}/{PROFPASSWORD}',['uses'=>'TeacherController@show']);

Route::get('/addDepartment/{DEPTID}/{DEPARTMENTNAME}/{DESCRIPTION}',['uses'=>'DepartmentController@store']);

Route::get('/addCourse/{COURSECODE}/{DEPTID}/{COURSETITLE}/{DESCRIPTION}/{STARTDATE}/{ENDDATE}/{PASSCODE}',
    ['uses'=>'CourseController@store']);

Route::get('/assignTeacher/{COURSECODE}/{PROFUSERNAME}', ['uses'=>'AdminController@assignTeacherToCourse']);

Route::get('/deleteCourse/{COURSECODE}', ['uses'=>'AdminController@deleteCourse']);

Route::get('/deleteStudent/{STUDUSERNAME}', ['uses'=>'AdminController@deleteStudent']);

Route::get('/deleteProfessor/{PROFUSERNAME}', ['uses'=>'AdminController@deleteTeacher']);

Route::get('/addAnnouncement/{ANNOUNCEMENTID}/{ADMINUSERNAME}/{ANNOUNCEMENTTITLE}/{ANNOUNCEMENTBODY}/{DATEPUBLISHED}', ['uses'=>'AdminController@addAnnouncement']);


