<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Groups extends Model
{
    protected $table = 'groups';
    public $primaryKey = 'GROUPID';
    public $timestamps = false;

    public function deleteRelatives_($code)
    {
        $rows = DB::table('groups')->where('COURSECODE', $code)->get();

        foreach($rows as $i)
            $this->deleteRelatives($i->GROUPID);

        DB::table('groups')->where('COURSECODE',$code)->delete();
    }

    public function deleteRelatives__($code)
    {
        $rows = DB::table('groups')->where('TAUSERNAME', $code)->get();

        foreach($rows as $i)
            $this->deleteRelatives($i->GROUPID);

        DB::table('groups')->where('TAUSERNAME',$code)->delete();
    }

    public function deleteRelatives($id)
    {
        DB::table('slots')->where('GROUPID',$id)->delete();
        DB::table('tacourse')->where('GROUPID',$id)->delete();
        DB::table('studentcourse')->where('GROUPID',$id)->delete();
    }
}
