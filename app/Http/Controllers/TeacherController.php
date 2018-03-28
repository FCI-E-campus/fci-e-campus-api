<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use DB;
class TeacherController extends Controller
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
        $email=$request['EMAIL'];
        $check = substr($email, strpos($email, '@') , 14);
        if(strcmp($check,"@fci-cu.edu.eg")!=0)
            return "this not academic mail";
        if(Teacher::find($request['PROFUSERNAME'])=="") {
            $teacher = new Teacher;
            $teacher->PROFUSERNAME = $request['PROFUSERNAME'];
            $teacher->DEPTID=$request['DEPTID'];
            $teacher->PROFPASSWORD = $request['PROFPASSWORD'];
            $teacher->FIRSTNAME = $request['FIRSTNAME'];
            $teacher->LASTNAME = $request['LASTNAME'];
            $teacher->EMAIL = $request['EMAIL'];
            $teacher->PHONENUMBER = $request['PHONENUMBER'];
            $teacher->DATEOFBIRTH = null;
            $teacher->save();
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
        if(Teacher::find($request['PROFUSERNAME'])=="")
            return "this Teacher not exist";

        $temp = 0;
        $temp= DB::table('professor')->where('PROFUSERNAME',$request['PROFUSERNAME'])->where('PROFPASSWORD' , $request['PROFPASSWORD'])->count();
        if($temp==0)
            return "incorrect password";
        return Teacher::find($request['PROFUSERNAME']);
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
