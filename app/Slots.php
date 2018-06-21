<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slots extends Model
{
    protected $table='slots';
    public $primaryKey='SLOTID';
    public $timestamps=false;
}
