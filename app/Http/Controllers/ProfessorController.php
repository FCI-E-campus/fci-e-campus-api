<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;


class ProfessorController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //call add professor from professor class model
    public function store(Request $request)
    {
        $professor = new Professor();
        return $professor->addProfessor($request['PROFUSERNAME'],$request['DEPTID'],$request['PROFPASSWORD'],
            $request['FIRSTNAME'],$request['LASTNAME'],$request['EMAIL'],$request['PHONENUMBER'],$request['DATEOFBIRTH']
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // call show professor from professor class model
    public function show(Request $request)
    {
        $professor = new Professor();
        return $professor->showProfessor($request['PROFUSERNAME'],$request['PROFPASSWORD']);
    }

    public function activate(Request $request)
    {
        $professor = new Professor();
        return $professor->activate($request['PROFUSERNAME'],$request['ActivationCode']);
    }




    public function update(Request $request)
    {
        $prof = new Professor();
        return $prof->updateUser($request['PROFUSERNAME'],$request['PROFPASSWORD']);
    }


    public function  showprofSchedule(Request $request){
        $pr = new Professor();
        return $pr->showprofSchedule($request["PROFUSERNAME"]);

    }
}
