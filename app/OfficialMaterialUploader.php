<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficialMaterialUploader extends Model
{

    protected $table='officialmaterialuploader';
    public $primaryKey='UPLOADERID';
    public $timestamps=false;
    //upload official material
    public function addUploader($type,$un)
    {
        $upload = new OfficialMaterialUploader();
        //UPLOADERID	UPLOADERUSERNAME	UPLOADERTYPE
        $upload-> UPLOADERUSERNAME= $un;
        $upload-> UPLOADERTYPE= $type;
        $upload->save();
        $x= OfficialMaterialUploader::where('UPLOADERUSERNAME', $un)->get();
        return $x[0]["UPLOADERID"];

    }
}
