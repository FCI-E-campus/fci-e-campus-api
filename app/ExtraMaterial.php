<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraMaterial extends Model
{
    protected $table='extramaterials';
    public $primaryKey='EXTRAMATERIALID';
    public $timestamps=false;

    //add extra material to the DB
    public function addMaterial($COURSECODE,$un,$MATERIALNAME,$MATERIALDESCRIPTION,$link)
    {
        if(Course::find($COURSECODE)=="")
        {
            $json = array("status"=>"failed","error_code"=>"8");
            return $json;
        }
            $count = Student::where('STUDUSERNAME', $un)->count();
            if ($count == 0) {
                $json = array("status"=>"failed","error_code"=>"1");
                return $json;
            }

        //STUDUSERNAME	COURSECODE	MATERIALNAME	MATERIALDESCRIPTION	MATERIALFILEPATH
        $matrial= new ExtraMaterial();
        $matrial->STUDUSERNAME=$un;
        $matrial->COURSECODE=$COURSECODE;
        $matrial->MATERIALNAME=$MATERIALNAME;
        $matrial->MATERIALDESCRIPTION=$MATERIALDESCRIPTION;
        $matrial->MATERIALFILEPATH=$link;
        $matrial->save();
        $json = array("status"=>"success");
        return $json;
    }
    //retreive the extra material of specific course from the DB
    public function  showExtraMaterials($coursecode){
        if(Course::find($coursecode)=="")
        {
            $json = array("status"=>"failed","error_code"=>"8");
            return $json;
        }
        $Materials = ExtraMaterial::where('COURSECODE',$coursecode)->get();
        $subJason =array("status"=>"success","result"=>$Materials);
        return  $subJason;
    }
}
