<?php
require 'connection.php';

class repository{
    private $conn; 

    function __construct()
    {
        $this->conn = new Connection();
    }

    public function query(){
        $query = "SELECT u.id, u.name, u.email, group_concat(c.name, ', ') as name_color FROM users u 
                  LEFT JOIN user_colors uc ON
                  u.id = uc.user_id
                  LEFT JOIN colors c on
                  c.id = uc.color_id
                  GROUP BY 1,2,3
                  ";
        $result = $this->conn->getConnection()->query($query);
        $result->setFetchMode(PDO::FETCH_INTO, new stdClass);
        return $result;
    }

    public function queryColors(){
        $query = "SELECT * FROM colors";
        $result = $this->conn->getConnection()->query($query);
        $result->setFetchMode(PDO::FETCH_INTO, new stdClass);
        return $result;
    }

    public function insert(object $dados){
        $sql = "INSERT OR IGNORE INTO users(name, email) VALUES (:name, :email)";    
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

    public function insertColor(array $dados){
        $user = $dados['id_user'];
        $colors = (array_key_exists('colors', $dados))? $dados['colors'] : [0];

        /*
        Inserção de Dado
        */
        $sqlInsert = "INSERT OR IGNORE INTO user_colors(user_id, color_id) VALUES (:user_id, :color_id)";    
        $stmtInsert = $this->conn->getConnection()->prepare($sqlInsert);
        
        foreach($colors as $color){ 

            if($this->consultaDadoVinculado($user, $color)){
                    continue;
            }

            $stmtInsert->bindValue(':user_id', $user, PDO::PARAM_INT); 
            $stmtInsert->bindValue(':color_id', $color,  PDO::PARAM_INT);
            $stmtInsert->execute();
        }
        $this->deleteColorUser($user, $colors);
    } 

    private function consultaDadoVinculado(int $user, int $color){
        $sqlConsulta = "SELECT * FROM user_colors WHERE user_id= :user_id and color_id= :color_id";
        $stmtConsulta = $this->conn->getConnection()->prepare($sqlConsulta);
               
        $stmtConsulta->bindValue(':user_id', $user, PDO::PARAM_INT);
        $stmtConsulta->bindValue(':color_id', $color, PDO::PARAM_INT); 
        $stmtConsulta->execute();
               
        if(count($stmtConsulta->fetchAll()) > 0){
            return true;
        }else{
            return false;
        }
    }

    private function deleteColorUser(int $user, array $colors){
        /**
         * Construção de matriz e conversão em cadeia de caracteres para uso do IN do DELETE
         */
        $placeholders = array_fill( 0, count($colors), '?' );
        $placeholderString = implode( ',', $placeholders );

        $sqlDelete = "DELETE FROM user_colors WHERE user_id= ? and color_id NOT IN (" . $placeholderString . ")";
        $stmtDelete = $this->conn->getConnection()->prepare($sqlDelete);
        $stmtDelete->bindValue(1, $user, PDO::PARAM_INT);
        
        $i = 2;
        foreach($colors as $color){
            $stmtDelete->bindValue($i++, $color, PDO::PARAM_INT);
        }
        $stmtDelete->execute(); 
    }
   
}
