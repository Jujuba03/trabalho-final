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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM usuarios WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário excluído com sucesso. <a href='listar_usuarios.php'><br><br>Voltar para a lista</a>";
        echo "<a href='index.php'><br><br>Voltar para página de login</a>";
        echo "<a href='cadastro.php'><br>Voltar para página de cadastro</a>";

    } else {
        echo "Erro ao excluir usuário: " . $conn->error;
    }
} else {
    echo "Requisição inválida.";
}

$conn->close();
?>
