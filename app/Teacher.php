<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Teacher extends Model
{
    protected $table='professor';
    public $primaryKey = 'PROFUSERNAME';
    public $timestamps=false;
    //this function add teacher in DB
    public function addTeacher($un,$dID,$pass,$fn,$ln,$em,$pn,$DB)
    {
        $email=$em;
        $check = substr($email, strpos($email, '@') , 14);
        if(strcmp($check,"@fci-cu.edu.eg")!=0)
        {
            $json = array("status"=>"failed","error_msg"=>"this not academic mail");
            return $json;
        }
        if(Teacher::find($un)=="") {
            $teacher = new Teacher;
            $teacher->PROFUSERNAME = $un;
            $teacher->DEPTID=$dID;
            $teacher->PROFPASSWORD = $pass;
            $teacher->FIRSTNAME = $fn;
            $teacher->LASTNAME = $ln;
            $teacher->EMAIL = $em;
            $teacher->PHONENUMBER = $pn;
            $teacher->DATEOFBIRTH = null;
            $teacher->save();
            $json = array("status"=>"success","token"=>csrf_token());
            return $json;
        }
        $json = array("status"=>"failed","error_msg"=>"this user name is exist, select anther user name");
        return $json;
    }

    //select teacher from DB
    public  function showTeacher($un,$pass)
    {

        if(Teacher::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this Teacher not exist");
            return $json;
        }

        $temp = 0;
        $temp= DB::table('professor')->where('PROFUSERNAME',$un)->where('PROFPASSWORD' , $pass)->count();
        if($temp==0)
        {
            $json = array("status"=>"failed","error_msg"=>"incorrect password");
            return $json;
        }
        $json = array("status"=>"success","token"=>csrf_token());
        return $json;;
    }
}
