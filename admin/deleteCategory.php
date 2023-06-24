<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../layouts/app_footer.php';
 include_once __DIR__.'/../controller/categoryController.php';

 $id = $_POST['id'];



 $cat_controller = new categoryController();
 $deleteStatus = $cat_controller->deleteCategoryById($id);

 if ($deleteStatus) 
 {
     echo  "success";

 } else {
    echo  "You can't delete this category as it has related courses";
 }




?>