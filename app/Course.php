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
        $num = Forum::where('COURSECODE',$crsCode)->count();
        if($num==0)
        {
            $json = array("status"=>"failed","error_msg"=>8);
            return $json;
        }
        $forum = Forum::where('COURSECODE',$crsCode)->get();
        foreach($forum as $tempForum)
        {
            $posts = Post::where('FORUMID','=',[$tempForum->FORUMID])->get();
        }
        $allPosts = new Collection();

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
    public function addTask($id,$crsCode,$cId,$tN,$desc,$DD,$DC,$W)
    {
        if(Task::find($id)=="") {
            if(Course::find($crsCode)=="")
            {
                return "this course not exist";
            }
            if(TaskCreator::find($cId)=="")
            {
                return "this task creator not exist";
            }
            $task = new Task();
            $task->TASKID = $id;
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
        else
        {
            $json = array("status"=>"failed","error_msg"=>"this task id is exist");
            return $json;
        }
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
            $json = array("status"=>"failed","error_msg"=>"this student is not exist");
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
            $json = array("status"=>"failed","error_msg"=>"this TA is not exist");
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
            $json = array("status"=>"failed","error_msg"=>"this TA is not exist");
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

    public function joinCourse($courseCode ,$un,$passCode)
    {
        if(Course::find($courseCode)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"8");
            return $json;
        }
        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"1");
            return $json;
        }
        $co=Course::where('PASSCODE',$passCode)->get();
        if ($co == null){
            $json = array("status"=>"failed","error_msg"=>"28");
            return $json;

        }

            $course = new StudentCourse();
            $course->COURSECODE = $courseCode;
            $course->STUDUSERNAME=$un;
            $course->save();
            $json = array("status"=>"success");
            return $json;

    }






}
