<?php

include_once __DIR__.'/../model/batch.php';

class batchController extends Model 
{
    public function batch()
    {
        return $this->batchList();
    }

    public function getBatchInfoById($id)
    {
        return $this->batchInfo($id);
    }

    public function editBatch($id,$info)
    {
        return $this->updateBatch($id,$info);
    }

    public function addBatch($info)
    {
        return $this->createBatch($info);
    }

    public function deleteBatchById($id)
    {
        return $this->deleteBatch($id);
    }
}



?>