<?php
    session_name("imobiliaria_pc");
    session_start();

    if(!isset($_SESSION["token"])){
        session_destroy();
        header("Location: ../login.php?msg=Erro de sessão!");
       // die();
    }


    include_once '../controller/conexao.php';
    include_once '../controller/classImagem.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Imagem($db);
    $item->codigo = isset($_GET['codigo']) ? $_GET['codigo'] : header("Location: home.php?msg=Erro ao tentar alterar, tente novamente!") ;
    $temp = $item->getImagem();
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
        <h2>Adicionar Matrícula</h2>

        <?php
            if(isset($_GET['msg'])){
                echo '<div class="alert alert-primary" role="alert">';
                echo $_GET['msg'];
                echo '</div>';
            }
        ?>
        
        <form action="../controller/addImagem.php" method="post" enctype="multipart/form-data">

            <div class="input-field">
                <label>Código do Imovél:</label>
                <label>
                    <?php echo $item->codigo; ?>
                    <input type="hidden" name="codigo" id="codigo" placeholder="Código imovél" value="<?php echo $item->codigo; ?>" >
                </label>
            </div>

            <div class="input-field">
                <label for="imagem">Imagem:</label>
                <input type="file" name="imagem" accept="image/*" />
            </div>

            
            <input type="submit" value="Gravar">
        </form>


        <div class="box_tabela">

            <table class="table table-striped">
                <thead>
                    <tr> 
                        <td>Código</td>
                        <td>Imagem</td>
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
                                        <td>'.$imagem.'</td>
                                        <td>
                                           <a href="../controller/deleteImagem.php?id='.$id.'&codigo='.$codigo.'" class="btn btn-danger">Apagar</a>
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