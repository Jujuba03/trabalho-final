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

<h1>Registro de Usuário</h1>

<ul>
    <li><a href="listar_usuarios.php">Listar Usuários</a></li>
    <li><a href="editar_usuario.php">Editar Usuário</a></li>
</ul>

<form id="registroForm">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>

    <button type="button" onclick="registrarUsuario()">Registrar</button>
</form>

<div id="resultado"></div>

<script>
function registrarUsuario() {
    var formData = $("#registroForm").serialize();

    $.ajax({
        type: "POST",
        url: "registro.php",
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
