<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table='professor';
    public $primaryKey = 'PROFUSERNAME';
    public $timestamps=false;
}
