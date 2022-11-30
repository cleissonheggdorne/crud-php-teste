<?php
require 'Model/repository.php';

class Control{

    public function ctrlQuery()
    {
        $repo = new repository();
        $qry = $repo->query();
        return $qry;
    }
    public function ctrlInsert()
    {
        $repo = new repository();
       
    }
    public function ctrlDelete()
    {
        $repo = new repository();
    
    }
    public function ctrlUpdate($dados)
    {
        $repo = new repository();
        $repo->update($dados);
    }
}