<?php
// atualizar_brinco.php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $brincoId = $_POST['id'];
    $nomeBrinco = $_POST['nome_brinco'];
    $material = $_POST['material'];
    $cor = $_POST['cor'];

    // Conecte-se ao banco de dados
    $conn = new mysqli("seu_host_mysql", "seu_usuario_mysql", "sua_senha_mysql", "seu_banco_de_dados");

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Prepare a consulta SQL para atualizar o brinco
    $sql = "UPDATE brincos SET nome_brinco=?, material=?, cor=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nomeBrinco, $material, $cor, $brincoId);

    // Execute a consulta preparada
    if ($stmt->execute()) {
        echo "Brinco atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar brinco: " . $stmt->error;
    }

    // Feche a conexão e a declaração
    $stmt->close();
    $conn->close();
}
?>
