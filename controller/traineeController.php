<?php 

include_once __DIR__.'/../model/trainee.php';

class traineeController extends Trainee 
{
    // get all trainee data
    public function trainee()
    {
        return $this->traineeList();
    }

    //add trainee 
    public function addTrainee($info)
    {
        return $this->createTrainee($info);
    }

    public function getTraineeById($id)
    {
        return $this->getTraineeInfo($id);
    }

    public function editTrainee($id,$info)
    {
        return $this->updateTrainee($id,$info);
    }

    public function deleteTraineeById($id)
    {
        return $this->deleteTrainee($id);
    }
}


?>