<?php

include_once __DIR__.'/../vendor/db/database.php';


class Model 
{
    public function batchList()
    {
        //db connect 
        $con = Database::connect();

        //write sql 
        $sql = 'select batch.*,course.name as course_type 
                from batch join course
                on batch.course_id = course.id';
        $statement = $con->prepare($sql);

        //sql execute
        if ($statement->execute())
        {
            // fetch data
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function batchInfo($id)
    {
        //db connect 
        $con = Database::connect();

        //write sql 
        $sql = 'select *
                from batch 
                where batch.id = :id';

        $statement = $con->prepare($sql);
        
        $statement->bindParam(':id',$id);

        //sql execute 
        if ($statement->execute())
        {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function updateBatch($id,$info)
    {
        //db connect 
        $con = Database::connect();

        //write sql 
        $sql = 'update batch 
                set name = :name, start_date = :start_date, duration = :duration, fee = :fee, discount = :discount, course_id = :course_id
                where id = :id';

        $statement = $con->prepare($sql);

        $statement->bindParam(':id',$id);
        $statement->bindParam(':name',$info['name']);
        $statement->bindParam(':start_date',$info['start_date']);
        $statement->bindParam(':duration',$info['duration']);
        $statement->bindParam(':fee',$info['fee']);
        $statement->bindParam(':discount',$info['discount']);
        $statement->bindParam(':course_id',$info['course_id']);

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

    public function createBatch($info)
    {
        //db connect 
        $con = Database::connect();

        //write sql
        $sql = 'insert into 
                batch(name,start_date,duration,fee,discount,course_id) 
                values(:name,:start_date,:duration,:fee,:discount,:course_id)';

        $statement = $con->prepare($sql);

        $statement->bindParam(':name',$info['name']);
        $statement->bindParam(':start_date',$info['start_date']);
        $statement->bindParam(':duration',$info['duration']);
        $statement->bindParam(':fee',$info['fee']);
        $statement->bindParam(':discount',$info['discount']);
        $statement->bindParam(':course_id',$info['course_id']);

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

    public function deleteBatch($id)
    {
        //db connect 
        $con = Database::connect();

        //write sql 
        $sql = 'delete from batch where id = :id';
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