<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='students';
    public $primaryKey='userName';
    public $timestamps=true;
}
