<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../controller/batchController.php';

 $batch_controller = new batchController();
 $batches = $batch_controller->batch();


?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Batch</strong> Dashboard</h1>

                    <?php
                    
                        if (isset($_GET['addStatus']) && $_GET['addStatus'] == true)
                        {
                            echo "<small class='text-success'>New Batch has been successfully added</small>";
                        }

                    ?>

                    <?php
                    
                        if (isset($_GET['updateStatus']) && $_GET['updateStatus'] == true)
                        {
                            echo "<small class='text-success'>Batch has been successfully updated</small>";
                        }

                    ?>

                    
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <a href="addBatch.php" class='btn btn-primary'>Add New Batch</a>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class='table table-striped' id='batchTable'>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Start Date</th>
                                        <th>Duration</th>
                                        <th>Fee</th>
                                        <!-- <th>Discount</th> -->
                                        <th>Course Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $count = 1;
                                        foreach($batches as $batch)
                                        {
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td> <?php echo $batch['name']; ?> </td>
                                        <td> <?php echo $batch['start_date']; ?> </td>
                                        <td> <?php echo $batch['duration']; ?> </td>
                                        <td> <?php echo $batch['fee']; ?> </td>
                                        <td> <?php echo $batch['course_type']; ?> </td>
                                        <td id="<?php echo $batch['id']; ?>">
                                            <a href="editBatch.php?id=<?php echo $batch['id'];?>" class="btn  btn-warning me-2">Edit</a>
                                            <button class="btn btn-danger  batch_delete">Delete</button>
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