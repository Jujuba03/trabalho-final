<?php
// processar_exclusao_brinco.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere o ID do brinco a ser excluído
    $brincoId = $_POST['id'];

    // Conecte-se ao banco de dados
    $conn = new mysqli("seu_host_mysql", "seu_usuario_mysql", "sua_senha_mysql", "seu_banco_de_dados");

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Prepare a consulta SQL para excluir o brinco
    $sql = "DELETE FROM brincos WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $brincoId);

    // Execute a consulta preparada
    if ($stmt->execute()) {
        echo "Brinco excluído com sucesso!";
    } else {
        echo "Erro ao excluir brinco: " . $stmt->error;
    }

    // Feche a conexão e a declaração
    $stmt->close();
    $conn->close();
}
?>
