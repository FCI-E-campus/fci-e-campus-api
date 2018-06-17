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

Route::prefix('student')->group(function() {
    Route::post('/login','StudentController@show');
    Route::post('/signup','StudentController@store');
    Route::post('/updatePass','StudentController@update');
});

Route::prefix('professor')->group(function() {
    Route::post('/login','ProfessorController@show');
    Route::post('/signup','ProfessorController@store');
    Route::post('/addTask','CourseController@addTask');
    Route::post('/activate','ProfessorController@activate');
    Route::post('/updatePass','ProfessorController@update');
});

Route::prefix('ta')->group(function() {
    Route::post('/login','TAController@show');
    Route::post('/signup','TAController@store');
    Route::post('/addTask','CourseController@addTask');
    Route::post('/activate','TAController@activate');
    Route::post('/updatePass','TAController@update');
});

Route::prefix('department')->group(function() {
    Route::post('/add','DepartmentController@store');

});


    Route::prefix('admin')->group(function() {
    Route::post('/assignProfessor','AdminController@assignProfessorToCourse');
    Route::post('/login','AdminController@show');
    Route::post('/deleteStudent','AdminController@deleteStudent');
    Route::post('/deleteProfessor','AdminController@deleteProfessor');
    Route::post('/addAnnouncement','AdminController@addAnnouncement');
});

Route::prefix('course')->group(function(){
    Route::post('/showCoursesForStudent','CourseController@showCoursesForStudent');
    Route::post('/deletePost','CourseController@deletePost');
    Route::post('/delete','AdminController@deleteCourse');
    Route::post('/showCoursesOnTheSystem','CourseController@showCoursesOnTheSystem');
    Route::post('/add','CourseController@store');
    Route::post('/showCourse','CourseController@showCoursebycode');
});

Route::prefix('announcement')->group(function() {
    Route::post('/showAnnouncements','AnnouncementsController@showAnnouncements');

});










