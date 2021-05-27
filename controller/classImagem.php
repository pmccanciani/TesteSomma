<?php

class Imagem {
        // Connection
        private $conn;

        // Table
        private $db_table = "imagens";

        // Columns
        public $id;
        public $codigo;
        public $imagem;

        // conexão 
        public function __construct($db){
            $this->conn = $db;
        }

        // todos registros 
        public function getImagem(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . " where codigo = ? ";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->codigo);
            $stmt->execute();
            return $stmt;
        }
        
        public function createImagem(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        codigo = :codigo,
                        imagem = :imagem
                    ";

            $stmt = $this->conn->prepare($sqlQuery);

            $this->codigo=htmlspecialchars(strip_tags($this->codigo));
            $this->imagem=htmlspecialchars(strip_tags($this->imagem));
            
            $stmt->bindParam(":codigo", $this->codigo);
            $stmt->bindParam(":imagem", $this->imagem);

            if($stmt->execute()){
                return true;
            }
            return false;

        }
        
        public function deleteImagem(){
            $sqlMatQuery = "DELETE FROM " . $this->db_table . " 
                    WHERE 
                        id = :id ";
            $stmtMat = $this->conn->prepare($sqlMatQuery);
            $this->id=htmlspecialchars(strip_tags($this->id));

            $stmtMat->bindParam(":id", $this->id);

            if($stmtMat->execute()){
                return true;
            }
            return false;
        }

}

?>