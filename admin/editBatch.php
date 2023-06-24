<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../controller/batchController.php';
 include_once __DIR__.'/../controller/courseController.php';

 $id = $_GET['id'];

 $course_controller = new courseController();
 $courses = $course_controller->courses();

 $batch_controller = new batchController();
 $batchInfo = $batch_controller->getBatchInfoById($id);

 if (isset($_POST['submit']))
 {

    if(empty($_POST['name']))
    $nameError = 'Please Enter Batch Name';

    if(empty($_POST['start_date']))
    $startDateError = 'Please select Batch Start Date';

    if(empty($_POST['duration']))
    $durationError = 'Please Enter Batch Duration';

    if(empty($_POST['fee']))
    $feeError = 'Please Enter Batch Fee';

    if(empty($_POST['discount']))
    $discountError = 'Please Enter Batch Discount';

    if(empty($_POST['course_id']))
    $courseIdError = 'Please Choose Type Of Course';

    if (empty($_POST['name']) || empty($_POST['start_date']) || empty($_POST['duration']) || empty($_POST['fee']) || empty($_POST['discount']) || empty($_POST['course_id'])) 
    {
        $errorCondition = true;
    }
    else 
    {
        $name = $_POST['name'];
        $start_date = $_POST['start_date'];
        $duration = $_POST['duration'];
        $fee = $_POST['fee'];
        $discount = $_POST['discount'];
        $course_id = $_POST['course_id'];

        $info = [
            'name' => $name,
            'start_date' => $start_date,
            'duration' => $duration,
            'fee' => $fee,
            'discount' => $discount,
            'course_id' => $course_id,
        ];

        $updateStatus = $batch_controller->editBatch($id,$info);

        if ($updateStatus)
        {
            echo "<script>location.href='batch.php?updateStatus=.$updateStatus.'</script>";
        }
    }
 }



?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Edit</strong> Batch</h1>


                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method='post'>

                                <div class='mt-3'>
                                    <label  class="form-label">Name</label>
                                    <input type="text" name='name' value="<?php if (isset($_POST['name'])) echo $_POST['name']; else echo $batchInfo['name'];?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($nameError)) echo $nameError ?></span>
                                </div>

                                <div class='mt-3'>
                                    <label  class="form-label">Start Date</label>
                                    <input type="date" name='start_date' value="<?php if (isset($_POST['start_date'])) echo $_POST['start_date']; else echo $batchInfo['start_date'];?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($startDateError)) echo $startDateError ?></span>
                                </div>

                                <div class='mt-3'>
                                    <label  class="form-label">Duration</label>
                                    <input type="text" name='duration' value="<?php if (isset($_POST['duration'])) echo $_POST['duration']; else echo $batchInfo['duration'];?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($durationError)) echo $durationError ?></span>
                                </div>

                                <div class='mt-3'>
                                    <label  class="form-label">Fee</label>
                                    <input type="number" name='fee' value="<?php if (isset($_POST['fee'])) echo $_POST['fee']; else echo $batchInfo['fee'];?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($feeError)) echo $feeError ?></span>
                                </div>

                                <div class='mt-3'>
                                    <label  class="form-label">Discount</label>
                                    <input type="number" name='discount' value="<?php if (isset($_POST['discount'])) echo $_POST['discount']; else echo $batchInfo['discount'];?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($discountError)) echo $discountError ?></span>
                                </div>

                                <div class='mt-3'>
                                    <label  class="form-label">Course Type</label>
                                    <select name="course_id" class="form-select">
                                        <option disabled>Choose Course Type</option>
                                        <?php
                                        foreach($courses as $course)
                                        {
                                        ?>

                                        <option value="<?php echo $course['id']?>" <?php if (isset($_POST['course_id'])) {if ($_POST['course_id'] == $course['id'])  echo 'selected';} else {if(($batchInfo['course_id'] == $course['id'])) echo 'selected';}?> > 
                                            <?php echo $course['name']?> 
                                        </option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>


                                <div class='mt-3'>
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