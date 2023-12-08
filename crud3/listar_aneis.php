<?php
include 'conexao.php';
// Coecte-se ao banco de dados (substitua pelos seus detalhes de conexão)
$conn = new mysqli("localhost", "root", "", "chatgpt");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta SQL para obter todos os anéis
$sql = "SELECT * FROM anei";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Aneis</title>
</head>
<body>

<h1>Listar Aneis</h1>

<ul>
    <!-- Exiba os anéis obtidos da consulta SQL -->
    <?php while ($row = $result->fetch_assoc()): ?>
        <li>
            <?= $row['nome_anel'] ?> - Material: <?= $row['material'] ?>
            <button type="button" onclick="excluirAnel(<?= $row['id'] ?>)">Excluir</button>
        </li>
    <?php endwhile; ?>
</ul>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
function excluirAnel(anelId) {
    var confirmarExclusao = confirm("Você tem certeza de que deseja excluir este anel?");
    
    if (confirmarExclusao) {
        $.ajax({
            type: "POST",
            url: "processar_exclusao_anel.php",
            data: { id: anelId },
            success: function(response) {
                alert(response);
                // Atualizar a lista de anéis após a exclusão (recarregar a página ou usar AJAX para atualização dinâmica)
            },
            error: function(error) {
                console.log("Erro na requisição AJAX: " + error);
            }
        });
    }
}
</script>

</body>
</html>
