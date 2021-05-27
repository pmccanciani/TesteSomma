<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/painel.css">
    <title>Login</title>
</head>
<body>
    <div class="carregar" id="carregar">
        <div id="loader" class="loader"></div>
    </div>
    <main class="container">
        <h2>Login</h2>
        <form action="controller/login.php" method="post">
            <div class="input-field">
                <input type="text" name="token" id="token" placeholder="Digite seu token">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <?php
                if(isset($_GET['msg'])){
                    echo $_GET['msg'];
                }
                ?>
            </div>
            <input type="submit" value="Continue">
        </form>
    </main>
    <script>
        window.onload = function(){
            var loader = document.getElementById('carregar');
            loader.style.visibility = 'hidden';
            loader.style.opacity = '0';

        }
    </script>
</body>
</html>