<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;


class ProfessorController extends Controller
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
        $professor->activate($request['PROFUSERNAME'],$request['ActivationCode']);
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
    public function update(Request $request, $id)
    {
        //
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
}
