<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../controller/courseController.php';
 include_once __DIR__.'/../controller/categoryController.php';

 $cat_controller = new categoryController();
 $catName = $cat_controller->getCategories();







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


        $course_controller = new courseController();
        $status =$course_controller->addNewCourse($info);
        if ($status == true ) 
        {
            echo "<script>location.href = 'course.php?status=".$status."'</script>";
        }else {
            echo "<script>location.href = 'course.php?status=".$status."'</script>";
        }
    }
 }

?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Add New </strong> Course</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method='post'>

                                <div class='my-3'>
                                    <label  class="form-label">Name</label>
                                    <input type="text" name='name' value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($nameError)) echo $nameError; ?></span>
                                </div>

                                <div class='my-3'>
                                    <label  class="form-label">Category Name</label>
                                    <select name="catId" class='form-select'>
                                        <option value="" disabled selected>Select Category Name</option>
                                        <?php
                                            foreach($catName as $category)
                                            {
                                        ?>
                                        <option value="<?php echo $category['id'];?>" <?php if($_POST['catId'] == $category['id']) echo 'selected';?> >
                                                <?php echo $category['name']; ?>
                                        </option>
                                        <?php
                                        
                                            }
                                        
                                        ?>
                                    </select>
                                    <span class="text-danger"><?php if($errorCondition && isset($catIdError)) echo $catIdError; ?></span>
                                </div>


                                <div class='my-3'>
                                    <label  class="form-label">Course Outline</label>
                                    <textarea name="outline" cols="30" rows="10" class="form-control"><?php if(isset($_POST['outline'])) echo $_POST['outline']; ?></textarea>
                                    <span class="text-danger"><?php if($errorCondition && isset($outlineError)) echo $outlineError; ?></span>
                                </div>

                                <div class='my-3'>
                                    <button type="submit" name = 'submit' class="btn btn-dark">Add</button>
                                </div>

                            </form>
                        </div>
                    </div>


                </div>
            </main>

<?php

 include_once __DIR__.'/../layouts/app_footer.php';

?>