<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../controller/categoryController.php';

 $cat_controller = new categoryController();

 if (isset($_POST['submit'])) 
 {

    if(empty($_POST['name']))
        $nameError = 'Please Enter Category Name';

    if (empty($_POST['name']))
    {
        $errorCondition = true;
    }
    else 
    {
        $name = $_POST['name'];
        $status = $cat_controller->addCategory($name);
        if ($status == true ) 
        {
            echo "<script>location.href = 'category.php?status=".$status."'</script>";
        }
    }
 }

?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Add New </strong> Category</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method='post'>

                                <div>
                                    <label  class="form-label">Category Name</label>
                                    <input type="text" name='name' value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($nameError)) echo $nameError; ?></span>
                                </div>

                                <div class='mt-3'>
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