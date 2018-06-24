<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    protected $table='studentcourse';
    public $primaryKey='studentCourseID';
    public $timestamps=false;
}
