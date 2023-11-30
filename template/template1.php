<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Início</a>
            <a href="?p=novoUsuario">Novo Usuário</a>
            <a href="?p=novoTexto">Novo Texto</a>
            <?php
            if(isset($_SESSION['id'])){
                echo '<a href="?p=novoTexto">Novo Texto</a>';
                echo '<a href="?p=logout">Logout</a>';
            }
            else{
                echo '<a href="?p=login">Login</a>';
            }
            ?>
        </nav>
        <main>
            <?php require "pages/$page.php";?>
        </main>
    </div>
</body>
</html>