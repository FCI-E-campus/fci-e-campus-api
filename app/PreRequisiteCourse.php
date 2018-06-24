<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreRequisiteCourse extends Model
{
    protected $table='prerequisitecourse';//prerequisitecourseID
    public $primaryKey='prerequisitecourseID';
    public $timestamps=false;
}
