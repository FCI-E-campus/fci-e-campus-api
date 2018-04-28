<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Professor extends Model
{
    protected $table='professor';
    public $primaryKey = 'PROFUSERNAME';
    public $timestamps=false;
    //this function add professor in DB
    public function addProfessor($un,$dID,$pass,$fn,$ln,$em,$pn,$DB)
    {
        $email=$em;
        $check = substr($email, strpos($email, '@') , 14);
        if(strcmp($check,"@fci-cu.edu.eg")!=0)
        {
            $json = array("status"=>"failed","error_msg"=>"this not academic mail");
            return $json;
        }
        if(Professor::find($un)=="") {
            $professor = new Professor();
            $professor->PROFUSERNAME = $un;
            $professor->DEPTID=$dID;
            $professor->PROFPASSWORD = $pass;
            $professor->FIRSTNAME = $fn;
            $professor->LASTNAME = $ln;
            $professor->EMAIL = $em;
            $professor->PHONENUMBER = $pn;
            $professor->DATEOFBIRTH = null;
            $professor->save();
            $json = array("status"=>"success","token"=>csrf_token());
            return $json;
        }
        $json = array("status"=>"failed","error_msg"=>"this user name is exist, select anther user name");
        return $json;
    }

    //select professor from DB
    public  function showProfessor($un,$pass)
    {

        if(Professor::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this professor not exist");
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
