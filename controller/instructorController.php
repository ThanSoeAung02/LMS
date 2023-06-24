<?php

    include_once __DIR__.'/../model/instructor.php';


     class instructorController extends Instructor {
        public function instructorName () {
            return $this->instructorList();
        }

        public function addInstructor($info) {
            return $this->createInstructor($info);
        }

        public function getInstructorById($id) 
        {
            return $this->showInstructor($id);
        }

        public function editInstructor($id,$info)
        {
            return $this->updateInstructor($id,$info);
        }

        public function deleteInstructorById($id)
        {
            return $this->deleteInstructor($id);
        }
     }

?>