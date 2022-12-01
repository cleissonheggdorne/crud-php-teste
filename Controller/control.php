<?php
require 'Model/repository.php';

class Control{

    public function ctrlQuery()
    {
        $repo = new repository();
        $qry = $repo->query();
        return $qry;
    }
    public function ctrlInsert($dados)
    {
        $dados = (object) $dados;
        $repo = new repository();
        $repo->insert($dados);
       
    }
    public function ctrlDelete($dados)
    {
        $dados = (object) $dados;
        $repo = new repository();
        $repo->delete($dados);
    
    }
    public function ctrlUpdate($request)
    {
        $dados = (object) $request;
        $repo = new repository();
        $repo->update($dados);
    }
}