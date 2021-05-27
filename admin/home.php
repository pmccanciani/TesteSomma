<?php
    session_name("imobiliaria_pc");
    session_start();

    if(!isset($_SESSION["token"])){
        session_destroy();
        header("Location: ../login.php?msg=Erro de sessão!");
  
    }

    include_once '../controller/conexao.php';
    include_once '../controller/classImoveis.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Imoveis($db);
    $temp = $item->getImoveis();
    $count = $temp->rowCount();



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painel.css">
    <title>Adicionar Imovél</title>
</head>
<body>
    <main class="admin">
        <h2>Painel ADM</h2>
    
        <?php
            if(isset($_GET['msg'])){
                echo '<div class="alert alert-primary" role="alert">';
                echo $_GET['msg'];
                echo '</div>';
            }
        ?>
        

        <div class="botoes"> 
            <a href="adicionar.php" class="btn btn-success">Novo Imovél</a>
            <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>

        <div class="box_tabela">

            <table class="table table-striped">
                <thead>
                    <tr> 
                        <td>Código</td>
                        <td>Título</td>
                        <td>Descrição</td>
                        <td>Ações</td>
                    </tr>
                </thead>    
                <tbody>
                    <?php 
                        if($count > 0){
                            while ($row = $temp->fetch(PDO::FETCH_ASSOC)){
                                extract($row);
                                echo '<tr> 
                                        <th scope="row">'.$codigo.'</th>
                                        <td>'.$titulo.'</td>
                                        <td>'. substr($descricao, 0, 100).'...</td>
                                        <td>
                                            <a href="alterar.php?id='.$id.'" class="btn btn-warning">Alterar</a>
                                            <a href="matricula.php?codigo='.$codigo.'" class="btn btn-info">Matriculas</a>
                                            <a href="imagem.php?codigo='.$codigo.'" class="btn btn-info">Imagens</a>
                                            <a href="../controller/deleteImovel.php?id='.$id.'" class="btn btn-danger">Apagar</a>
                                        </td>
                                    </tr>';

                            }

                        }

                    ?>
                </tbody>
            </tabela>


        </div>
        
    </main>
</body>