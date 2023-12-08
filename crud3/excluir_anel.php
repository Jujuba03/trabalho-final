<?php
// excluir_anel.php

$conn = new mysqli("localhost", "root", "", "chatgpt");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $anelId = $_GET['id'];
    $result = $conn->query("SELECT * FROM aneis WHERE id = $anelId");

    if ($result->num_rows > 0) {
        $anel = $result->fetch_assoc();
    } else {
        echo "Anel não encontrado.";
        exit;
    }
} else {
    echo "ID do anel não fornecido.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Anel</title>
    <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>
<body>

<h1>Excluir Anel</h1>

<ul>
    <!-- Adicione links para outras páginas conforme necessário -->
    <li><a href="registro_usuario.php">Registrar Usuário</a></li>
    <li><a href="listar_usuarios.php">Listar Usuários</a></li>
    <li><a href="editar_usuario.php">Editar Usuário</a></li>
    <li><a href="registro_anel.php">Registrar Anel</a></li>
</ul>

<p>Você tem certeza de que deseja excluir o anel "<?= $anel['nome_anel'] ?>"?</p>
<button type="button" onclick="excluirAnel()">Confirmar Exclusão</button>

<div id="resultado"></div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
function excluirAnel() {
    var formData = { id: <?= $anel['id'] ?> };

    $.ajax({
        type: "POST",
        url: "processar_exclusao_anel.php",
        data: formData,
        success: function(response) {
            $("#resultado").html(response);
        },
        error: function(error) {
            console.log("Erro na requisição AJAX: " + error);
        }
    });
}
</script>

</body>
</html>
