<?php
    include_once __DIR__.'/../vendor/db/database.php';


    class Instructor {
        public function instructorList () {
             // db connect 
             $con = Database::connect();

             // write sql
             $sql = 'select * from instructor';
             $statement = $con->prepare($sql);

             //sql execute 
             if($statement->execute()) 
             {
                //fetch result
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
             }

             return $result;

        }

        public function createInstructor($info) 
        {
            // db connect 
            $con = Database::connect();

            // write sql
            $sql = "insert into instructor(name,email,phone,address) values (:name,:email,:phone,:address)";
            $statement = $con->prepare($sql);
            $statement->bindParam(':name',$info['name']);
            $statement->bindParam(':email',$info['email']);
            $statement->bindParam(':phone',$info['phone']);
            $statement->bindParam(':address',$info['address']);

            //sql execute 
            if ($statement->execute())
            {
                return true;

            } else {
                
                return false;
            }
        }

        public function showInstructor($id)
        {
            // db connect 
            $con = Database::connect();

            // write sql
            $sql = "select * from instructor where id = :id";
            $statement = $con->prepare($sql);
            $statement->bindParam(':id',$id);
            
            if($statement->execute()) 
             {
                //fetch result
                $result = $statement->fetch(PDO::FETCH_ASSOC);
             }

             return $result;
        }

        public function updateInstructor($id,$info)
        {
            // db connect 
            $con = Database::connect();

            // write sql
            $sql = "update instructor set name= :name, email = :email , phone = :phone , address= :address where id = :id";
            $statement = $con->prepare($sql);
            $statement->bindParam(':id',$id);
            $statement->bindParam(':name',$info['name']);
            $statement->bindParam(':email',$info['email']);
            $statement->bindParam(':phone',$info['phone']);
            $statement->bindParam(':address',$info['address']);

            if ($statement->execute())
            {
                return true;
            }else {
                return false;
            }
        }

        public function deleteInstructor($id)
        {
            // db connect 
            $con = Database::connect();

            // write sql
            $sql = "delete from instructor where id = :id";
            $statement = $con->prepare($sql);
            $statement->bindParam(':id',$id);

            if ($statement->execute())
            {
                return true;
            }else {
                return false;
            }
        }
    }

?>