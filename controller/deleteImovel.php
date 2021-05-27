<?php

    include_once 'conexao.php';
    include_once 'classImoveis.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Imoveis($db);

    $item->id = $_GET['id']; 
    
    if($item->deleteImoveis()){
        header('location:../admin/home.php?msg=Cadastro excluido.');
    } else{
        header('location:../admin/home.php?msg=Erro ao processar a exclusão.');
    }




?>