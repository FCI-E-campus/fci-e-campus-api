<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Forum extends Model
{
    protected $table='forum';
    public $primaryKey='FORUMID';
    public $timestamps=false;

    public function addPost($author_username,$author_type,$course_code,$post_title,$post_body)
    {
        $author = new Author();
        $author->AUTHORUSERNAME=$author_username;
        $author->AUTHORTYPE=$author_type;
        $author->save();
        $num = Forum::where('COURSECODE',$course_code)->count();
        if($num==0)
        {
            $json = array("status"=>"failed","error_msg"=>8);
            return $json;
        }
        $forum = Forum::where('COURSECODE',$course_code)->get();
        foreach($forum as $tempForum)
        {
            $forumid = $tempForum->FORUMID;
        }
        $post = new Post();
        $post->FORUMID=$forumid;
        $post->AUTHORID=$author->AUTHORID;
        $post->POSTTITLE=$post_title;
        $post->POSTBODY=$post_body;
        $post->ANSWERED=0;
        $post->DATEPUBLISHED=date('Y-m-d H:i:s');
        $post->save();
        $jason = array("status"=>"success","post_id"=>$post->POSTID);
        return $jason;
    }
}
