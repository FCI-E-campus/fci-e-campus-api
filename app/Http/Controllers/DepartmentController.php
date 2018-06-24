<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Author;
use App\Course;
use App\Student;
use App\Forum;
use App\Post;
use App\TA;
use App\Professor;
use App\Task;
use App\Comment;
use App\Admin;
use App\TaskCreator;
use App\Groups;
use App\StudentCourse;
use App\PreRequisiteCourse;
use App\ProfessorCource;
use App\TACourse;
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
        $admin = new Admin();
        $admin->ADMINUSERNAME="abdullah";
        $admin->ADMINPASSWORD="123";
        $admin->FIRSTNAME="abdullah";
        $admin->LASTNAME="abdelazim";
        $admin->save();
        
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

        $student = new Student();
        $student->STUDUSERNAME="abod";
        $student->DEPTID=1;
        $student->DEP_DEPTID=2;
        $student->STUDPASSWORD="123";
        $student->FIRSTNAME="abdelrahman";
        $student->LASTNAME="mahmoud";
        $student->EMAIL="abodMahmoud@gmail.com";
        $student->PHONENUMBER="01156784567";
        $student->DATEOFBIRTH="1996-06-12";
        $student->FACULTYID="20140191";
        $student->ISMODERATOR=0;
        $student->save();

        $student = new Student();
        $student->STUDUSERNAME="ahmed";
        $student->DEPTID=3;
        $student->DEP_DEPTID=4;
        $student->STUDPASSWORD="123";
        $student->FIRSTNAME="ahmed";
        $student->LASTNAME="mohsen";
        $student->EMAIL="ahmedMohsen@gmail.com";
        $student->PHONENUMBER="01151234567";
        $student->DATEOFBIRTH="1996-07-12";
        $student->FACULTYID="20140192";
        $student->ISMODERATOR=1;
        $student->save();

        $course = new Course();
        $course->COURSECODE="CS123";
        $course->DEPTID=3;
        $course->COURSETITLE="algorithms";
        $course->DESCRIPTION="how to build more algorithms";
        $course->STARTDATE="2018-09-21 00:00:00";
        $course->ENDDATE="2019-01-03 00:00:00";
        $course->PASSCODE="ag123";
        $course->save();
        $course = new Course();
        $course->COURSECODE="IT123";
        $course->DEPTID=5;
        $course->COURSETITLE="networks";
        $course->DESCRIPTION="how to build more networks";
        $course->STARTDATE="2018-09-21 00:00:00";
        $course->ENDDATE="2019-01-03 00:00:00";
        $course->PASSCODE="ad123";
        $course->save();
        $course = new Course();
        $course->COURSECODE="IS123";
        $course->DEPTID=4;
        $course->COURSETITLE="analysis";
        $course->DESCRIPTION="how to build more analysis to data";
        $course->STARTDATE="2018-09-21 00:00:00";
        $course->ENDDATE="2019-01-03 00:00:00";
        $course->PASSCODE="as123";
        $course->save();
        $course = new Course();
        $course->COURSECODE="DS123";
        $course->DEPTID=6;
        $course->COURSETITLE="excel";
        $course->DESCRIPTION="how to build more excel operations";
        $course->STARTDATE="2018-09-21 00:00:00";
        $course->ENDDATE="2019-01-03 00:00:00";
        $course->PASSCODE="aw123";
        $course->save();
        $course = new Course();
        $course->COURSECODE="G123";
        $course->DEPTID=1;
        $course->COURSETITLE="english";
        $course->DESCRIPTION="how to speak english";
        $course->STARTDATE="2018-09-21 00:00:00";
        $course->ENDDATE="2019-01-03 00:00:00";
        $course->PASSCODE="az123";
        $course->save();
        $course = new Course();
        $course->COURSECODE="G124";
        $course->DEPTID=2;
        $course->COURSETITLE="math";
        $course->DESCRIPTION="how to make math operations";
        $course->STARTDATE="2018-09-21 00:00:00";
        $course->ENDDATE="2019-01-03 00:00:00";
        $course->PASSCODE="ap123";
        $course->save();
        
        $author = new Author();
        $author->AUTHORUSERNAME="abod";
        $author->AUTHORTYPE="prof";
        $author->save();
        $author = new Author();
        $author->AUTHORUSERNAME="ahmed";
        $author->AUTHORTYPE="stud";
        $author->save();
        $author = new Author();
        $author->AUTHORUSERNAME="abdullah";
        $author->AUTHORTYPE="ta";
        $author->save();

        $forum = new Forum();
        $forum->COURSECODE="CS123";
        $forum->save();
        $forum = new Forum();
        $forum->COURSECODE="DS123";
        $forum->save();
        $forum = new Forum();
        $forum->COURSECODE="IS123";
        $forum->save();
        $forum = new Forum();
        $forum->COURSECODE="IT123";
        $forum->save();

        $post = new Post();
        $post->FORUMID=1;
        $post->AUTHORID=1;
        $post->POSTTITLE="connection to DB";
        $post->POSTBODY="how to do DB connecction";
        $post->ANSWERED=0;
        $post->DATEPUBLISHED="2018-06-21 00:00:00";
        $post->save();
        
        $taskCreator = new TaskCreator();
        $taskCreator->CREATORUSERNAME="abod";
        $taskCreator->CREATORTYPE="stud";
        $taskCreator->save();
        $taskCreator = new TaskCreator();
        $taskCreator->CREATORUSERNAME="ahmed";
        $taskCreator->CREATORTYPE="stud";
        $taskCreator->save();

        $task = new Task();
        $task->COURSECODE="CS123";
        $task->CREATORID=1;
        $task->TASKNAME="assinment1";
        $task->DESCRIPTION="calculator app";
        $task->DUEDATE="2018-06-30 00:00:00";
        $task->DATECREATED="2018-06-24 00:00:00";
        $task->WEIGHT=5;
        $task->save();
        
        $task = new Task();
        $task->COURSECODE="DS123";
        $task->CREATORID=1;
        $task->TASKNAME="assinment1";
        $task->DESCRIPTION="excel app";
        $task->DUEDATE="2018-06-30 00:00:00";
        $task->DATECREATED="2018-06-24 00:00:00";
        $task->WEIGHT=5;
        $task->save();

        $task = new Task();
        $task->COURSECODE="G123";
        $task->CREATORID=1;
        $task->TASKNAME="assinment1";
        $task->DESCRIPTION="mathmatics questions";
        $task->DUEDATE="2018-06-30 00:00:00";
        $task->DATECREATED="2018-06-24 00:00:00";
        $task->WEIGHT=5;
        $task->save();

        $groups = new Groups();
        $groups->COURSECODE="CS123";
        $groups->GROUPNAME="G1";
        $groups->save();
