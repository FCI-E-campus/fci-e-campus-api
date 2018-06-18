<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Post;
use DB;
class DepartmentController extends Controller
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
    //this function call add epartment from Department model class
    public function store(Request $request)
    {
        $department = new Department();
        return $department->addDepartment($request['DEPTID'],$request['DEPARTMENTNAME'],$request['DESCRIPTION']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        /*
        $department = new Department();
        $department->DEPTID=6;
        $department->DEPARTMENTNAME="hardware";
        $department->DESCRIPTION="hardware Engineering";
        $department->save();
        return 1;
        */
/*
        $course = new Course();
        $course->COURSECODE="se";
        $course->DEPTID=5;
        $course->COURSETITLE="se";
        $course->DESCRIPTION="to be soft ware enineer";
        $course->STARTDATE="2018-06-19 00:00:00";
        $course->ENDDATE="2018-06-21 00:00:00";
        $course->PASSCODE="123";
        $course->save();
        */
/*
        $forum = new Forum();
        $forum->FORUMID=2;
        $forum->COURSECODE="se";
        $forum->save();
*/
        /*
        $course = new Post();
        $course->POSTID=4;
        $course->FORUMID=2;
        $course->AUTHORID=2;
        $course->POSTTITLE="test";
        $course->POSTBODY="test too";
        $course->ANSWERED=true;
        $course->DATEPUBLISHED="2018-06-27 00:00:00";
        $course->save();
        return "success";
        */
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
