<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\PrettyPrinter\Standard;
use Illuminate\Database\Eloquent\Collection;
use DB;
use Mail;
use Svg\Tag\Group;

class Student extends Model
{
    protected $table='student';
    public $primaryKey='STUDUSERNAME';
    public $timestamps=false;
    //this function add student in DB
    public function addStudent($un,$dID,$ddID,$pass,$fn,$ln,$em,$pn,$DB,$FID)
    {
        if($un=="")
        {
            $json = array("status"=>"failed","error_code"=>18);
            return $json;
        }
        if($dID=="" || $ddID=="")
        {
            $json = array("status"=>"failed","error_code"=>19);
            return $json;
        }
        if($pass=="")
        {
            $json = array("status"=>"failed","error_code"=>21);
            return $json;
        }
        if($fn=="" || $ln=="")
        {
            $json = array("status"=>"failed","error_code"=>22);
            return $json;
        }
        if($em=="")
        {
            $json = array("status"=>"failed","error_code"=>23);
            return $json;
        }
        if($pn=="")
        {
            $json = array("status"=>"failed","error_code"=>24);
            return $json;
        }
        if($DB=="")
        {
            $json = array("status"=>"failed","error_code"=>25);
            return $json;
        }
        if($FID=="")
        {
            $json = array("status"=>"failed","error_code"=>26);
            return $json;
        }
        if(Student::find($un)!="") 
        {
            $json = array("status"=>"failed","error_code"=>4);
            return $json;
        }
        if($dID==$ddID)
        {
            $json = array("status"=>"failed","error_code"=>20);
            return $json;
        }
        if(Department::find($dID)=="" || Department::find($ddID)=="")
        {
            $json = array("status"=>"failed","error_code"=>27);
            return $json;
        }
        $student = new Student();
        $student->STUDUSERNAME = $un;
        $student->DEPTID = $dID;
        $student->DEP_DEPTID = $ddID;
        $student->STUDPASSWORD = $pass;
        $student->FIRSTNAME = $fn;
        $student->LASTNAME = $ln;
        $student->EMAIL = $em;
        $student->PHONENUMBER = $pn;
        $student->DATEOFBIRTH = $DB;
        $student->FACULTYID = $FID;
        $student->ISMODERATOR = 0;
        $student->save();
        $json = array("status"=>"success");
        return $json;
    }

    //this function select student from DB
    public function showUser($un,$pass){
        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_code"=>1);
            return $json;
        }

