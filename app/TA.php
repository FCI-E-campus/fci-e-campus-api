<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class TA extends Model
{
    protected $table='ta';
    public $primaryKey='TAUSERNAME';
    public $timestamps=false;
    //this function add ta in DB
    public function addTA($un,$dID,$pass,$fn,$ln,$em,$pn,$DB)
    {
        $email=$em;
        $check = substr($email, strpos($email, '@') , 14);
        if(strcmp($check,"@fci-cu.edu.eg")!=0)
        {
            $json = array("status"=>"failed","error_msg"=>"this not academic mail");
            return $json;
        }
        if(TA::find($un)=="") {
            $ta = new TA();
            $ta->TAUSERNAME = $un;
            $ta->DEPTID=$dID;
            $ta->TAPASSWORD = $pass;
            $ta->FIRSTNAME = $fn;
            $ta->LASTNAME = $ln;
            $ta->EMAIL = $em;
            $ta->PHONENUMBER = $pn;
            $ta->DATEOFBIRTH = $DB;
            $ta->save();
            $json = array("status"=>"success","token"=>csrf_token());
            return $json;
        }
        $json = array("status"=>"failed","error_msg"=>"this user name is exist, select anther user name");
        return $json;
    }

    //select ta from DB
    public  function showTA($un,$pass)
    {

        if(TA::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this TA not exist");
            return $json;
        }

        $temp = 0;
        $temp= DB::table('ta')->where('TAUSERNAME',$un)->where('TAPASSWORD' , $pass)->count();
        if($temp==0)
        {
            $json = array("status"=>"failed","error_msg"=>"incorrect password");
            return $json;
        }
        $json = array("status"=>"success","token"=>csrf_token());
        return $json;;
    }

}