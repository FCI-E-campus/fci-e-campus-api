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



}