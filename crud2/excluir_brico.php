<?php
// excluir_brinco.php

$conn = new mysqli("seu_host_mysql", "seu_usuario_mysql", "sua_senha_mysql", "seu_banco_de_dados");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $brincoId = $_GET['id'];
    $result = $conn->query("SELECT * FROM brincos WHERE id = $brincoId");

    if ($result->num_rows > 0) {
        $brinco = $result->fetch_assoc();
    } else {
        echo "Brinco não encontrado.";
        exit;
    }
} else {
    echo "ID do brinco não fornecido.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Brinco</title>
    <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>
<body>

<h1>Excluir Brinco</h1>

<ul>
    <li><a href="registro_usuario.php">Registrar Usuário</a></li>
    <li><a href="listar_usuarios.php">Listar Usuários</a></li>
    <li><a href="editar_usuario.php">Editar Usuário</a></li>
    <li><a href="registro_brinco.php">Registrar Brinco</a></li>
</ul>

<p>Você tem certeza de que deseja excluir o brinco "<?= $brinco['nome_brinco'] ?>"?</p>
<button type="button" onclick="excluirBrinco()">Confirmar Exclusão</button>

<div id="resultado"></div>

<script>
function excluirBrinco() {
    var formData = { id: <?= $brinco['id'] ?> };

    $.ajax({
        type: "POST",
        url: "processar_exclusao_brinco.php", // Crie este arquivo para processar a exclusão
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
