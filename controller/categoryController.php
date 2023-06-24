<?php

    include_once __DIR__.'/../model/category.php';

    class categoryController extends Category {
        public function getCategories(){
            return $this->getCategoriesList();
        }

        public function addCategory ($name) 
        {
            return $this->createCategory($name);
        }

        public function getCategoryById($id)
        {
            return $this->showCategory($id);
        }

        public function editCategory($id,$name)
        {
            return $this->updateCategory($id,$name);
        }

        public function deleteCategoryById($id)
        {
            return $this->deleteCategory($id);
        }
    }



?>