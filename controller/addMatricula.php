<?php

    include_once 'conexao.php';
    include_once 'classMatricula.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Matricula($db);

    $item->codigo = $_POST['codigo']; 
    $item->matricula = $_POST['matricula']; 
    
    if($item->createMatricula()){
        header('location:../admin/home.php?msg=Cadastro de matricula efetuado.');
    } else{
        header('location:../admin/home.php?msg=Erro ao processar o cadastro da matricula.');
    }


?>