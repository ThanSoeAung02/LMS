<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../controller/courseController.php';

 $course_controller = new courseController();
 $courses = $course_controller->getCourses();



?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Course</strong> Dashboard</h1>

                    <?php
                    
                        if (isset($_GET['status']) && $_GET['status'] == true)
                        {
                            echo "<small class='text-success'>New Course has been successfully added</small>";
                        }

                    ?>

                    <?php
                    
                        if (isset($_GET['updateStatus']) && $_GET['updateStatus'] == true)
                        {
                            echo "<small class='text-success'>Course has been successfully updated</small>";
                        }

                    ?>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <a href="addCourse.php" class='btn btn-primary'>Add New Course</a>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class='table table-striped' id="courseTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Course Category</th>
                                        <th>Course Outline</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $count = 1;
                                     foreach($courses as $course)
                                     {
                                    ?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                        <td><?php echo $course['name']?></td>
                                        <td><?php echo $course['category_name']?></td>
                                        <td><?php echo $course['outline']?></td>
                                        <td id="<?php echo $course['id']?>">
                                            <a href="editCourse.php?id=<?php echo $course['id']?>" class="btn btn-warning me-2">Edit</a>
                                            <a href="" class="btn btn-danger course_delete">Delete</a>
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