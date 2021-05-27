<?php

    include_once 'conexao.php';

    class Autenticacao{
        
        private $conn;
        private $db_table = 'usuario';
        public $id;
        public $token;

        public function __construct($db){
            $this->conn = $db;
        }

        public function getAutenticacao(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . " where token =  :token  ";
                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->bindParam(":token", $this->token);
                $stmt->execute();
                return $stmt;

        }
    }


    $token = md5(htmlspecialchars(strip_tags($_POST['token'])));

    $database = new Database();
    $db = $database->getConnection();
    $items = new Autenticacao($db);
    $items->token = isset($_POST['token']) ? $token : die();
    $stmt = $items->getAutenticacao();
    $itemCount = $stmt->rowCount();


    echo json_encode($itemCount);
    if($itemCount > 0){

        session_name("imobiliaria_pc");
		session_start();
        $_SESSION['token'] = $token;
        header('location:../admin/home.php');

    }else{
        session_name("imobiliaria_pc");
        session_start();
        session_destroy();

        header('location:../login.php?msg=Erro no token');
       
    }

?>