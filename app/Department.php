<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table='department';
    public $primaryKey='DEPTID';
    public $timestamps=false;

    //this function add department in DB
    public function addDepartment($id,$name,$desc)
    {
        if(Department::find($id)=="")
        {
            $dep = new Department;
            $dep->DEPTID=$id;
            $dep->DEPARTMENTNAME=$name;
            $dep->DESCRIPTION=$desc;
            $dep->save();
            $json = array("status"=>"success");
            return $json;
        }
        $json = array("status"=>"failed","error_msg"=>"this department id is exist");
        return $json;
    }
}
