<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='student';
    public $primaryKey='STUDUSERNAME';
    public $timestamps=false;
}
