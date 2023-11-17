<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>
<body>
    
</body>
</html>

<?php
include 'conexao.php';

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $enc = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$enc')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário registrado com sucesso.";
    } else {
        echo "Erro ao registrar usuário: " . $conn->error;
    }
} else {
    echo "Requisição inválida.";
}

$conn->close();
?>