*/
        /*
        $taCourse = new ProfessorCource();
        $taCourse->PROFUSERNAME="abod";
        $taCourse->COURSECODE="CS123";
        $taCourse->save();
        
        $taCourse = new ProfessorCource();
        $taCourse->PROFUSERNAME="abod";
        $taCourse->COURSECODE="G123";
        $taCourse->save();
        */
/*
        $taCourse = new TACourse();
        $taCourse->TAUSERNAME="abod";
        $taCourse->COURSECODE="CS123";
        $taCourse->GROUPID=1;
        $taCourse->save();
        $taCourse = new TACourse();
        $taCourse->TAUSERNAME="abod";
        $taCourse->COURSECODE="G123";
        $taCourse->GROUPID=1;
        $taCourse->save();
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

/*
        $ta = new TA();
        $ta->TAUSERNAME="zizo";
        $ta->DEPTID=3;
        $ta->TAPASSWORD="123";
        $ta->FIRSTNAME="abdelaziz";
        $ta->LASTNAME="mahmoud";
        $ta->EMAIL="zizoMahmoud";
        $ta->PHONENUMBER="01151234567";
        $ta->DATEOFBIRTH="1990-07-12";
        $ta->ActivationCode="";
        $ta->isActiveted=0;
        $ta->save();
        */




        
        
        
        return Department::all();
        

        
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
