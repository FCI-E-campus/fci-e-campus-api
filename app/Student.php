<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\PrettyPrinter\Standard;
use DB;
class Student extends Model
{
    protected $table='student';
    public $primaryKey='STUDUSERNAME';
    public $timestamps=false;
    //this function add student in DB
    public function addStudent($un,$dID,$ddID,$pass,$fn,$ln,$em,$pn,$DB,$FID,$IM)
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
          $student->ISMODERATOR = $IM;
          $student->save();
          $json = array("status"=>"success","token"=>csrf_token());
          return $json;
        }
        $json = array("status"=>"failed","error_msg"=>"this user name is exist");
        return $json;
    }
    //this function select student from DB
    public function showUser($un,$pass){
        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this student not exist");
            return $json;
        }

        $temp = 0;
        $temp= DB::table('student')->where('STUDUSERNAME',$un)->where('STUDPASSWORD' , $pass)->count();
        if($temp==0)
        {
            $json = array("status"=>"failed","error_msg"=>"incorrect password");
            return $json;
        }
        $json = array("status"=>"success","token"=>csrf_token());
        return $json;
    }
}