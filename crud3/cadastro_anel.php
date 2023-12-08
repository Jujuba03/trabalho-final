<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Anel</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>
<body>
<?php include 'conexao.php'; ?>
<h1>Cadastro de Anel</h1>

<ul>
    <li><a href="listar_aneis.php">Listar Anéis</a></li>
    <li><a href="editar_anel.php">Editar Anéis</a></li>
</ul>

<form id="registroForm">
    <!-- Campos específicos para o cadastro de anel -->
    <label for="nome_anel">Nome do Anel:</label>
    <input type="text" id="nome_anel" name="nome_anel" required>

    <label for="material_anel">Material do Anel:</label>
    <input type="text" id="material_anel" name="material_anel" required>

    <button type="button" onclick="registrarAnel()">Cadastrar</button>
</form>

<div id="resultado"></div>

<script>
function registrarAnel() {
    var formData = $("#registroForm").serialize();

    $.ajax({
        type: "POST",
        url: "registro_anel.php", // Nome do arquivo PHP para o cadastro de anel
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
