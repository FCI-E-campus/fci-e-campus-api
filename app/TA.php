<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Mail;
class TA extends Model
{
    protected $table='ta';
    public $primaryKey='TAUSERNAME';
    public $timestamps=false;
    //this function add ta in DB
    public function addTA($un,$dID,$pass,$fn,$ln,$em,$pn,$DB)
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
        if(TA::find($un)!="") {
            $json = array("status"=>"failed","error_code"=>4);
            return $json;
        }
        $email=$em;
        $check = substr($email, strpos($email, '@') , 14);
        if(strcmp($check,"@fci-cu.edu.eg")!=0)
        {
            $json = array("status"=>"failed","error_code"=>5);
            return $json;
        }
        if(Department::find($dID)=="")
        {
            $json = array("status"=>"failed","error_code"=>27);
            return $json;
        }

            $ta = new TA();
            $ta->TAUSERNAME = $un;
            $ta->DEPTID=$dID;
            $ta->TAPASSWORD = $pass;
            $ta->FIRSTNAME = $fn;
            $ta->LASTNAME = $ln;
            $ta->EMAIL = $em;
            $ta->PHONENUMBER = $pn;
            $ta->DATEOFBIRTH = $DB;
            $code="";
            for ($i=0 ; $i < 7 ; $i++)
            {
                $code = $code.mt_rand(0,9);
            }
            $ta->ActivationCode=$code;
            $ta->isActiveted = 0;
            $this->sendMail($code,$em);
            $ta->save();
            $json = array("status"=>"success");
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
        if(TA::find($un)=="")
        {
            $json = array("status"=>"failed","error_code"=>1);
            return $json;
        }
        $temp = 0;
        $temp= DB::table('ta')->where('TAUSERNAME',$un)->where('ActivationCode' , $code)->count();
        if($temp==0)
        {
            $json = array("status"=>"failed","error_code"=>17);
            return $json;
        }
        $ta = new TA();
        $ta = TA::find($un);
        $ta->isActiveted=1;
        $ta->save();
        $json = array("status"=>"success","token"=>csrf_token());
        return $json;

    }

    //select ta from DB
    public  function showTA($un,$pass)
    {
        if(TA::find($un)=="")
        {
            $json = array("status"=>"failed","error_code"=>1);
            return $json;
        }

        $temp = 0;
        $temp= DB::table('ta')->where('TAUSERNAME',$un)->where('TAPASSWORD' , $pass)->count();
        if($temp==0)
        {
            $json = array("status"=>"failed","error_code"=>2);
            return $json;
        }
        $ta = new TA();
        $ta = TA::find($un);
        if($ta->isActiveted)
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

}