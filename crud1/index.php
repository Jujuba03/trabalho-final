<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
session_start();

if (isset($_SESSION['usuario_id'])) {
    echo "<h1>Bem-vindo, " . $_SESSION['usuario_nome'] . "!</h1>";
    echo "<p><a href='logout.php'>Logout</a></p>";
} else {
    echo "<h1>CRUD de Usuários</h1>";
    echo "<ul>
            <li><a href='listar_usuarios.php'>Listar Usuários</a></li>
            <li><a href='cadastro.php'>Cadastrar Usuário</a></li>
            <li><a href='login.php'>Login</a></li>
          </ul>";
}
?>

</body>
</html>
