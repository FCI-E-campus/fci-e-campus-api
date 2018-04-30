<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\PrettyPrinter\Standard;
use DB;
use Mail;
class Student extends Model
{
    protected $table='student';
    public $primaryKey='STUDUSERNAME';
    public $timestamps=false;
    //this function add student in DB
    public function addStudent($un,$dID,$ddID,$pass,$fn,$ln,$em,$pn,$DB,$FID)
    {
        if(Student::find($un)=="") {
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
          $code="";
          for ($i=0 ; $i < 7 ; $i++)
          {
              $code = $code.mt_rand(0,9);
          }
          $student->ActivationCode=$code;
          $student->isActiveted = 0;
          $this->sendMail($code,$em);
          $student->save();
          $json = array("status"=>"success");
          return $json;
        }
        $json = array("status"=>"failed","error_msg"=>"this user name is exist, select anther user name");
        return $json;
    }

    public function sendMail($ActivationCode , $to){
        $date = ["code"=>$ActivationCode,"to"=>$to];
        Mail::send("Email",$date,function ($message)use($date){
            $message->from("campus5553@gmail.com","E-campus");
            $message->to($date['to']);
            $message->subject("E-compus activation code");
        });
    }

    public function activate($un,$code){


        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this student not exist");
            return $json;
        }
        $temp = 0;
        $temp= DB::table('student')->where('STUDUSERNAME',$un)->where('ActivationCode' , $code)->count();
        if($temp==0)
        {
            $json = array("status"=>"failed","error_msg"=>"incorrect activation code");
            return $json;
        }
        $student = new Student();
        $student = Student::find($un);
        $student->isActiveted=1;
        $student->save();
        $json = array("status"=>"success","token"=>csrf_token());
        return $json;

    }

    //this function select student from DB
    public function showUser($un,$pass){
        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this user name not exist");
            return $json;
        }

        $temp = 0;
        $temp= DB::table('student')->where('STUDUSERNAME',$un)->where('STUDPASSWORD' , $pass)->count();
        if($temp==0)
        {
            $json = array("status"=>"failed","error_msg"=>"incorrect password");
            return $json;
        }
        $student = new Student();
        $student =Student::find($un);
        if($student->isActiveted)
        {
            $json = array("status"=>"success","token"=>csrf_token());
            return $json;
        }
        else
        {
            $json = array("status"=>"failed","error_msg"=>"incorrect activation code");
            return $json;
        }


    }
}