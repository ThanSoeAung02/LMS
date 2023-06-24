<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../controller/instructorController.php';

 $instructor_controller = new instructorController();

 if (isset($_POST['submit'])) 
 {
    if(empty($_POST['name']))
        $nameError = 'Please Enter Instructor Name';

    if(empty($_POST['email']))
        $emailError = 'Please Enter Email Address';

    if(empty($_POST['phone']))
        $phoneError = 'Please Enter Phone Number';

    if(empty($_POST['address']))
        $addressError = 'Please Enter Address';

    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['address']))
    {
        $errorCondition = true;
    }
    else 
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $info = [
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address,
        ];

        $status =$instructor_controller->addInstructor($info);
        if ($status == true ) 
        {
            echo "<script>location.href = 'instructor.php?status=".$status."'</script>";
        }else {
            echo "<script>location.href = 'instructor.php?status=".$status."'</script>";
        }
    }
 }

?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Add New </strong> Instructor</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method='post'>

                                <div>
                                    <label  class="form-label">Name</label>
                                    <input type="text" name='name' value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($nameError)) echo $nameError; ?></span>
                                </div>

                                <div>
                                    <label  class="form-label">Email</label>
                                    <input type="email" name='email' value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($emailError)) echo $emailError; ?></span>
                                </div>

                                <div>
                                    <label  class="form-label">Phone</label>
                                    <input type="number" name='phone' value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($phoneError)) echo $phoneError; ?></span>
                                </div>

                                <div>
                                    <label  class="form-label">Address</label>
                                    <input type="text" name='address' value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>" class="form-control">
                                    <span class="text-danger"><?php if($errorCondition && isset($addressError)) echo $addressError; ?></span>
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