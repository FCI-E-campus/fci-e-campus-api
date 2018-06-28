<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use DB;
class Post extends Model
{
    protected $table='post';
    public $primaryKey='POSTID';
    public $timestamps=false;

    //retrieve specific post from the DB then show all its comments
    public function showSpecificPostComments($postID)
    {
        $num = Post::where('POSTID',$postID)->count();
        if($num==0)
        {
            $json = array("status"=>"failed","error_msg"=>16);
            return $json;
        }
        $post = Post::where('POSTID',$postID)->get();
        foreach($post as $ppost)
        {
            $comments = Comment::where('POSTID','=',[$ppost->POSTID])->get();
        }
        $allComments = new Collection();

        foreach($comments as $comment)
        {
            $temp=Author::find([$comment->AUTHORID]);
            foreach($temp as $tetemp)
            {
                $subJason =array("comment_text"=>$comment->COMMENTTEXT,"comment_time"=>$comment->COMMENTTIME,
                "author_username"=>$tetemp->AUTHORUSERNAME,
                "author_type"=>$tetemp->AUTHORTYPE,"comment_id"=>$comment->COMMENTID);
            }
            $allComments->push($subJason);
        }
        $subJason =array("status"=>"success","result"=>$allComments);
        return  $subJason;
    }

    //add comment to specific post
    public function addComment($author_username,$author_type,$post_id,$comment_text)
    {
        $num = Post::where('POSTID',$post_id)->count();
        if($num==0)
        {
            $json = array("status"=>"failed","error_msg"=>16);
            return $json;
        }
        $author = new Author();
        $author->AUTHORUSERNAME=$author_username;
        $author->AUTHORTYPE=$author_type;
        $author->save();
        $comment = new Comment();
        $comment->AUTHORID=$author->AUTHORID;
        $comment->POSTID=$post_id;
        $comment->COMMENTTEXT=$comment_text;
        $comment->COMMENTTIME=date('Y-m-d H:i:s');
        $comment->save();
        $jason = array("status"=>"success","comment_id"=>$comment->COMMENTID);
        return $jason;
    }
}
