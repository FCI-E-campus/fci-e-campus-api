<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessorCource extends Model
{
    protected $table='professorcourse';
    public $primaryKey='professorcourseID';
    public $timestamps=false;
}
