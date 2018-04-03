<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='post';
    public $primaryKey='POSTID';
    public $timestamps=false;
}
