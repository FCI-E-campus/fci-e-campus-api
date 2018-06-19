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

    /**
     * @param $un
     * @return array
     */
    public function showCoursesForStudent($un)
    {
        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this student is not exist");
            return $json;
        }


        $sql = 'SELECT co.COURSECODE, co.COURSETITLE 
FROM Course co join StudentCourse b 
on co.COURSECODE = b.COURSECODE
 WHERE b.STUDUSERNAME = \''. $un. '\'';

        return  DB::select($sql);

    }

    public function showCoursesForTA($un)
    {
        if(TA::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this TA is not exist");
            return $json;
        }


        $sql = 'SELECT co.COURSECODE, co.COURSETITLE 
FROM Course co join TaCourse b 
on co.COURSECODE = b.COURSECODE
 WHERE b.TAUSERNAME = \''. $un. '\'';

        return  DB::select($sql);

    }

    public function showCoursesForProf($un)
    {
        if(Professor::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this TA is not exist");
            return $json;
        }


        $sql = 'SELECT co.COURSECODE, co.COURSETITLE 
FROM Course co join TaCourse b 
on co.COURSECODE = b.COURSECODE
 WHERE b.PROFUSERNAME = \''. $un. '\'';

        return  DB::select($sql);

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

    public function joinCourse($courseCode ,$un,$passCode)
    {
        if(Course::find($courseCode)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"8");
            return $json;
        }
        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"1");
            return $json;
        }
        $co=Course::where('PASSCODE',$passCode)->get();
        if ($co == null){
            $json = array("status"=>"failed","error_msg"=>"28");
            return $json;

        }

            $course = new StudentCourse();
            $course->COURSECODE = $courseCode;
            $course->STUDUSERNAME=$un;
            $course->save();
            $json = array("status"=>"success");
            return $json;

    }






}
