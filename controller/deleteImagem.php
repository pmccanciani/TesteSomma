<?php

    include_once 'conexao.php';
    include_once 'classImagem.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Imagem($db);

    $item->id = $_GET['id']; 
    $item->codigo = $_GET['codigo']; 
    
    if($item->deleteImagem()){
        header('location:../admin/Imagem.php?codigo='.$item->codigo.'&msg=Imagem excluida.');
    } else{
        header('location:../admin/Imagem.php?codigo='.$item->codigo.'&msg=Erro ao processar a exclusão da imagem.');
    }


?>