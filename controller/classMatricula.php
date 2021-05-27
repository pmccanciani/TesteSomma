<?php

class Matricula {
        // Connection
        private $conn;

        // Table
        private $db_table = "matricula";

        // Columns
        public $codigo;
        public $matricula;

        // conexão 
        public function __construct($db){
            $this->conn = $db;
        }

        // todos registros 
        public function getMatricula(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . " where codigo = ? ";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->codigo);
            $stmt->execute();
            return $stmt;
        }
        
        public function createMatricula(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        codigo = :codigo,
                        matricula = :matricula
                    ";

            $stmt = $this->conn->prepare($sqlQuery);

            $this->codigo=htmlspecialchars(strip_tags($this->codigo));
            $this->matricula=htmlspecialchars(strip_tags($this->matricula));
            
            $stmt->bindParam(":codigo", $this->codigo);
            $stmt->bindParam(":matricula", $this->matricula);

            if($stmt->execute()){
                return true;
            }
            return false;

        }
        
        public function deleteMatricula(){
            $sqlMatQuery = "DELETE FROM " . $this->db_table . " 
                    WHERE 
                        codigo = :codigo 
                            and 
                        matricula = :matricula";
            $stmtMat = $this->conn->prepare($sqlMatQuery);
            $this->codigo=htmlspecialchars(strip_tags($this->codigo));
            $this->matricula=htmlspecialchars(strip_tags($this->matricula));

            $stmtMat->bindParam(":codigo", $this->codigo);
            $stmtMat->bindParam(":matricula", $this->matricula);

            if($stmtMat->execute()){
                return true;
            }
            return false;
        }

}

?>