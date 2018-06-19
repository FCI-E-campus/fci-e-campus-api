<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
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
    //call add student from student class model
    public function store(Request $request)
    {
        $student = new Student();
        return $student->addStudent($request['STUDUSERNAME'],$request['DEPTID'],$request['DEP_DEPTID'],
            $request['STUDPASSWORD'],$request['FIRSTNAME'],$request['LASTNAME'],
            $request['EMAIL'],$request['PHONENUMBER'],$request['DATEOFBIRTH'],$request['FACULTYID']
            );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //call show user from student class model
    public function show(Request $request)
    {
        $student = new Student();
        return $student->showUser($request['STUDUSERNAME'],$request['STUDPASSWORD']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $student = new Student();
        return $student->updateUser($request['STUDUSERNAME'],$request['STUDPASSWORD']);
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
