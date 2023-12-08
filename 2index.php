<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDs</title>
    <link rel="stylesheet" href="style.css">
    <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection" />

</head>
<body>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Login</h2>

<form id="loginForm" action='verificar_login.php'>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>

    <button type="button" onclick="realizarLogin()">Entrar</button>
</form>

    <a href="cadastro.php">Cadastre-se</a>
    <li><button><a href='listar_usuarios.php'>Listar Usuários</a></li>

<div id="resultado"></div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="script.js"></script>


</body>
</html>


<?php
session_start();

if (isset($_SESSION['usuario_id'])) {
    echo "<h1>Bem-vindo, " . $_SESSION['usuario_nome'] . "!</h1>";
    echo "<p><a href='logout.php'>Logout</a></p>";
} else {
    echo "";
}    
?>

</body>
</html>
