<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\PrettyPrinter\Standard;
use Illuminate\Database\Eloquent\Collection;
use DB;
use Mail;

class Professor extends Model
{
    protected $table='professor';
    public $primaryKey = 'PROFUSERNAME';
    public $timestamps=false;
    //this function add professor in DB
    public function addProfessor($un,$dID,$pass,$fn,$ln,$em,$pn,$DB)
    {
        if($un=="")
        {
            $json = array("status"=>"failed","error_code"=>18);
            return $json;
        }
        if($dID=="")
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
        if(Professor::find($un)!="") {
            $json = array("status"=>"failed","error_code"=>4);
            return $json;
        }
        /* $email=$em;
         $check = substr($email, strpos($email, '@') , 14);
         if(strcmp($check,"@fci-cu.edu.eg")!=0)
         {
             $json = array("status"=>"failed","error_code"=>5);
             return $json;
         }
         */
        if(Department::find($dID)=="")
        {
            $json = array("status"=>"failed","error_code"=>27);
            return $json;
        }
        $professor = new Professor();
        $professor->PROFUSERNAME = $un;
        $professor->DEPTID=$dID;
        $professor->PROFPASSWORD = $pass;
        $professor->FIRSTNAME = $fn;
        $professor->LASTNAME = $ln;
        $professor->EMAIL = $em;
        $professor->PHONENUMBER = $pn;
        $professor->DATEOFBIRTH = $DB;
        $code="";
        for ($i=0 ; $i < 7 ; $i++)
        {
            $code = $code.mt_rand(0,9);
        }
        $professor->ActivationCode=$code;
        $professor->isActiveted = 0;
        $this->sendMail($code,$em);
        $professor->save();
        $json = array("status"=>"success");
        return $json;
    }
    //send the activation code to verify its account
    public function sendMail($ActivationCode , $to){
        $date = ["code"=>$ActivationCode,"to"=>$to];
        Mail::send("Email",$date,function ($message)use($date){
            $message->from("campus5553@gmail.com","E-campus");
            $message->to($date['to']);
            $message->subject("E-compus activation code");
        });
    }

    //activate the user if he/she send its activation code correct
    public function activate($un,$code){
        if(Professor::find($un)=="")
        {
            $json = array("status"=>"failed","error_code"=>1);
            return $json;
        }
        $temp = 0;
        $temp= DB::table('professor')->where('PROFUSERNAME',$un)->where('ActivationCode' , $code)->count();
        if($temp==0)
        {
            $json = array("status"=>"failed","error_code"=>17);
            return $json;
        }
        $professor = new Professor();
        $professor = Professor::find($un);
        $professor->isActiveted=1;
        $professor->save();
        $json = array("status"=>"success","token"=>csrf_token());
        return $json;

    }
    //select professor from DB
    public  function showProfessor($un,$pass)
    {
        if(Professor::find($un)=="")
        {
            $json = array("status"=>"failed","error_code"=>1);
            return $json;
        }
        $temp = 0;
        $temp= DB::table('professor')->where('PROFUSERNAME',$un)->where('PROFPASSWORD' , $pass)->count();
        if($temp==0)
        {
            $json = array("status"=>"failed","error_code"=>2);
            return $json;
        }

        $professor = new Professor();
        $professor =Professor::find($un);
        if($professor->isActiveted)
        {
            $json = array("status"=>"success","token"=>csrf_token());
            return $json;
        }
        else
        {
            $json = array("status"=>"failed","error_code"=>3);
            return $json;
        }
    }
    //update password to specific user
    public function updateUser($un,$pass){
        if(Professor::find($un)=="")
        {
            $json = array("status"=>"failed","error_code"=>1);
            return $json;
        }
        $prof =Professor::find($un);
        if($pass=="")
        {
            $json = array("status"=>"failed","error_code"=>21);
            return $json;
        }
        $prof->PROFPASSWORD = $pass;
        $prof->save();
        $json = array("status"=>"success");
        return $json;
    }

    //retrieve all tasks for specific user
    public function getAllTasks($un)
    {
        if(Professor::find($un)=="")
        {
            $json = array("status"=>"failed","error_code"=>1);
            return $json;
        }
        $crsCodes = ProfessorCource::select('COURSECODE')->where('PROFUSERNAME',$un)->get();
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
    //show the schedule for the professor
    public function  showprofSchedule($un){
        if(Professor::find($un)=="")
        {
            $json = array("status"=>"failed","error_code"=>"1");
            return $json;
        }
        $pr=ProfessorCource::where("PROFUSERNAME",$un)->count();
        if ($pr==0){
            $json = array("status"=>"failed","error_code"=>"31");
            return $json;
        }
        $pr=ProfessorCource::where("PROFUSERNAME",$un)->get();
        $allSlotsForCourses = array();
        foreach($pr as $item)
        {
            $labs=Slots::where("COURSECODE" , $item['COURSECODE'])->where("SLOTTYPE","!=","1")->get();
            $lec=Slots::where("COURSECODE" , $item['COURSECODE'])->where("SLOTTYPE","1")->get();
            $subJason =array("COURSECODE"=>$item['COURSECODE'],"labs"=>$labs,
                "lecture"=>$lec);
            array_push($allSlotsForCourses,$subJason);
        }
        $subJason =array("status"=>"success","result"=>$allSlotsForCourses);
        return  $subJason;
    }
    //show to the doctor the lectures which he/she has today abd tomorrow
    public function overview($un)
    {
        if(Professor::find($un)=="")
        {
            $json = array("status"=>"failed","error_code"=>1);
            return $json;
        }
        $todaySlots=new Collection();
        $tomorrowSlots=new Collection();
        $today=strtolower(date('l'));
        $tomorrow=strtolower(date('l',strtotime("+1 days")));
        $professorCourses = ProfessorCource::select('COURSECODE')->where('PROFUSERNAME',$un)->get();
        $slots = Slots::all();
        foreach($slots as $slot)
        {
            $inCourse=0;
            foreach($professorCourses as $professorCourse)
            {
                if($professorCourse->COURSECODE==$slot->COURSECODE)
                {
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
                }
            }
        }
        $result=array("today"=>$todaySlots,"tomorrow"=>$tomorrowSlots);
        $temp=array("status"=>"success","result"=>$result);
        return $temp;
    }

    public function deleteRelatives_($id)
    {
        $rows = DB::table('professor')->where('DEPTID', $id)->get();

        foreach ($rows as $i)
            $this->deleteRelatives($i->PROFUSERNAME);

        DB::table('professor')->where('DEPTID', $id)->delete();
    }

    public function deleteRelatives($code)
    {
        DB::table('professorcourse')->where('PROFUSERNAME', $code)->delete();
    }

}
