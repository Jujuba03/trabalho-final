<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Brinco</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>
<body>
<?php include 'conexao.php'; ?>
<h1>Cadastro de Brinco</h1>

<ul>
    <li><a href="listar_brincos.php">Listar Brincos</a></li>
    <li><a href="editar_brinco.php">Editar Brincos</a></li>
</ul>

<form id="registroForm">
    <!-- Adicione esses campos ao seu formulário -->
<label for="nome_brinco">Nome do Brinco:</label>
<input type="text" id="nome_brinco" name="nome_brinco" required>

<label for="material">Material:</label>
<input type="text" id="material" name="material" required>

<label for="cor">Cor:</label>
<input type="text" id="cor" name="cor" required>

    <button type="button" onclick="registrarBrinco()">Cadastrar</button>
</form>

<div id="resultado"></div>

<script>
function registrarBrinco() {
    var formData = $("#registroForm").serialize();

    $.ajax({
        type: "POST",
        url: "registro_brinco.php", // Altere o nome do arquivo para "registro_brinco.php"
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
