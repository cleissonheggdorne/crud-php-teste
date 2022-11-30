<?php
require 'connection.php';

class repository{
    private $conn; 

    function __construct()
    {
        $this->conn = new Connection();
    }

    public function query(){
        return($this->conn->query("SELECT * FROM users"));
    }

    public function insert(){
    }

    public function delete(){
    }

    public function update($dados){
        $sql = "UPDATE users SET name = :name AND email= :email";    
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(':name', $dados->name, PDO::PARAM_STR); 
        $stmt->bindValue(':email', $dados->email,  PDO::PARAM_STR );
        $stmt->execute();
        
        //$dadosRetornados = $stmt->fetch(PDO::FETCH_ASSOC);
        
    }
   
}
