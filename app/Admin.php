<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Admin extends Model
{
    protected $table='admin';
    public $primaryKey='ADMINUSERNAME';
    public $timestamps=false;

    //assign teacher to course in DB
    public function assignTeacherToCourse($crsCode,$un)
    {
        if(Course::find($crsCode)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this course not exist");
            return $json;
        }
        if(Teacher::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this teacher not exist");
            return $json;
        }
        $temp = 0;
        $temp= DB::table('professorcourse')->where('COURSECODE',$crsCode)->where('PROFUSERNAME' , $un)->count();
        if($temp>0)
        {
            $json = array("status"=>"failed","error_msg"=>"this teacher assigned before for this course");
            return $json;
        }
        $assignTeaacher = new ProfessorCource();
        $assignTeaacher->COURSECODE=$crsCode;
        $assignTeaacher->PROFUSERNAME=$un;
        $assignTeaacher->save();
        $json = array("status"=>"success");
        return $json;
    }

    //delete course from DB
    public function deleteCourse($crsCode)
    {
        if(Course::find($crsCode)!="") {
            CourseSchedule::where('COURSECODE', '=', [$crsCode])->delete();
            OfficialMaterial::where('COURSECODE', '=', [$crsCode])->delete();
            Task::where('COURSECODE', '=', [$crsCode])->delete();
            ExtraMaterial::where('COURSECODE', '=', [$crsCode])->delete();
            //delete goups of this course
            $GID = Groups::where('COURSECODE', '=', [$crsCode])->get();
            foreach ($GID as $gid) {
                TAGroupCourse::where('GROUPID', '=', [$gid->GROUPID])->delete();
            }
            TACourse::where('COURSECODE', '=', [$crsCode])->delete();
            StudentCourse::where('COURSECODE', '=', [$crsCode])->delete();
            ProfessorCource::where('COURSECODE', '=', [$crsCode])->delete();
            Groups::where('COURSECODE', '=', [$crsCode])->delete();
            //loop on each forum in this course then delete all posts in this course then delete this forum
            $forumID = Forum::where('COURSECODE', $crsCode)->get();
            foreach ($forumID as $forum) {
                Post::where('FORUMID', '=', [$forum->FORUMID])->delete();
                Forum::where('FORUMID', '=', [$forum->FORUMID])->delete();
            }
            //delete this course and its prerequisite
            PreRequisiteCourse::where('COURSECODE', '=', [$crsCode])->delete();
            //if this course prerequisite to anther course delete it
            PreRequisiteCourse::where('COU_COURSECODE', '=', [$crsCode])->delete();
            Course::find($crsCode)->delete();
            $json = array("status"=>"success");
            return $json;
        }
        else
        {
            $json = array("status"=>"failed","error_msg"=>"this course is not exist");
            return $json;
        }
    }

    //delete student from DB
    public function deleteStudent($un)
    {
        if(Student::find($un)!="") {
            ExtraMaterial::where('STUDUSERNAME','=',[$un])->delete();
            StudentCourse::where('STUDUSERNAME','=',[$un])->delete();
            Student::where('STUDUSERNAME','=',[$un])->delete();
            $json = array("status"=>"success");
            return $json;
        }
        $json = array("status"=>"failed","error_msg"=>"this student is not exist");
        return $json;

    }

    //delete teacher from DB
    public function deleteTeacher($un)
    {
        if(Teacher::find($un)!="") {
            ProfessorCource::where('PROFUSERNAME', '=', [$un])->delete();
            Teacher::where('PROFUSERNAME', '=', [$un])->delete();
            $json = array("status"=>"success");
            return $json;
        }
        $json = array("status"=>"failed","error_msg"=>"this professor is not exist");
        return $json;
    }

    //add announcement to DB
    public function addAnnouncement($id,$AUN,$Tit,$body,$D)
    {
        if(Announcement::find($id)=="") {
            $announcement = new Announcement();
            $announcement->ANNOUNCEMENTID = $id;
            $announcement->ADMINUSERNAME = $AUN;
            $announcement->ANNOUNCEMENTTITLE = $Tit;
            $announcement->ANNOUNCEMENTBODY = $body;
            $announcement->DATEPUBLISHED = '2000-01-01 00:00:00';
            $announcement->save();
            $json = array("status"=>"success");
            return $json;
        }
        else
        {
            $json = array("status"=>"failed","error_msg"=>"this announcement id is exist");
            return $json;
        }
    }

    public function showAdmin($un,$pass)
    {
        if(Admin::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this admin not exist");
            return $json;
        }

        $temp = 0;
        $temp= DB::table('admin')->where('ADMINUSERNAME',$un)->where('ADMINPASSWORD' , $pass)->count();
        if($temp==0)
        {
            $json = array("status"=>"failed","error_msg"=>"incorrect password");
            return $json;
        }
        $json = array("status"=>"success","token"=>csrf_token());
        return $json;
    }










}
