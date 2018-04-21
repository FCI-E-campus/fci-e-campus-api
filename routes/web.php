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

Route::post('/studentLogin','StudentController@show');

Route::post('/teacherLogin','TeacherController@show');

Route::post('/adminLogin','AdminController@show');

Route::post('/studentSignUP','StudentController@store');

Route::post('/teacherSignUP','TeacherController@store');

Route::post('/addDepartment','DepartmentController@store');

Route::post('/addCourse','CourseController@store');

Route::post('/assignTeacher','AdminController@assignTeacherToCourse');

Route::post('/deleteCourse','AdminController@deleteCourse');

Route::post('/deleteStudent','AdminController@deleteStudent');

Route::post('/deleteProfessor','AdminController@deleteTeacher');

Route::post('/addAnnouncement','AdminController@addAnnouncement');

Route::post('/addTask','CourseController@addTask');

Route::post('/deletePost','CourseController@deletePost');


Route::post('/showCoursesForStudent','CourseController@showCoursesForStudent');

Route::post('/showCoursesOnTheSystem','CourseController@showCoursesOnTheSystem');