        $temp = 0;
        $temp= DB::table('student')->where('STUDUSERNAME',$un)->where('STUDPASSWORD' , $pass)->count();
        if($temp==0)
        {
            $json = array("status"=>"failed","error_code"=>2);
            return $json;
        }
        $student = new Student();
        $student =Student::find($un);
            $json = array("status"=>"success","token"=>csrf_token());
            return $json;

    }

    //update the password for specific user
    public function updateUser($un,$pass){
        $student =Student::find($un);
        if($pass=="")
        {
            $json = array("status"=>"failed","error_code"=>21);
            return $json;
        }
        $student->STUDPASSWORD = $pass;
        $student->save();
        $json = array("status"=>"success");
        return $json;

    }

    //retrieve the schedule of specific student
    public function  showStudentSchedule($un){

        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_code"=>"1");
            return $json;
        }
        $st=StudentCourse::where("STUDUSERNAME",$un)->count();
        if ($st==0){
            $json = array("status"=>"failed","error_code"=>"30");
            return $json;
        }
        $st=StudentCourse::where("STUDUSERNAME",$un)->get();
        $allSlotsForCourses = array();
        foreach($st as $item)
        {
            //$group=Groups::where("GROUPID",$item["GROUPID"])->get();
            $labs=Slots::where("COURSECODE" , $item['COURSECODE'])->where("GROUPID",$item["GROUPID"])->get();

            $lec=Slots::where("COURSECODE" , $item['COURSECODE'])->where("SLOTTYPE","1")->get();
            $subJason =array("COURSECODE"=>$item['COURSECODE'],"labs"=>$labs,
                "lecture"=>$lec);
            array_push($allSlotsForCourses,$subJason);

        }
        $subJason =array("status"=>"success","result"=>$allSlotsForCourses);
        return  $subJason;
    }

    //retrieve all tasf for specific student
    public function getAllTasks($un)
    {
        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_code"=>"1");
            return $json;
        }
        $crsCodes = StudentCourse::select('COURSECODE')->where('STUDUSERNAME',$un)->get();
        $tasks = Task::all();
        $result = new Collection();
        foreach($crsCodes as $crsCode)
        {
            $subJason2=new Collection();
            date_default_timezone_set('Africa/Cairo');
            $ldate = date('Y-m-d H:i:s');
            foreach($tasks as $task)
            {
                if($crsCode->COURSECODE == $task->COURSECODE && $task->DUEDATE >= $ldate)
                {
                    $creator = TaskCreator::find($task->CREATORID);
                    $subJason = array("task_name"=>$task->TASKNAME,"description"=>$task->DESCRIPTION,
                    "date_created"=>$task->DATECREATED,"due_date"=>$task->DUEDATE,"weight"=>$task->WEIGHT,
                    "creator_username"=>$creator->CREATORUSERNAME,"creator_type"=>$creator->CREATORTYPE
                );
                    $subJason2->push($subJason);
                }
            }
            $tempJason=array($crsCode->COURSECODE=>$subJason2);
            $result->push($tempJason);
        }
        $subJason =array("status"=>"success","result"=>$result);
        return  $subJason;
    }

    //retieve all lectures, labs , and sections that this user has today and tomorrow
    public function overview($un)
    {
        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_code"=>"1");
            return $json;
        }
        $todaySlots=new Collection();
        $tomorrowSlots=new Collection();
        $today=strtolower(date('l'));
        $tomorrow=strtolower(date('l',strtotime("+1 days")));
        $studentCourses = StudentCourse::select('COURSECODE','GROUPID')->where('STUDUSERNAME',$un)->get();
        $slots = Slots::all();
        foreach($slots as $slot)
        {
            $inCourse=0;
            $groupID=array();
            foreach($studentCourses as $studentCourse)
            {
                if($studentCourse->COURSECODE==$slot->COURSECODE)
                {
                    $groupID=Groups::find($studentCourse->GROUPID)->GROUPID;
                    $inCourse=1;
                    break;
                }
            }
            if($inCourse)
            {
                if(strtolower($slot->DAY)==$today)
                {
                    if(strtolower($slot->SLOTTYPE)=="lec")
                    {
                            $courseName = Course::find($slot->COURSECODE)->COURSETITLE;
                            $courseName=$courseName." Lecture";
                            $subJason = array("name"=>$courseName,"duetime"=>$slot->STARTTIME,
                            "place"=>$slot->PLACE);
                            $todaySlots->push($subJason);                
                    }
                    else if(strtolower($slot->SLOTTYPE)=="sec")
                    {
                        if($groupID==$slot->GROUPID)
                        {
                            $courseName = Course::find($slot->COURSECODE)->COURSETITLE;
                            $courseName=$courseName." Section";
                            $subJason = array("name"=>$courseName,"duetime"=>$slot->STARTTIME,
                            "place"=>$slot->PLACE);
                            $todaySlots->push($subJason);
                        } 
                    }
                    elseif(strtolower($slot->SLOTTYPE)=="lab")
                    {
                        if($groupID==$slot->GROUPID)
                        {
                            $courseName = Course::find($slot->COURSECODE)->COURSETITLE;
                            $courseName=$courseName." Lab";
                            $subJason = array("name"=>$courseName,"duetime"=>$slot->STARTTIME,
                            "place"=>$slot->PLACE);
                            $todaySlots->push($subJason);
                        }
                    }
                }
                elseif(strtolower($slot->DAY)==$tomorrow)
                {
                    if(strtolower($slot->SLOTTYPE)=="lec")
                    {
                            $courseName = Course::find($slot->COURSECODE)->COURSETITLE;
                            $courseName=$courseName." Lecture";
                            $subJason = array("name"=>$courseName,"duetime"=>$slot->STARTTIME,
                            "place"=>$slot->PLACE);
                            $tomorrowSlots->push($subJason);                
                    }
                    else if(strtolower($slot->SLOTTYPE)=="sec")
                    {
                        if($groupID==$slot->GROUPID)
                        {
                            $courseName = Course::find($slot->COURSECODE)->COURSETITLE;
                            $courseName=$courseName." Section";
                            $subJason = array("name"=>$courseName,"duetime"=>$slot->STARTTIME,
                            "place"=>$slot->PLACE);
                            $tomorrowSlots->push($subJason);
                        } 
                    }
                    elseif(strtolower($slot->SLOTTYPE)=="lab")
                    {
                        if($groupID==$slot->GROUPID)
                        {
                            $courseName = Course::find($slot->COURSECODE)->COURSETITLE;
                            $courseName=$courseName." Lab";
                            $subJason = array("name"=>$courseName,"duetime"=>$slot->STARTTIME,
                            "place"=>$slot->PLACE);
                            $tomorrowSlots->push($subJason);
                        }
                    }
                }
            }
        }
        $result=array("today"=>$todaySlots,"tomorrow"=>$tomorrowSlots);
        $temp=array("status"=>"success","result"=>$result);
        return $temp;
    }



}