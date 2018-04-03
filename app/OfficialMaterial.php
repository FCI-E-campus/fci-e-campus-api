<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficialMaterial extends Model
{
    protected $table='officialmaterial';
    public $primaryKey='MATERIALID';
    public $timestamps=false;
}
