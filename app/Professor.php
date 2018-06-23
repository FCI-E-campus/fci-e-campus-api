<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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

    public function sendMail($ActivationCode , $to){
        $date = ["code"=>$ActivationCode,"to"=>$to];
        Mail::send("Email",$date,function ($message)use($date){
            $message->from("campus5553@gmail.com","E-campus");
            $message->to($date['to']);
            $message->subject("E-compus activation code");
        });
    }

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

    public function updateUser($un,$pass){

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
}
