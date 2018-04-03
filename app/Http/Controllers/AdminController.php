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

    public function assignTeacherToCourse(Request $request)
    {
        $assignTeaacher = new ProfessorCource();
        $assignTeaacher->COURSECODE=$request['COURSECODE'];
        $assignTeaacher->PROFUSERNAME=$request['PROFUSERNAME'];
        $assignTeaacher->save();
        return redirect('/');
    }

    public function deleteCourse(Request $request)
    {
        CourseSchedule::where('COURSECODE','=',[$request['COURSECODE']])->delete();
        OfficialMaterial::where('COURSECODE','=',[$request['COURSECODE']])->delete();
        Task::where('COURSECODE','=',[$request['COURSECODE']])->delete();
        ExtraMaterial::where('COURSECODE','=',[$request['COURSECODE']])->delete();
        //delete goups of this course
        $GID = Groups::where('COURSECODE','=',[$request['COURSECODE']])->get();
        foreach ($GID as $gid)
        {
            TAGroupCourse::where('GROUPID','=',[$gid->GROUPID])->delete();
        }
        TACourse::where('COURSECODE','=',[$request['COURSECODE']])->delete();
        StudentCourse::where('COURSECODE','=',[$request['COURSECODE']])->delete();
        ProfessorCource::where('COURSECODE','=',[$request['COURSECODE']])->delete();
        Groups::where('COURSECODE','=',[$request['COURSECODE']])->delete();
        //loop on each forum in this course then delete all posts in this course then delete this forum
        $forumID = Forum::where('COURSECODE',$request['COURSECODE'])->get();
        foreach($forumID as $forum)
        {
            Post::where('FORUMID','=',[$forum->FORUMID])->delete();
            Forum::where('FORUMID','=',[$forum->FORUMID])->delete();
        }
        //delete this course and its prerequisite
        PreRequisiteCourse::where('COURSECODE','=',[$request['COURSECODE']])->delete();
        //if this course prerequisite to anther course delete it
        PreRequisiteCourse::where('COU_COURSECODE','=',[$request['COURSECODE']])->delete();
        Course::find($request['COURSECODE'])->delete();
        return redirect('/');
    }

    public function deleteStudent(Request $request)
    {
        ExtraMaterial::where('STUDUSERNAME','=',[$request['STUDUSERNAME']])->delete();
        StudentCourse::where('STUDUSERNAME','=',[$request['STUDUSERNAME']])->delete();
        Student::where('STUDUSERNAME','=',[$request['STUDUSERNAME']])->delete();
        return redirect('/');
    }


    public function deleteTeacher(Request $request)
    {
        ProfessorCource::where('PROFUSERNAME','=',[$request['PROFUSERNAME']])->delete();
        Teacher::where('PROFUSERNAME','=',[$request['PROFUSERNAME']])->delete();
        return redirect('/');
    }

    public function addAnnouncement(Request $request)
    {
        $announcement = new Announcement();
        $announcement->ANNOUNCEMENTID=$request['ANNOUNCEMENTID'];
        $announcement->ADMINUSERNAME=$request['ADMINUSERNAME'];
        $announcement->ANNOUNCEMENTTITLE=$request['ANNOUNCEMENTTITLE'];
        $announcement->ANNOUNCEMENTBODY=$request['ANNOUNCEMENTBODY'];
        $announcement->DATEPUBLISHED='2000-01-01 00:00:00';
        $announcement->save();
        return redirect('/');

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
