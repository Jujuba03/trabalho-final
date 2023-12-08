<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
session_start();

if (isset($_SESSION['usuario_id'])) {
    echo "<h1>Bem-vindo, " . $_SESSION['usuario_nome'] . "!</h1>";
    echo "<p><a href='logout.php'>Logout</a></p>";
    // Adicione um botão para redirecionar para a pasta cred1
    echo "<button onclick=\"redirecionarParaCred1()\">Ir para cred1</button>";
} else {
    echo "<h1>CRUD de Usuários</h1>";
    echo "<ul>
            <li><a href='listar_usuarios.php'>Listar Usuários</a></li>
            <li><a href='cadastro.php'>Cadastrar Usuário</a></li>
            <li><a href='login.php'>Login</a></li><br>
            <li><a href='listar_Brincos.php'>Listar Brincos</a></li><br>
            <li><a href='cadastroB.php'>Cadastrar Usuário</a></li>
          </ul>";
}

// Adicione um script JavaScript para redirecionar para a pasta cred1
echo "<script>
        function redirecionarParaCred1() {
            window.location.href = 'cred1';
        }
      </script>";
?>

</body>
</html>
