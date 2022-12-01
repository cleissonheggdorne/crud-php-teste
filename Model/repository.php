<?php
require 'connection.php';

class repository{
    private $conn; 

    function __construct()
    {
        $this->conn = new Connection();
    }

    public function query(){
        $query = "SELECT * FROM users";
        $result = $this->conn->getConnection()->query($query);
        $result->setFetchMode(PDO::FETCH_INTO, new stdClass);
        return $result;
    }

    public function insert(object $dados){
        $sql = " INSERT INTO users(name, email) VALUES (:name, :email)";    
        $stmt = $this->conn->getConnection()->prepare($sql);

        $stmt->bindValue(':name', $dados->name, PDO::PARAM_STR); 
        $stmt->bindValue(':email', $dados->email,  PDO::PARAM_STR );

        $stmt->execute();
       
    } 

    public function delete(object $dados){
        $sql = "DELETE FROM users WHERE id= :id";    
        $stmt = $this->conn->getConnection()->prepare($sql);

        $stmt->bindValue(':id', $dados->id,  PDO::PARAM_STR );

        $stmt->execute();        
    }

    public function update(object $dados){
        $sql = "UPDATE users SET name = :name, email= :email WHERE id= :id";    
        $stmt = $this->conn->getConnection()->prepare($sql);

        $stmt->bindValue(':name', $dados->name, PDO::PARAM_STR); 
        $stmt->bindValue(':email', $dados->email,  PDO::PARAM_STR );
        $stmt->bindValue(':id', $dados->id,  PDO::PARAM_STR );

        $stmt->execute();        
    }
   
}
