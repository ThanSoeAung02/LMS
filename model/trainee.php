<?php
include_once __DIR__.'/../vendor/db/database.php';

 class Trainee 
 {
    // get all trainee list 
    public function traineeList()
    {
        //db connect 
        $con = Database::connect();

        //write sql
        $sql = 'select * from trainee';
        $statement  = $con->prepare($sql);

        //sql execute 
        if($statement->execute()) 
        {
           //fetch result
           $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    //create trainee 
    public function createTrainee($info)
    {
        //db connect 
        $con = Database::connect();

        //write sql
        $sql = 'insert into trainee (name,email,phone,city,education,remark,status) 
                values(:name,:email,:phone,:city,:education,:remark,:status)';

        $statement = $con->prepare($sql);

        // binding parameters
        $statement->bindParam(':name',$info['name']);
        $statement->bindParam(':email',$info['email']);
        $statement->bindParam(':phone',$info['phone']);
        $statement->bindParam(':city',$info['city']);
        $statement->bindParam(':education',$info['education']);
        $statement->bindParam(':remark',$info['remark']);
        $statement->bindParam(':status',$info['status']);

        //sql execute
        if ($statement->execute())
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function getTraineeInfo($id)
    {
        // db connect 
        $con = Database::connect();

        //write sql
        $sql = 'select * from trainee where id = :id';
        $statement = $con->prepare($sql);
        $statement->bindParam(':id',$id);

        //sql execute 
        if ($statement->execute())
        {
            // fetch data
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function updateTrainee($id,$info)
    {
        //db connect 
        $con = Database::connect();

        //write sql 
        $sql = 'update trainee 
                set name = :name , email = :email , phone = :phone , city = :city, education = :education , remark = :remark , status = :status
                where id = :id';

        $statement = $con->prepare($sql);

        $statement->bindParam(':id',$id);
        $statement->bindParam(':name',$info['name']);
        $statement->bindParam(':email',$info['email']);
        $statement->bindParam(':phone',$info['phone']);
        $statement->bindParam(':city',$info['city']);
        $statement->bindParam(':education',$info['education']);
        $statement->bindParam(':remark',$info['remark']);
        $statement->bindParam(':status',$info['status']);

        //sql execute 
        if ($statement->execute())
        {
            return true;
        }
        else 
        {
            return false;
        }

    }

    public function deleteTrainee($id)
    {
        //db connect 
        $con = Database::connect();

        //write sql 
        $sql = 'delete from trainee where id = :id';

        $statement = $con->prepare($sql);

        $statement->bindParam(':id',$id);

        //sql execute 
        if ($statement->execute())
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
 }

?>