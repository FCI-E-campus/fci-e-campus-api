<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficialMaterial extends Model
{
    protected $table='officialmaterial';
    public $primaryKey='MATERIALID';
    public $timestamps=false;
 /*
  * {
    "_token": "token of the user",
    "link": "..........",
    "course_code": "cs123",
    "material_name": "Lecture 10",
    "material_description": "Last lecture before final",
    "material_type": "lec",
    "uploader_username": "mnassef",
    "uploader_type": "prof"
}
  * */
    //add official material to the DB
    public function addMaterial($COURSECODE,$un,$MATERIALNAME,$MATERIALDESCRIPTION,$link,$MATERIALTYPE,$usertype)
    {
        if(Course::find($COURSECODE)=="")
        {
            $json = array("status"=>"failed","error_code"=>"8");
            return $json;
        }
        if ($usertype=="ta") {
            $count = TA::where('TAUSERNAME', $un)->count();
            if ($count == 0) {
                $json = array("status"=>"failed","error_code"=>"1");
                return $json;
        }
        }
        else if ($usertype=="prof") {
            $count = Professor::where('PROFUSERNAME', $un)->count();
            if ($count == 0) {
                $json = array("status" => "failed", "error_code" => "1");
                return $json;
            }
        }
        $upload= new OfficialMaterialUploader();
        $id=$upload->addUploader($usertype,$un);
        $matrial= new OfficialMaterial();
        $matrial->COURSECODE=$COURSECODE;
        $matrial->UPLOADERID=$id;
        $matrial->MATERIALNAME=$MATERIALNAME;
        $matrial->MATERIALDESCRIPTION=$MATERIALDESCRIPTION;
        $matrial->MATERIALFILEPATH=$link;
        $matrial->MATERIALTYPE=$MATERIALTYPE;
        $matrial->save();
        $json = array("status"=>"success");
        return $json;
    }
    //retreive official material from the DB
    public function  showOfficialMaterials($coursecode){
        if(Course::find($coursecode)=="")
        {
            $json = array("status"=>"failed","error_code"=>"8");
            return $json;
        }
        $Materials = OfficialMaterial::where('COURSECODE',$coursecode)->get();
        $subJason =array("status"=>"success","result"=>$Materials);
        return  $subJason;
    }



}
