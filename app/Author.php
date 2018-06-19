<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Author extends Model
{
    protected $table='author';
    public $primaryKey='AUTHORID';
    public $timestamps=false;



}
