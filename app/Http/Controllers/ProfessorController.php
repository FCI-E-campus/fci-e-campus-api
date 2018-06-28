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
    //call getAllTasks from professor class model
    public function getAllTasks(Request $request)
    {
        $professor = new Professor();
        return $professor->getAllTasks($request['PROFUSERNAME']);
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
    //call activate from professor class model
    public function activate(Request $request)
    {
        $professor = new Professor();
        return $professor->activate($request['PROFUSERNAME'],$request['ActivationCode']);
    }
    //call update from professor class model
    public function update(Request $request)
    {
        $prof = new Professor();
        return $prof->updateUser($request['PROFUSERNAME'],$request['PROFPASSWORD']);
    }
    //call showprofSchedule from professor class model
    public function  showprofSchedule(Request $request){
        $pr = new Professor();
        return $pr->showprofSchedule($request["PROFUSERNAME"]);

    }
    //call overview from professor class model
    public function overview(Request $request)
    {
        $prof = new Professor();
        return $prof->overview($request["PROFUSERNAME"]);
    }
}
