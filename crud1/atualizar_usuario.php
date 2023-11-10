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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário atualizado com sucesso. <a href='listar_usuarios.php'><br>Voltar para a lista</a>";
        echo "<a href='index.php'><br>Voltar para página inicial</a>";
        echo "<a href='cadastro.php'><br>Voltar para página de cadastro</a>";

    } else {
        echo "Erro ao atualizar usuário: " . $conn->error;
    }
} else {
    echo "Requisição inválida.";
}

$conn->close();
?>
