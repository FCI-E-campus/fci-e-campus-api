<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Author;
use App\Task;
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
        
        $department = new Department();
        $department->DEPARTMENTNAME="General";
        $department->DESCRIPTION="general department";
        $department->save();
        $department = new Department();
        $department->DEPARTMENTNAME="General";
        $department->DESCRIPTION="general department";
        $department->save();
        $department = new Department();
        $department->DEPARTMENTNAME="Computer Science";
        $department->DESCRIPTION="CS department";
        $department->save();
        $department = new Department();
        $department->DEPARTMENTNAME="Information System";
        $department->DESCRIPTION="IS department";
        $department->save();
        $department = new Department();
        $department->DEPARTMENTNAME="Information Technology";
        $department->DESCRIPTION="IT department";
        $department->save();
        $department = new Department();
        $department->DEPARTMENTNAME="Decision Support";
        $department->DESCRIPTION="DS department";
        $department->save();
        
        return Department::all();
        
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
        /*
        $comment = new Comment();
        $comment->COMMENTID=6;
        $comment->AUTHORID=2;
        $comment->POSTID=3;
        $comment->COMMENTTEXT="test";
        $comment->COMMENTTIME="2018-06-20 00:00:00";
        $comment->save();
        return 1;
        */
        /*
        $author = new Author();
        $author->AUTHORUSERNAME="abod";
        $author->AUTHORTYPE="n";
        $author->save();
        return 1;
        */
        
/*
        $task = new Task();
        $task->COURSECODE="is123";
        $task->CREATORID=2;
        $task->TASKNAME="assignment 3";
        $task->DESCRIPTION="a3";
        $task->DUEDATE="2018-06-13 00:00:00";
        $task->DATECREATED="2018-06-13 00:00:00";
        $task->WEIGHT=5;
        $task->save();
        return 1;
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
