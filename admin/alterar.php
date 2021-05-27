<?php
    session_name("imobiliaria_pc");
    session_start();

    if(!isset($_SESSION["token"])){
        session_destroy();
        header("Location: ../login.php?msg=Erro de sessão!");
       // die();
    }


    include_once '../controller/conexao.php';
    include_once '../controller/classImoveis.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Imoveis($db);
    $item->id = isset($_GET['id']) ? $_GET['id'] : header("Location: home.php?msg=Erro ao tentar alterar, tente novamente!") ;
    $item->getUniImoveis();

    if($item->codigo == null){
        header("Location: home.php?msg=Erro ao tentar alterar, tente novamente!");
    } 

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
        <h2>Adicionar novo imovél</h2>
        <form action="../controller/updateImovel.php" method="post">

            <div class="input-field">
                <label>Código do Imovél:</label>
                <label>
                    <input type="text" name="codigo" id="codigo" placeholder="Código imovél" value="<?php echo $item->codigo; ?>">
                </label>
            </div>

            <div class="input-field">
                <label>Categória:</label>
                <label>
                    <select name="categoria" id="categoriaselect-native-6" >
                        <option value="Alugar"<?php echo ($item->codigo == 'Alugar' ? 'selected' : ''); ?>>Alugar</option>
                        <option value="Vender"<?php echo ($item->codigo == 'Vender' ? 'selected' : ''); ?>>Vender</option>
                    </select>
                </label>
            </div>

            <div class="input-field">
                <label>Título:</label>
                <label>
                    <input type="text" name="titulo" id="titulo" value="<?php echo $item->titulo; ?>">
                </label>
            </div>

            <div class="input-field">
                <label>Descrição:</label><br>
                <label>
                    <textarea cols="40" rows="8" name="descricao" id="descricao" ><?php echo $item->descricao; ?></textarea>
                </label>
            </div>

            <div class="input-field">
                <label>Quartos:</label>
                <label>
                    <input type="number" name="dormitorios" pattern="[0-9]*" id="dormitorios" value="<?php echo $item->dormitorios; ?>">
                </label>
            </div>

            <div class="input-field">
                <label>Banheiros:</label>
                <label>
                    <input type="number" name="banheiros" pattern="[0-9]*" id="banheiros" value="<?php echo $item->banheiros; ?>">
                </label>
            </div>

            <div class="input-field">
                <label>Garagens:</label>
                <label>
                    <input type="number" name="garagens" pattern="[0-9]*" id="garagens" value="<?php echo $item->garagens; ?>">
                </label>
            </div>

            <div class="input-field">
                <label>Valor:</label>
                <label>
                    <input type="number" name="valor" pattern="[0-9]*" id="valor" value="<?php echo $item->valor; ?>">
                </label>
            </div>
            
            <div class="input-field">
                <label>Condominio:</label>
                <label>
                    <input type="number" name="condominio" pattern="[0-9]*" id="condominio" value="<?php echo $item->condominio; ?>">
                </label>
            </div>

            <div class="input-field">
                <label>IPTU:</label>
                <label>
                    <input type="number" name="iptu" pattern="[0-9]*" id="iptu" value="<?php echo $item->iptu; ?>">
                </label>
            </div>

            <div class="input-field">
                <label>Cidade:</label>
                <label>
                    <input type="text" name="cidade" id="cidade" value="<?php echo $item->cidade; ?>">
                </label>
            </div>

            <div class="input-field">
                <label>Bairro:</label>
                <label>
                    <input type="text" name="bairro" id="bairro" value="<?php echo $item->bairro; ?>">
                </label>
            </div>

            <div class="input-field">
                <label>Metragem:</label>
                <label>
                    <input type="number" name="metragem" pattern="[0-9]*" id="metragem" value="<?php echo $item->metragem; ?>">
                </label>
            </div>

            <div class="input-field">
                <label>Situação:</label>
                <label>
                    <select name="ativo" id="ativo" >
                        <option value="1"<?php echo ($item->ativo == '1' ? 'selected' : ''); ?>>Disponível</option>
                        <option value="0"<?php echo ($item->ativo == '0' ? 'selected' : ''); ?>>Indisponível</option>
                    </select>
                    <input type="hidden" name="versao" id="versao" value="<?php echo $item->versao; ?>">
                    <input type="hidden" name="id" id="id" value="<?php echo $item->id; ?>">
                </label>
            </div>
            
            <input type="submit" value="Gravar">
        </form>
    </main>

</body>