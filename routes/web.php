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
    Route::post('/showStudentSchedule','StudentController@showStudentSchedule');
    Route::post('/getAllTasks','StudentController@getAllTasks');
    Route::post('/overview','StudentController@overview');
});

Route::prefix('professor')->group(function() {
    Route::post('/login','ProfessorController@show');
    Route::post('/signup','ProfessorController@store');
    Route::post('/addTask','CourseController@addTask');
    Route::post('/activate','ProfessorController@activate');
    Route::post('/updatePass','ProfessorController@update');
    Route::post('/showProfSchedule','ProfessorController@showProfSchedule');
    Route::post('/getAllTasks','ProfessorController@getAllTasks');
    Route::post('/overview','ProfessorController@overview');
});

Route::prefix('ta')->group(function() {
    Route::post('/login','TAController@show');
    Route::post('/signup','TAController@store');
    Route::post('/addTask','CourseController@addTask');
    Route::post('/activate','TAController@activate');
    Route::post('/updatePass','TAController@update');
    Route::post('/getAllTasks','TAController@getAllTasks');
    Route::post('/showTASchedule','TAController@showTASchedule');
    Route::post('/overview','TAController@overview');
});

Route::prefix('department')->group(function() {
    Route::post('/add','DepartmentController@store');
    Route::get('/add/new','DepartmentController@show');
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
    Route::post('/showCoursesForTA','CourseController@showCoursesForTA');
    Route::post('/showCoursesForProf','CourseController@showCoursesForProf');
    Route::post('/showCourseSchedule','CourseController@showscheduleforcourse');
    Route::post('/deletePost','CourseController@deletePost');
    Route::post('/delete','AdminController@deleteCourse');
    Route::post('/showCoursesOnTheSystem','CourseController@showCoursesOnTheSystem');
    Route::post('/add','CourseController@store');
    Route::post('/showCourse','CourseController@showCoursebycode');
    Route::post('/getAllForumPostsForSpecificCourse','CourseController@getAllForumPostsForSpecificCourse');
    Route::post('/showAllTasksForSpecificCourse','CourseController@showAllTasksForSpecificCourse');
    Route::post('/joinCourse','CourseController@joinCourse');
});

Route::prefix('announcement')->group(function() {
    Route::post('/showAnnouncements','AnnouncementsController@showAnnouncements');

});

Route::prefix('post')->group(function() {
    Route::post('/showSpecificPostComments','PostController@showSpecificPostComments');
    Route::post('/addComment','PostController@addComment');
    Route::post('/answered','PostController@answered');
    Route::post('/notAnswered','PostController@notAnswered');
});

Route::prefix('forum')->group(function() {
    Route::post('/addPost','ForumController@addPost');
});

Route::prefix('material')->group(function() {
    Route::post('/uploadOfficialMaterials','materialController@addOfficialMaterial');
    Route::post('/showOfficialMaterials','materialController@showOfficialMaterials');
    Route::post('/uploadExtraMaterial','materialController@addExtraMaterial');
    Route::post('/showExtraMaterials','materialController@showExtraMaterials');
});







