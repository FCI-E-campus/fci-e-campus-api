<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Forum extends Model
{
    protected $table='forum';
    public $primaryKey='FORUMID';
    public $timestamps=false;
    //add post to specific forum
    public function addPost($author_username,$author_type,$course_code,$post_title,$post_body)
    {
        $num1 = Author::where('AUTHORUSERNAME',$author_username)->count();
        $author_id;
        if($num1==0)
        {
            $author = new Author();
            $author->AUTHORUSERNAME=$author_username;
            $author->AUTHORTYPE=$author_type;
            $author->save();
            $author_id=$author->AUTHORID;
        }
        else
        {
            $oldAuthor=Author::where('AUTHORUSERNAME',$author_username)->get();
            $author_id=$oldAuthor[0]->AUTHORID;
        }
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
        $post->AUTHORID=$author_id;
        $post->POSTTITLE=$post_title;
        $post->POSTBODY=$post_body;
        $post->ANSWERED=0;
        $post->DATEPUBLISHED=date('Y-m-d H:i:s');
        $post->save();
        $jason = array("status"=>"success","post_id"=>$post->POSTID);
        return $jason;
    }
}
