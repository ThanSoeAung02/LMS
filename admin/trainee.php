<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../controller/traineeController.php';

 $trainee_controller = new traineeController();
 $trainees = $trainee_controller->trainee();

?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Trainee</strong> Dashboard</h1>

                    <?php
                    
                        if (isset($_GET['addStatus']) && $_GET['addStatus'] == true)
                        {
                            echo "<small class='text-success'>New Trainee has been successfully added</small>";
                        }

                    ?>

                    <?php
                    
                        if (isset($_GET['updateStatus']) && $_GET['updateStatus'] == true)
                        {
                            echo "<small class='text-success'>Trainee has been successfully updated</small>";
                        }

                    ?>

                    
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <a href="addTrainee.php" class='btn btn-primary'>Add New Trainee</a>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class='table table-striped' id='traineeTable'>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Education</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $count = 1;
                                        foreach($trainees as $trainee)
                                        {
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td> <?php echo $trainee['name']; ?> </td>
                                        <td> <?php echo $trainee['email']; ?> </td>
                                        <td> <?php echo $trainee['phone']; ?> </td>
                                        <td> <?php echo $trainee['city']; ?> </td>
                                        <td> <?php echo $trainee['education']; ?> </td>
                                        <td id='<?php echo $trainee['id']; ?>'>
                                            <a href="editTrainee.php?id=<?php echo $trainee['id'];?>" class="btn btn-warning me-2">Edit</a>
                                            <button class="btn btn-danger trainee_delete">Delete</button>
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