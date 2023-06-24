<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../controller/categoryController.php';

 $cat_controller = new categoryController();
 $categories = $cat_controller->getCategories();

?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Category</strong> Dashboard</h1>

                    <?php
                    
                        if (isset($_GET['status']) && $_GET['status'] == true)
                        {
                            echo "<small class='text-success'>New Category has been successfully added</small>";
                        }

                    ?>

                    <?php
                    
                        if (isset($_GET['updateStatus']) && $_GET['updateStatus'] == true)
                        {
                            echo "<small class='text-success'>Category has been successfully updated</small>";
                        }

                    ?>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <a href="addCategory.php" class='btn btn-primary'>Add New Category</a>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class='table table-striped' id='categoryTable'>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $count = 1;
                                     foreach($categories as $category)
                                     {
                                    ?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                        <td><?php echo $category['name']?></td>
                                        <td id="<?php echo $category['id'];?>">
                                            <a href="editCategory.php?id=<?php echo $category['id'];?>" class="btn btn-warning me-2">Edit</a>
                                            <button class="btn btn-danger category_delete">Delete</button>
                                        </td>
                                    </tr>

                                    <?php
                                     }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </main>

<?php

 include_once __DIR__.'/../layouts/app_footer.php';

?>