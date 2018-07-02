<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Department extends Model
{
    protected $table = 'department';
    public $primaryKey = 'DEPTID';
    public $timestamps = false;

    //this function add department in DB
    public function addDepartment($id, $name, $desc)
    {
        if (Department::find($id) == "") {
            $dep = new Department;
            $dep->DEPTID = $id;
            $dep->DEPARTMENTNAME = $name;
            $dep->DESCRIPTION = $desc;
            $dep->save();
            $json = array("status" => "success");
            return $json;
        }
        $json = array("status" => "failed", "error_msg" => "this department id is exist");
        return $json;
    }

    public function deleteRelatives($id)
    {
        $course = new Course();
        $course->deleteRelatives_($id);

        $pro = new Professor();
        $pro->deleteRelatives_($id);

        $ta = new TA();
        $ta->deleteRelatives_($id);

        $stud = new Student();
        $stud->deleteRelatives_($id);
    }
}
