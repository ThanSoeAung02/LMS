<?php

include_once __DIR__.'/../model/course.php';

class courseController extends Course {
    public function courses () {
        return $this->courseDetail();
    }

    public function getCourses () 
    {
        return $this->courseList();
    }


    public function getCourseNumber(){
        return $this->getCourseQuantity();
    }

    public function addNewCourse ($info) 
    {
        return $this->createNewCourse($info);
    }

    public function courseDetailById($id)
    {
        return $this->courseInfo($id);
    }

    public function editCourse($id,$info)
    {
        return $this->updateCourse($id,$info);
    }

    public function deleteCourseById($id)
    {
        return $this->deleteCourse($id);
    }
}

?>