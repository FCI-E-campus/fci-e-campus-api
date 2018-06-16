<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraMaterial extends Model
{
    protected $table='extramaterials';
    public $primaryKey='EXTRAMATERIALID';
    public $timestamps=false;
}
