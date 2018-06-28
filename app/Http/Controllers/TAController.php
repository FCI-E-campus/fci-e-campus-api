<?php

namespace App\Http\Controllers;

use App\TA;
use Illuminate\Http\Request;

class TAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //call add TA from TA class model
    public function store(Request $request)
    {
        $ta = new TA();
        return $ta->addTA($request['TAUSERNAME'],$request['DEPTID'],$request['TAPASSWORD'],
            $request['FIRSTNAME'],$request['LASTNAME'],$request['EMAIL'],$request['PHONENUMBER'],$request['DATEOFBIRTH']
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // call show TA from TA class model
    public function show(Request $request)
    {
        $ta = new TA();
        return $ta->showTA($request['TAUSERNAME'],$request['TAPASSWORD']);
    }
    //call activate from TA class model
    public function activate(Request $request)
    {
        $ta = new TA();
        return $ta->activate($request['TAUSERNAME'],$request['ActivationCode']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //call update from TA class model
    public function update(Request $request)
    {
        $ta = new TA();
        return $ta->updateUser($request['TAUSERNAME'],$request['TAPASSWORD']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //call showStudentSchedule from TA class model
    public function  showStudentSchedule(Request $request){
        $st = new Student();
        return $st->showStudentSchedule($request["TAUSERNAME"]);

    }
    //call getAllTasks from TA class model
    public function getAllTasks(Request $request)
    {
        $ta = new TA();
        return $ta->getAllTasks($request['TAUSERNAME']);
    }
    //call overview from TA class model
    public function overview(Request $request)
    {
        $ta = new TA();
        return $ta->overview($request['TAUSERNAME']);
    }
}
