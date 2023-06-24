<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../controller/traineeController.php';

 $trainee_controller = new traineeController();

 if (isset($_POST['submit'])) 
 {

    if(empty($_POST['name']))
        $nameError = 'Please Enter Trainee Name';

    if(empty($_POST['email']))
        $emailError = 'Please Enter Email Address';

    if(empty($_POST['phone']))
        $phoneError = 'Please Enter Phone Number';

    if(empty($_POST['city']))
        $cityError = 'Please Enter City Name';

    if(empty($_POST['education']))
        $educationError = 'Please Enter Education Level';

    if(empty($_POST['remark']))
        $remarkError = 'Please Enter Remark';

    if(empty($_POST['status']))
        $statusError = 'Please Choose Type Of Status';

    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['city']) || empty($_POST['education']) || empty($_POST['remark']) || empty($_POST['status']))
    {
        $errorCondition = true;
    }
    else 
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $education = $_POST['education'];
        $remark = $_POST['remark'];
        $status = $_POST['status'];

        $info = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'city' => $city,
            'education' => $education,
            'remark' => $remark,
            'status' => $status,
        ];



        $addStatus =$trainee_controller->addTrainee($info);
        if ($addStatus == true ) 
        {
            echo "<script>location.href = 'trainee.php?addStatus=".$addStatus."'</script>";
        }else {
            echo "<script>location.href = 'trainee.php?addStatus=".$addStatus."'</script>";
        }
    }
 }

?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-2"><strong>Add New </strong> Trainee</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method='post'>

                                <div class='mt-3'>
                                    <label  class="form-label">Name</label>
                                    <input type="text" name='name' value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($nameError)) echo $nameError ?></span>
                                </div>

                                <div class='mt-3'>
                                    <label  class="form-label">Email</label>
                                    <input type="email" name='email' value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($emailError)) echo $emailError ?></span>
                                </div>

                                <div class='mt-3'>
                                    <label  class="form-label">Phone</label>
                                    <input type="number" name='phone' value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($phoneError)) echo $phoneError ?></span>
                                </div>

                                <div class='mt-3'>
                                    <label  class="form-label">City</label>
                                    <input type="text" name='city' value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($cityError)) echo $cityError ?></span>
                                </div>

                                <div class='mt-3'>
                                    <label  class="form-label">Education</label>
                                    <input type="text" name='education' value="<?php if(isset($_POST['education'])) echo $_POST['education']; ?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($educationError)) echo $educationError ?></span>
                                </div>

                                <div class='mt-3'>
                                    <label  class="form-label">Remark</label>
                                    <input type="text" name='remark' value="<?php if(isset($_POST['remark'])) echo $_POST['remark']; ?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($remarkError)) echo $remarkError ?></span>
                                </div>

                                <div class='mt-3'>
                                    <label  class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="" disabled selected>Choose Status</option>
                                        <option value="online" <?php if ($_POST['status'] == 'online') echo 'selected'; ?> </option> Online </option>
                                        <option value="offline" <?php if ($_POST['status'] == 'offline') echo 'selected'; ?> > Offline </option>
                                    </select>
                                    <span class="text-danger"><?php if($errorCondition && isset($statusError)) echo $statusError ?></span>
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