<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../controller/courseController.php';
 include_once __DIR__.'/../controller/categoryController.php';

 $id = $_GET['id'];

 $cat_controller = new categoryController();
 $catName = $cat_controller->getCategories();


 $course_controller = new courseController();
 $courseInfo = $course_controller->courseDetailById($id);









 if (isset($_POST['submit'])) 
 {

    if(empty($_POST['name']))
        $nameError = 'Please Enter Course Name';

    if(empty($_POST['catId']))
        $catIdError = 'Please Select Category';

    if(empty($_POST['outline']))
        $outlineError = 'Please Enter Course Outline';

    if (empty($_POST['name']) || empty($_POST['catId']) || empty($_POST['outline']))
    {
        $errorCondition = true;
    }
    else 
    {
        $name = $_POST['name'];
        $catId = $_POST['catId'];
        $outline = $_POST['outline'];
        $info = [
            'name'=>$name,
            'catId'=>$catId,
            'outline'=>$outline,
        ];


        $updateStatus =$course_controller->editCourse($id,$info);
        if ($updateStatus == true ) 
        {
            echo "<script>location.href = 'course.php?updateStatus=".$updateStatus."'</script>";
        }else {
            echo "<script>location.href = 'course.php?updateStatus=".$updateStatus."'</script>";
        }
    }

    
 }

?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Edit </strong> Course</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method='post'>


                                <div class='my-3'>
                                    <label  class="form-label">Name</label>
                                    <input type="text"  value="<?php if (isset($_POST['name'])) echo $_POST['name']; else echo $courseInfo['name'];?>" name='name' class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($nameError)) echo $nameError ?></span>
                                </div>

                                <div class='my-3'>
                                    <label  class="form-label">Category Name</label>
                                    <select name="catId" class='form-select'>
                                        <option value="" disabled>Select Category Name</option>
                                        <?php
                                            foreach($catName as $category)
                                            {
                                        ?>

                                        <option value="<?php echo $category['id']?>" <?php if (isset($_POST['catId'])) {if ($_POST['catId'] == $category['id'])  echo 'selected';} else {if(($courseInfo['cat_id'] == $category['id'])) echo 'selected';}?>>
                                                <?php echo $category['name'];?>
                                        </option>

                                        <?php
                                        
                                            }
                                        
                                        ?>
                                    </select>
                                </div>


                                <div class='my-3'>
                                    <label  class="form-label">Course Outline</label>
                                    <textarea name="outline" cols="30" rows="10" class="form-control"><?php if (isset($_POST['name'])) echo $_POST['outline']; else echo $courseInfo['outline'];?></textarea>
                                    <span class="text-danger"><?php if($errorCondition && isset($outlineError)) echo $outlineError ?></span>
                                </div>

                                <div class='my-3'>
                                    <button type="submit" name = 'submit' class="btn btn-dark">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>


                </div>
            </main>

<?php

 include_once __DIR__.'/../layouts/app_footer.php';

?>