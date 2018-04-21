<?php

namespace App\Http\Controllers;

use App\Course;
use App\Post;
use App\StudentCourse;
use App\Task;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //call add course from course class model
    public function store(Request $request)
    {
        $course = new Course();
        return $course->addCourse($request['COURSECODE'],$request['DEPTID'],$request['COURSETITLE'],$request['DESCRIPTION'],
        $request['STARTDATE'],$request['ENDDATE'],$request['PASSCODE']);
    }
    //call add task from course class model
    public function addTask(Request $request)
    {
        $course = new Course();
        return $course->addTask($request['TASKID'],$request['COURSECODE'],$request['CREATORID'],$request['TASKNAME'],
            $request['DESCRIPTION'],$request['DUEDATE'],$request['DATECREATED'],$request['WEIGHT']);

    }
    //call delete post from course class model
    public function deletePost(Request $request)
    {
        $course = new Course();
        return $course->deletePost($request['POSTID']);
    }
    //call show courses for student from course class model
    public function showCoursesForStudent(Request $request)
    {
        $course = new Course();
        return $course->showCoursesForStudent($request['STUDUSERNAME']);
    }


    public function showCoursesOnTheSystem(Request $request)
    {
        $course = new Course();
        return $course->showCoursesOnTheSystem();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
