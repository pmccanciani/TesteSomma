<?php

    include_once 'conexao.php';
    include_once 'classImagem.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Imagem($db);

    $item->codigo = $_POST['codigo']; 

    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);

    if(isset($_FILES['imagem']))
    {
        $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
        $new_name = md5(date("Y.m.d-H.i.s")) . $ext; //Definindo um novo nome para o arquivo
        $dir = '../img/'; //Diretório para uploads 
        move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
        $item->imagem = $new_name;
    } 

    if($item->createImagem()){
        header('location:../admin/imagem.php?codigo='.$_POST['codigo'].'&msg=Cadastro de imagem efetuado.');
    } else{
        header('location:../admin/home.php?codigo='.$_POST['codigo'].'&msg=Erro ao processar o cadastro da imagem.');
    }

?>