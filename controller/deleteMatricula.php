<?php

    include_once 'conexao.php';
    include_once 'classMatricula.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Matricula($db);

    $item->codigo = $_GET['codigo']; 
    $item->matricula = $_GET['matricula']; 
    
    if($item->deleteMatricula()){
        header('location:../admin/matricula.php?codigo='.$item->codigo.'&msg=Matrícula excluida.');
    } else{
        header('location:../admin/matricula.php?codigo='.$item->codigo.'&msg=Erro ao processar a exclusão da matrícula.');
    }


?>