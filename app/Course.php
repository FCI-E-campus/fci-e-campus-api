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

    /**
     * @param $crsCode
     * @return array|Collection
     */
    //get All Forum Posts For Specific Course by fetching the 
    //forum of this course then fetching the posts of this forum then return them
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
        $subJason =array("status"=>"success","result"=>$allPosts);
        return $subJason;

    }
    //show All Tasks For Specific Course looping on tasking table 
    //then if the course code of this task the course code that i search for 
    //go to task creator then fetch the name of creator of this task
    //then return the task with the name of its creator
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
        $subJason =array("status"=>"success","result"=>$allTasks);
        return $subJason;
    }

    //add task to DB
    public function addTask($crsCode,$tN,$desc,$DD,$DC,$W,$un,$usertype)
    {

            if(Course::find($crsCode)=="")
            {
                $json = array("status"=>"failed","error_msg"=>"8");
                return $json;
            }
        if ($usertype=="ta") {
            $count = TA::where('TAUSERNAME', $un)->count();
            if ($count == 0) {
                $json = array("status"=>"failed","error_code"=>"1");
                return $json;
            }
        }
        else if ($usertype=="prof") {
            $count = Professor::where('PROFUSERNAME', $un)->count();
            if ($count == 0) {
                $json = array("status" => "failed", "error_code" => "1");
                return $json;
            }
        }
        $upload= new TaskCreator();
        $id=$upload->addUploader($usertype,$un);
            $task = new Task();

            $task->COURSECODE = $crsCode;
            $task->CREATORID = $id;
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

    /**
     * @param $un
     * @return array
     */
    //retrieve courses for specific student then retreive them
     public function showCoursesForStudent($un)
    {
        if(Student::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"this student is not exist");
            return $json;
        }
        $course=new Collection();
        $x=StudentCourse::where('STUDUSERNAME',$un)->get();
        foreach ($x as $item){

            $z=Course::where('COURSECODE',$item["COURSECODE"])->get();
            $s=array("COURSECODE"=>$item["COURSECODE"],"COURSETITLE"=>$z[0]["COURSETITLE"]);
            $course->push($s);
        }
        $subJason =array("status"=>"success","result"=>$course);
        return $subJason;
    }

    //retrieve courses for specific ta then retreive them
    public function showCoursesForTA($un)
    {
        if(TA::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"1");
            return $json;
        }
        $course=new Collection();
        $x=TACourse::where('TAUSERNAME',$un)->get();
        foreach ($x as $item){

            $z=Course::where('COURSECODE',$item["COURSECODE"])->get();
            $s=array("COURSECODE"=>$item["COURSECODE"],"COURSETITLE"=>$z[0]["COURSETITLE"]);
            $course->push($s);
        }
        $subJason =array("status"=>"success","result"=>$course);
        return $subJason;
    }

    //retrieve courses for specific professor then retreive them
    public function showCoursesForProf($un)
    {
        if(Professor::find($un)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"1");
            return $json;
        }
        $course=new Collection();
        $x=ProfessorCource::where('PROFUSERNAME',$un)->get();
        foreach ($x as $item){

            $z=Course::where('COURSECODE',$item["COURSECODE"])->get();
            $s=array("COURSECODE"=>$item["COURSECODE"],"COURSETITLE"=>$z[0]["COURSETITLE"]);
            $course->push($s);
        }
        $subJason =array("status"=>"success","result"=>$course);
        return $subJason;
    }

    //go to the course table then retreive the course which have this code
    public function showCourse($courseCode)
    {
        //php artisan make:controller UserController --plain
        if(Course::find($courseCode)=="")
        {
            $json = array("status"=>"failed","error_msg"=>"8");
            return $json;
        }

        //zizomody
        $courses=Course::where('COURSECODE',$courseCode)->get();
        $c=$courses[0];
        $profe=ProfessorCource::where('COURSECODE', $courseCode)->get();
        $row=new Collection();
        foreach ($profe as $item){
            $prof= Professor::where("PROFUSERNAME",$item["PROFUSERNAME"])->get();
            //FIRSTNAME	LASTNAME
            foreach ($prof as $item2){
                $z=array("PROFUSERNAME"=>$item["PROFUSERNAME"],"FIRSTNAME"=>$item2["FIRSTNAME"],"LASTNAME"=>$item2["LASTNAME"]);
            }
            $row->push($z);
        }
        $ta=TACourse::where('COURSECODE', $courses[0]["COURSECODE"])->get();
        $row2=new Collection();
        foreach ($ta as $item){
            $prof= TA::where("TAUSERNAME",$item["TAUSERNAME"])->get();
            //FIRSTNAME	LASTNAME
            foreach ($prof as $item2){
                $z=array("TAUSERNAME"=>$item["TAUSERNAME"],"FIRSTNAME"=>$item2["FIRSTNAME"],"LASTNAME"=>$item2["LASTNAME"]);
            }
            $row2->push($z);
        }
        $res=array("Course"=>$c,"prof"=>$row,"ta"=>$row2);
        $subJason =array("status"=>"success","result"=>$res);
       return  $subJason;

    }
    //retrieve courses on the system
    public function showCoursesOnTheSystem()
    {

        $c=DB::select('select * from course');;
        $subJason =array("status"=>"success","result"=>$c);
        return  $subJason;
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
        $co=Course::where('PASSCODE',$passCode)->where('COURSECODE',$courseCode)->count();

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
    //retreive slots which have this course
    public function  showscheduleforcourse($courscode){
        if(Course::find($courscode)=="")
        {
            $json = array("status"=>"failed","error_code"=>"8");
            return $json;
        }
        $slot = Slots::where('COURSECODE',$courscode)->get();
        $subJason =array("status"=>"success","result"=>$slot);
        return  $subJason;
    }

}
