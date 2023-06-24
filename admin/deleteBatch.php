<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../layouts/app_footer.php';
 include_once __DIR__.'/../controller/batchController.php';

 $id = $_POST['id'];



 $batch_controller = new batchController();
 $deleteStatus = $batch_controller->deleteBatchById($id);

 if ($deleteStatus) 
 {
     echo  "success";

 } else {
    echo  "You can't delete this category as it has related courses";
 }




?>