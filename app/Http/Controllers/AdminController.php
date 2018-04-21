<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Course;
use App\CourseSchedule;
use App\ExtraMaterial;
use App\Forum;
use App\Groups;
use App\OfficialMaterial;
use App\Post;
use App\PreRequisiteCourse;
use App\Student;
use App\StudentCourse;
use App\TACourse;
use App\TAGroupCourse;
use App\Task;
use App\Teacher;
use Illuminate\Http\Request;
use App\Admin;
use App\ProfessorCource;
use DB;
class AdminController extends Controller
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
    public function store(Request $request)
    {
        //
    }
    //call assign teacher to course from admin class model
    public function assignTeacherToCourse(Request $request)
    {

        $admin = new Admin();
        return $admin->assignTeacherToCourse($request['COURSECODE'],$request['PROFUSERNAME']);
    }
    //call delete course from admin class model
    public function deleteCourse(Request $request)
    {
        $admin = new Admin();
        return $admin->deleteCourse($request['COURSECODE']);
    }
    //call delete student from admin class model
    public function deleteStudent(Request $request)
    {
        $admin = new Admin();
        return $admin->deleteStudent($request['STUDUSERNAME']);
    }
    //call delete teacher from admin cllass model
    public function deleteTeacher(Request $request)
    {
        $admin = new Admin();
        return $admin->deleteTeacher($request['PROFUSERNAME']);
    }
    //call add anniuncement from admin class model
    public function addAnnouncement(Request $request)
    {
        $admin = new Admin();
        return $admin->addAnnouncement($request['ANNOUNCEMENTID'],$request['ADMINUSERNAME'],$request['ANNOUNCEMENTTITLE'],
            $request['ANNOUNCEMENTBODY'],$request['DATEPUBLISHED']);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $admin = new Admin();
        return $admin->showAdmin($request['ADMINUSERNAME'],$request['ADMINPASSWORD']);
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
