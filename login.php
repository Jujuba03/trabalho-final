<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Login</h2>

<form id="loginForm" action='verificar_login.php' method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>

    <button type="button" onclick="realizarLogin()">Entrar</button>
</form>

<div id="resultado"></div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="script.js"></script>

<script>
function realizarLogin() {
    var formData = $("#loginForm").serialize();

    $.ajax({
        type: "POST",
        url: "verificar_login.php",
        data: formData,
        success: function(response) {
            $("#resultado").html(response);

            // Verifica se a resposta contém "Login bem-sucedido"
            if (response.trim() === "Login bem-sucedido!") {
                // Exibe um alerta e redireciona para index.php
                alert("Login bem-sucedido!");
                window.location.href = "index.php";
            }
        },
        error: function(error) {
            console.log("Erro na requisição AJAX: " + error);
        }
    });
}
</script>

</body>
</html>
