<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskCreator extends Model
{
    protected $table='taskcreator';
    public $primaryKey='CREATORID';
    public $timestamps=false;

    public function addUploader($type,$un)
    {
        $upload = new TaskCreator();
        //CREATORID	CREATORUSERNAME	CREATORTYPE
        $upload-> CREATORUSERNAME= $un;
        $upload-> CREATORTYPE= $type;
        $upload->save();
        $x= OfficialMaterialUploader::where('CREATORUSERNAME', $un)->get();
        return $x[0]["CREATORID"];

    }
}
