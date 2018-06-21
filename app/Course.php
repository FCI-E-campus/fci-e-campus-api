<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use DB;
class Course extends Model
{
    protected $table='course';
    public $primaryKey='COURSECODE';
    public $timestamps=false;

    //add course in DB
    public function addCourse($crsCode,$dID,$CrsTittle,$desc,$SD,$ED,$passCode)
    {
        if(Course::find($crsCode)=="") {
            $course = new Course();
            $course->COURSECODE = $crsCode;
            $course->DEPTID = $dID;
            $course->COURSETITLE = $CrsTittle;
            $course->DESCRIPTION = $desc;
            $course->STARTDATE = $SD;
            $course->ENDDATE = $ED;
            $course->PASSCODE = $passCode;
            $course->save();
            $json = array("status"=>"success");
            return $json;
        }
        $json = array("status"=>"failed","error_msg"=>"this course id is exist");
        return $json;
    }
    //get All Forum Posts For Specific Course

    /**
     * @param $crsCode
     * @return array|Collection
     */
    public function getAllForumPostsForSpecificCourse($crsCode)
    {
        $num = Course::where('COURSECODE',$crsCode)->count();
        if($num==0)
        {
            $json = array("status"=>"failed","error_msg"=>8);
            return $json;
        }
        $forum = Forum::where('COURSECODE',$crsCode)->get();
        $posts = array();
        foreach($forum as $tempForum)
        {
            $posts = Post::where('FORUMID','=',[$tempForum->FORUMID])->get();
        }
        $allPosts = new Collection();
        $subJason= array();
        foreach($posts as $post)
        {
            $author=Author::find([$post->AUTHORID]);
            foreach($author as $aauthor)
            {
                $subJason =array("post_title"=>$post->POSTTITLE,"post_body"=>$post->POSTBODY,
                "date_published"=>$post->DATEPUBLISHED,"author_username"=>$aauthor->AUTHORUSERNAME,
                "author_type"=>$aauthor->AUTHORTYPE,"post_id"=>$post->POSTID,"answered"=>$post->ANSWERED);
            }
            $allPosts->push($subJason);
        }
        return $allPosts;
    }

    public function showAllTasksForSpecificCourse($crsCode)
    {
        $num = Course::where('COURSECODE',$crsCode)->count();
        if($num==0)
        {
            $json = array("status"=>"failed","error_msg"=>8);
            return $json;
        }
        $tasks = Task::where('COURSECODE',$crsCode)->get();
        $allTasks = new Collection();
        $subJason= array();
        foreach($tasks as $task)
        {
            $taskCreator=TaskCreator::find([$task->CREATORID]);
            foreach($taskCreator as $ttaskCreator)
            {
                $subJason =array("task_name"=>$task->TASKNAME,"description"=>$task->DESCRIPTION,
                "date_created"=>$task->DATECREATED,"creator_username"=>$ttaskCreator->CREATORUSERNAME,
                "creator_type"=>$ttaskCreator->CREATORTYPE,"due_date"=>$task->DUEDATE,"weight"=>$task->WEIGHT);
            }
            $allTasks->push($subJason);
        }
        return $allTasks;
    }

    //add task to DB
    public function addTask($crsCode,$cId,$tN,$desc,$DD,$DC,$W)
    {

            if(Course::find($crsCode)=="")
            {
                $json = array("status"=>"failed","error_msg"=>"8");
                return $json;
            }
            if(TaskCreator::find($cId)=="")
            {
                return "this task creator not exist";
            }
            $task = new Task();

            $task->COURSECODE = $crsCode;
            $task->CREATORID = $cId;
            $task->TASKNAME = $tN;
            $task->DESCRIPTION = $desc;
            $task->DUEDATE = $DD;
            $task->DATECREATED = $DC;
            $task->WEIGHT = $W;
            $task->save();
            $json = array("status"=>"success");
            return $json;


    }

    //delete post from DB
    public function deletePost($pID)
    {
        if(Post::find($pID)!="") {
            Post::where('POSTID', '=', [$pID])->delete();
            $json = array("status"=>"success");
            return $json;
        }
        $json = array("status"=>"failed","error_msg"=>"this post id is not exist");
        return $json;
    }

    //retrieve courses for specific student

    /**
     * @param $un
     * @return array
     */
    public function showCoursesForStudent($un)
    {
        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"1");
            return $json;
        }


        $sql = 'SELECT co.COURSECODE, co.COURSETITLE 
FROM Course co join StudentCourse b 
on co.COURSECODE = b.COURSECODE
 WHERE b.STUDUSERNAME = \''. $un. '\'';

        return  DB::select($sql);

    }

    public function showCoursesForTA($un)
    {
        if(TA::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"1");
            return $json;
        }


        $sql = 'SELECT co.COURSECODE, co.COURSETITLE 
FROM Course co join TaCourse b 
on co.COURSECODE = b.COURSECODE
 WHERE b.TAUSERNAME = \''. $un. '\'';

        return  DB::select($sql);

    }

    public function showCoursesForProf($un)
    {
        if(Professor::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"1");
            return $json;
        }


        $sql = 'SELECT co.COURSECODE, co.COURSETITLE 
FROM Course co join TaCourse b 
on co.COURSECODE = b.COURSECODE
 WHERE b.PROFUSERNAME = \''. $un. '\'';

        return  DB::select($sql);

    }
    public function showCourse($courseCode)
    {
        if(Course::find($courseCode)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"8");
            return $json;
        }

        return Course::where('COURSECODE',$courseCode)->get();
    }
    //retrieve courses on the system
    public function showCoursesOnTheSystem()
    {

        return Course::all();

    }

    /**
     * @param $courseCode
     * @param $groubid
     * @param $un
     * @param $passCode
     * @return array
     */
    public function joinCourse($courseCode, $groubid , $un, $passCode)
    {
        if(Course::find($courseCode)=="")
        {
            $json = array("status"=>"failed","error_code"=>"8");
            return $json;
        }
        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_code"=>"1");
            return $json;
        }
        $co=Course::where('PASSCODE',$passCode)->count();

        if ($co == 0){
            $json = array("status"=>"failed","error_code"=>"28");
            return $json;

        }
        $st=StudentCourse::where("COURSECODE" , $courseCode)->where("STUDUSERNAME",$un)->count();
        if ($st!=0){
            $json = array("status"=>"failed","error_code"=>"29");
            return $json;


        }
            $course = new StudentCourse();
            $course->GROUPID=$groubid;
            $course->COURSECODE = $courseCode;
            $course->STUDUSERNAME=$un;

            $course->save();
            $json = array("status"=>"success");
            return $json;

    }

public function  showscheduleforcourse($courscode){
    if(Course::find($courscode)=="")
    {
        $json = array("status"=>"failed","error_code"=>"8");
        return $json;
    }


    $slot = Slots::where('COURSECODE',$courscode)->get();
    return $slot;


}






}
