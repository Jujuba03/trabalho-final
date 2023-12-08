<?php
// atualizar_anel.php

$conn = new mysqli("localhost", "root", "", "chatgbt");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $anelId = $_POST['id'];
    $nomeAnel = $_POST['nome_anel'];
    $materialAnel = $_POST['material_anel'];

    // Atualizar o anel no banco de dados
    $sql = "UPDATE aneis SET nome_anel='$nomeAnel', material_anel='$materialAnel' WHERE id=$anelId";

    if ($conn->query($sql) === TRUE) {
        echo "Anel atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar anel: " . $conn->error;
    }
} else {
    echo "ID do anel não fornecido.";
}

$conn->close();
?>
