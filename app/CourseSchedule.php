<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    protected $table='courseschedule';
    public $primaryKey='COURSESCHEDULEID';
    public $timestamps=false;
}
