<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../layouts/app_footer.php';
 include_once __DIR__.'/../controller/traineeController.php';

 $id = $_POST['id'];



 $trainee_controller = new traineeController();
 $deleteStatus = $trainee_controller->deleteTraineeById($id);

 if ($deleteStatus) 
 {
     echo  "success";

 } else {
    echo  "You can't delete this category as it has related courses";
 }




?>