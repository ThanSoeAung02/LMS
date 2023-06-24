<?php

include_once __DIR__.'/../vendor/db/database.php';

 class Category {
    public function getCategoriesList () {
        // 1.db connect
        $con = Database::connect();

        // 2 write sql
        $sql = 'select * from category';
        $statement = $con->prepare($sql);

        // 3 sql execute 
        if($statement->execute())
        {
            // 4 result
            // data fetch() => one row , fetchAll() => multiple rows
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        }
        return $result;
    }


    public function createCategory($name) 
    {
        // db connect 
        $con = Database::connect();


        //write sql
        $sql = "insert into category(name) values(:name)";
        $statement  = $con->prepare($sql);
        $statement->bindParam(':name',$name);

        //sql execute 
        if($statement->execute())
        {
            return true;

        }else {

            return false;
        }
        
    }


    public function showCategory($id)
    {
         // 1.db connect
         $con = Database::connect();

         // 2 write sql
         $sql = 'select * from category where id = :id ';
         $statement = $con->prepare($sql);
         $statement->bindParam(':id',$id);
 
         // 3 sql execute 
         if($statement->execute())
         {
             // 4 result
             // data fetch() => one row , fetchAll() => multiple rows
             $result = $statement->fetch(PDO::FETCH_ASSOC);
 
         }
         return $result;
    }

    public function updateCategory($id,$name)
    {
         // 1.db connect
         $con = Database::connect();

         // 2 write sql
         $sql = 'update category set name = :name where id = :id';
         $statement = $con->prepare($sql);
         $statement->bindParam(':id',$id);
         $statement->bindParam(':name',$name);
 
         // 3 sql execute 
         if($statement->execute())
         {
            return true;
         }else {
            return false;
         }
    }

    public function deleteCategory($id)
    {
        // 1.db connect
        $con = Database::connect();

        // 2 write sql
        $sql = 'delete from category where id = :id';
        $statement = $con->prepare($sql);
        $statement->bindParam(':id',$id);

        // 3 sql execute 
        try 
        {
            $statement->execute();
            return true;
        }
        catch (PDOExecption $e)
        {
            return false;
        }
    }
 }




?>