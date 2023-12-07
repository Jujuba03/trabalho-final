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

<form id="loginForm" action='verificar_login.php'>
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
function registrarUsuario() {
    var formData = $("#registroForm").serialize();

    $.ajax({
        type: "POST",
        url: "registro.php",
        data: formData,
        success: function(response) {
            $("#resultado").html(response);

            // Se o registro for bem-sucedido, redirecione para a página de login e exiba um alerta
            if (response === "Usuário registrado com sucesso!") {
                alert("Usuário registrado com sucesso!");
                window.location.href = "pagina_de_login.html"; // Substitua "pagina_de_login.html" pelo nome correto do seu arquivo de login
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
