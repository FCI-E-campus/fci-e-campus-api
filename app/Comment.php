<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Comment extends Model
{
    protected $table='comment';
    public $primaryKey='COMMENTID';
    public $timestamps=false;
}
