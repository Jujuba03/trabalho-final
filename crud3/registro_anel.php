<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Anel</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>
<body>

<h1>Registro de Anel</h1>

<ul>
    <li><a href="listar_aneis.php">Listar Aneis</a></li>
    <li><a href="editar_anel.php">Editar Anel</a></li>
</ul>

<form id="registroAnelForm">
    <label for="nome_anel">Nome do Anel:</label>
    <input type="text" id="nome_anel" name="nome_anel" required>

    <label for="material_anel">Material do Anel:</label>
    <input type="text" id="material" name="material" required>

    <!-- Adicione outros campos específicos para o registro de anéis conforme necessário -->

    <button type="button" onclick="registrarAnel()">Registrar</button>
</form>

<div id="resultado"></div>

<script>
function registrarAnel() {
    var formData = $("#registroAnelForm").serialize();

    $.ajax({
        type: "POST",
        url: "registro_anel.php", // Crie este arquivo para processar o registro
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
