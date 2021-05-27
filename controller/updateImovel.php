<?php

    include_once 'conexao.php';
    include_once 'classImoveis.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Imoveis($db);

    $item->id = $_POST['id']; 
    $item->codigo = $_POST['codigo']; 
    $item->categoria = $_POST['categoria']; 
    $item->titulo = $_POST['titulo']; 
    $item->descricao = $_POST['descricao']; 
    $item->dormitorios = $_POST['dormitorios']; 
    $item->banheiros = $_POST['banheiros']; 
    $item->garagens = $_POST['garagens']; 
    $item->valor = $_POST['valor']; 
    $item->condominio = $_POST['condominio']; 
    $item->iptu = $_POST['iptu']; 
    $item->cidade = $_POST['cidade']; 
    $item->bairro = $_POST['bairro']; 
    $item->metragem = $_POST['metragem']; 
    $item->ativo = $_POST['ativo']; 
    $item->versao = $_POST['versao']; 
    
    if($item->updateImoveis()){
        header('location:../admin/home.php?msg=Alteração efetuada.');
    } else{
        header('location:../admin/home.php?msg=Erro ao processar a alteração.');
    }




?>