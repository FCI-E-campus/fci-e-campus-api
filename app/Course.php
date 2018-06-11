<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Course extends Model
{
    protected $table='course';
    public $primaryKey='COURSECODE';
    public $timestamps=false;

    //add course in DB
    public function addCourse($crsCode,$dID,$CrsTittle,$desc,$SD,$ED,$passCode)
    {
        if(Course::find($crsCode)=="") {
            $course = new Course();
            $course->COURSECODE = $crsCode;
            $course->DEPTID = $dID;
            $course->COURSETITLE = $CrsTittle;
            $course->DESCRIPTION = $desc;
            $course->STARTDATE = $SD;
            $course->ENDDATE = $ED;
            $course->PASSCODE = $passCode;
            $course->save();
            $json = array("status"=>"success");
            return $json;
        }
        $json = array("status"=>"failed","error_msg"=>"this course id is exist");
        return $json;
    }

    //add task to DB
    public function addTask($id,$crsCode,$cId,$tN,$desc,$DD,$DC,$W)
    {
        if(Task::find($id)=="") {
            if(Course::find($crsCode)=="")
            {
                return "this course not exist";
            }
            if(TaskCreator::find($cId)=="")
            {
                return "this task creator not exist";
            }
            $task = new Task();
            $task->TASKID = $id;
            $task->COURSECODE = $crsCode;
            $task->CREATORID = $cId;
            $task->TASKNAME = $tN;
            $task->DESCRIPTION = $desc;
            $task->DUEDATE = $DD;
            $task->DATECREATED = $DC;
            $task->WEIGHT = $W;
            $task->save();
            $json = array("status"=>"success");
            return $json;
        }
        else
        {
            $json = array("status"=>"failed","error_msg"=>"this task id is exist");
            return $json;
        }
    }

    //delete post from DB
    public function deletePost($pID)
    {
        if(Post::find($pID)!="") {
            Post::where('POSTID', '=', [$pID])->delete();
            $json = array("status"=>"success");
            return $json;
        }
        $json = array("status"=>"failed","error_msg"=>"this post id is not exist");
        return $json;
    }

    //retrieve courses for specific student
    public function showCoursesForStudent($un)
    {
        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this student is not exist");
            return $json;
        }
        return StudentCourse::where('STUDUSERNAME',$un)->get();
    }


    public function showCourse($courseCode)
    {
        if(Course::find($courseCode)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"8");
            return $json;
        }
        return Course::where('COURSECODE',$courseCode)->get();
    }
    //retrieve courses on the system
    public function showCoursesOnTheSystem()
    {
        return Course::all();
    }






}
