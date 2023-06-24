<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../layouts/app_footer.php';
 include_once __DIR__.'/../controller/instructorController.php';

 $id = $_POST['id'];



 $instructor_controller = new instructorController();
 $deleteStatus = $instructor_controller->deleteInstructorById($id);


 if ($deleteStatus) 
 {
    echo  "success";

 } else {
    echo  "You can't delete this category as it has related courses";
 }




?>