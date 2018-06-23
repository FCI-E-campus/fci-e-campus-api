<?php

namespace App\Http\Controllers;

use App\ExtraMaterial;
use App\OfficialMaterial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class materialController extends Controller
{

    public  function addOfficialMaterial(Request $request){
    $material = new OfficialMaterial();
  return   $material->addMaterial($request["COURSECODE"],$request["USERNAME"],
      $request["MATERIALNAME"],$request["MATERIALDESCRIPTION"],
      $request ["MATERIALFILEPATH"],$request["MATERIALTYPE"],$request["USERTYPE"]);

}

public function showOfficialMaterials(Request $request){

    $material = new OfficialMaterial();
    return   $material->showOfficialMaterials($request["COURSECODE"]);
}

    public  function addExtraMaterial(Request $request){
        $material = new ExtraMaterial();
        return   $material->addMaterial($request["COURSECODE"],$request["STUDUSERNAME"],
            $request["MATERIALNAME"],$request["MATERIALDESCRIPTION"],
            $request ["MATERIALFILEPATH"]);

    }
    public function showExtraMaterials(Request $request){

        $material = new ExtraMaterial();
        return   $material->showExtraMaterials($request["COURSECODE"]);
    }
}
