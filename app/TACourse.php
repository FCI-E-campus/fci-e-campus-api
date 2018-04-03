<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TACourse extends Model
{
    protected $table='tacourse';
    public $primaryKey='TACOURSEID';
    public $timestamps=false;
}
