<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Forum extends Model
{
    protected $table='forum';
    public $primaryKey='FORUMID';
    public $timestamps=false;
}
