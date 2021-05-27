<?php
    session_name("imobiliaria_pc");
    session_start();

    if(!isset($_SESSION["token"])){
        session_destroy();
        header("Location: ../login.php?msg=Erro de sessão!");
        die();
    }


    include_once '../controller/conexao.php';
    include_once '../controller/classImoveis.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Imoveis($db);
    $item->maxImoveis();

    if($item->total != null){
        $codigo = $item->total+1000;
    } else {
        $codigo = 1000;
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
        <form action="../controller/addImovel.php" method="post">

            <div class="input-field">
                <label>Código do Imovél:</label>
                <label>
                    <input type="text" name="codigo" id="codigo" placeholder="Código imovél" value="<?php echo $codigo; ?>">
                </label>
            </div>

            <div class="input-field">
                <label>Categória:</label>
                <label>
                    <select name="categoria" id="categoriaselect-native-6" >
                        <option value="Alugar">Alugar</option>
                        <option value="Vender">Vender</option>
                    </select>
                </label>
            </div>

            <div class="input-field">
                <label>Título:</label>
                <label>
                    <input type="text" name="titulo" id="titulo">
                </label>
            </div>

            <div class="input-field">
                <label>Descrição:</label><br>
                <label>
                    <textarea cols="40" rows="8" name="descricao" id="descricao-6" ></textarea>
                </label>
            </div>

            <div class="input-field">
                <label>Quartos:</label>
                <label>
                    <input type="number" name="dormitorios" pattern="[0-9]*" id="dormitorios" value="">
                </label>
            </div>

            <div class="input-field">
                <label>Banheiros:</label>
                <label>
                    <input type="number" name="banheiros" pattern="[0-9]*" id="banheiros" value="">
                </label>
            </div>

            <div class="input-field">
                <label>Garagens:</label>
                <label>
                    <input type="number" name="garagens" pattern="[0-9]*" id="garagens" value="">
                </label>
            </div>

            <div class="input-field">
                <label>Valor:</label>
                <label>
                    <input type="number" name="valor" pattern="[0-9]*" id="valor" value="">
                </label>
            </div>
            
            <div class="input-field">
                <label>Condominio:</label>
                <label>
                    <input type="number" name="condominio" pattern="[0-9]*" id="condominio" value="">
                </label>
            </div>

            <div class="input-field">
                <label>IPTU:</label>
                <label>
                    <input type="number" name="iptu" pattern="[0-9]*" id="iptu" value="">
                </label>
            </div>

            <div class="input-field">
                <label>Cidade:</label>
                <label>
                    <input type="text" name="cidade" id="cidade">
                </label>
            </div>

            <div class="input-field">
                <label>Endereço:</label>
                <label>
                    <input type="text" name="bairro" id="bairro">
                </label>
            </div>

            <div class="input-field">
                <label>Metragem:</label>
                <label>
                    <input type="number" name="metragem" pattern="[0-9]*" id="metragem" value="">
                </label>
            </div>
            


            <input type="submit" value="Gravar">
        </form>
    </main>

</body>