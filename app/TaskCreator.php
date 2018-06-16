<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskCreator extends Model
{
    protected $table='taskcreator';
    public $primaryKey='CREATORID';
    public $timestamps=false;
}
