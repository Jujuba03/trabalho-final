<?php
// listar_brincos.php

// Conecte-se ao banco de dados (substitua pelos seus detalhes de conexão)
$conn = new mysqli("", "root", "", "chatgpt");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta SQL para obter todos os brincos
$sql = "SELECT * FROM brincos";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Brincos</title>
</head>
<body>

<h1>Listar Brincos</h1>

<ul>
    <!-- Exiba os brincos obtidos da consulta SQL -->
    <?php while ($row = $result->fetch_assoc()): ?>
        <li><?= $row['nome_brinco'] ?> - Material: <?= $row['material'] ?>, Cor: <?= $row['cor'] ?></li>
    <?php endwhile; ?>
</ul>

</body>
</html>
