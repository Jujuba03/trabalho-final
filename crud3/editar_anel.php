<!-- editar_anel.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Anel</title>
    <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>
<body>

<h1>Editar Anel</h1>

<ul>
    <!-- Adicione links para outras páginas conforme necessário -->
    <li><a href="listar_anel.php">Listar Anel</a></li>
    <li><a href="editar_anel.php">Editar Anel</a></li>
    <li><a href="registro_anel.php">Registrar Anel</a></li>
</ul>

<form id="editarAnelForm">
    <input type="hidden" name="id" value="<?= $anel['id'] ?>">
    
    <label for="nome_anel">Nome do Anel:</label>
    <input type="text" id="nome_anel" name="nome_anel" value="<?= $anel['nome_anel'] ?>" required>

    <label for="material_anel">Material do Anel:</label>
    <input type="text" id="material_anel" name="material" value="<?= $anel['material'] ?>" required>

    <!-- Adicione outros campos específicos para editar anéis conforme necessário -->

    <button type="button" onclick="atualizarAnel()">Atualizar</button>
</form>

<div id="resultado"></div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
function atualizarAnel() {
    var formData = $("#editarAnelForm").serialize();

    $.ajax({
        type: "POST",
        url: "atualizar_anel.php",
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
