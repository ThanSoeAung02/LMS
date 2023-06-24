<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../layouts/app_footer.php';
 include_once __DIR__.'/../controller/courseController.php';

 $id = $_POST['id'];



 $course_controller = new courseController();
 $deleteStatus = $course_controller->deleteCourseById($id);

 if ($deleteStatus) 
 {
     echo  "success";

 } else {
    echo  "You can't delete this category as it has related courses";
 }




?>