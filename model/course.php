<?php

 include_once __DIR__.'/../vendor/db/database.php';


 class Course {
    public function courseDetail () {
        // db connect 
        $con = Database::connect();

        //write sql
        $sql = 'select * from course';

        $statement = $con->prepare($sql);

        //sql execute
        if($statement->execute())
        {
            //fetch result
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function getCourseQuantity() {
        // db connect 
        $con = Database::connect();

        //write sql
        $sql = 'select category.name,count(course.id) as total from course join category on course.cat_id = category.id group by course.cat_id';
        $statement  = $con->prepare($sql);

        //sql execute 
        if($statement->execute())
        {

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;

    }

    public function courseList () {
        // db connect 
        $con = Database::connect();

        //write sql
        $sql = 'SELECT course.id,course.name,category.name as category_name,course.outline
        FROM course JOIN category
        ON course.cat_id = category.id ';

        $statement = $con->prepare($sql);

        //sql execute
        if($statement->execute())
        {
            //fetch result
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function createNewCourse($info)
    {
         // db connect 
         $con = Database::connect();

         //wrtie sql 
         $sql = 'insert into course(name,cat_id,outline) values (:name,:catId,:outline)';
         $statement = $con->prepare($sql);
         $statement->bindParam(':name',$info['name']);
         $statement->bindParam(':catId',$info['catId']);
         $statement->bindParam(':outline',$info['outline']);

        //sql execute
        if($statement->execute())
        {
           return true;
        }else {
            return false;
        }
    }

    public function courseInfo($id)
    {
        // db connect 
        $con = Database::connect();

        //write sql
        $sql = 'SELECT * from course where id = :id';

        $statement = $con->prepare($sql);
        $statement->bindParam(':id',$id);

        //sql execute
        if($statement->execute())
        {
            //fetch result
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function updateCourse($id,$info)
    {
        // db connect 
        $con = Database::connect();

        //write sql
        $sql = 'update course set name = :name,cat_id = :catId,outline = :outline where id = :id';

        $statement = $con->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->bindParam(':name',$info['name']);
        $statement->bindParam(':catId',$info['catId']);
        $statement->bindParam(':outline',$info['outline']);

        //sql execute 
        if ($statement->execute())
        {
            return true;
        }else {
            return false;
        }
    }

    public function deleteCourse($id)
    {
        // db connect 
        $con = Database::connect();

        //write sql
        $sql = 'delete from course where id = :id';

        $statement = $con->prepare($sql);
        $statement->bindParam(':id',$id);

        //sql execute 
        if ($statement->execute())
        {
            return true;
        }else {
            return false;
        }
    }
 }

?>