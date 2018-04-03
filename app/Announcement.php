<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table='announcement';
    public $primaryKey='ANNOUNCEMENTID';
    public $timestamps=false;
}
