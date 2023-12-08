<?php
// processar_exclusao_brinco.php

$conn = new mysqli("localhost", "root", "", "chatgpt");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $brincoId = $_POST['id'];

    // Excluir o brinco no banco de dados
    $sql = "DELETE FROM anel WHERE id = $AnelId";

    if ($conn->query($sql) === TRUE) {
        echo "Brinco excluído com sucesso!";
    } else {
        echo "Erro ao excluir brinco: " . $conn->error;
    }
} else {
    echo "ID do brinco não fornecido.";
}

$conn->close();
?>
