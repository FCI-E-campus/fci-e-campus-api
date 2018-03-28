<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Student;
use DB;
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
    public function store(Request $request)
    {


        if(Student::find($request['STUDUSERNAME'])=="") {
            $student = new Student;
            $student->STUDUSERNAME = $request['STUDUSERNAME'];
            $student->DEPTID = $request['DEPTID'];
            $student->DEP_DEPTID = $request['DEP_DEPTID'];
            $student->STUDPASSWORD = $request['STUDPASSWORD'];
            $student->FIRSTNAME = $request['FIRSTNAME'];
            $student->LASTNAME = $request['LASTNAME'];
            $student->EMAIL = $request['EMAIL'];
            $student->PHONENUMBER = $request['PHONENUMBER'];
            $student->DATEOFBIRTH = null;
            $student->FACULTYID = $request['FACULTYID'];
            $student->ISMODERATOR = $request['ISMODERATOR'];
             $student->save();
            return redirect('/');
        }
        return "this user name is exist, select anther user name";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if(Student::find($request['STUDUSERNAME'])=="")
            return "this student not exist";

        $temp = 0;
        $temp= DB::table('student')->where('STUDUSERNAME',$request['STUDUSERNAME'])->where('STUDPASSWORD' , $request['STUDPASSWORD'])->count();
        if($temp==0)
            return "incorrect password";
        return Student::find($request['STUDUSERNAME']);
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
