<?php
// editar_brinco.php

$conn = new mysqli("localhost", "root", "", "chatgbt");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $brincoId = $_GET['id'];
    $result = $conn->query("SELECT * FROM brinco WHERE id = $brincoId");

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
    <title>Editar Brinco</title>
    <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>
<body>

<h1>Editar Brinco</h1>

<ul>
    <li><a href="registro_usuario.php">Registrar Usuário</a></li>
    <li><a href="listar_usuarios.php">Listar Usuários</a></li>
    <li><a href="editar_usuario.php">Editar Usuário</a></li>
    <li><a href="registro_brinco.php">Registrar Brinco</a></li>
</ul>

<form id="editarBrincoForm">
    <input type="hidden" name="id" value="<?= $brinco['id'] ?>">
    
    <label for="nome_brinco">Nome do Brinco:</label>
    <input type="text" id="nome_brinco" name="nome_brinco" value="<?= $brinco['nome_brinco'] ?>" required>

    <label for="material">Material:</label>
    <input type="text" id="material" name="material" value="<?= $brinco['material'] ?>" required>

    <label for="cor">Cor:</label>
    <input type="text" id="cor" name="cor" value="<?= $brinco['cor'] ?>" required>

    <button type="button" onclick="atualizarBrinco()">Atualizar</button>
</form>

<div id="resultado"></div>

<script>
function atualizarBrinco() {
    var formData = $("#editarBrincoForm").serialize();

    $.ajax({
        type: "POST",
        url: "atualizar_brinco.php", // Crie este arquivo para processar a atualização
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
