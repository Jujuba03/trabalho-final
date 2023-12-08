<?php
// registro_brinco.php
 'conexao.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulári
    $nomeBrinco = $_POST['nome_brinco'];
    $material = $_POST['material'];
    $cor = $_POST['cor'];

    // Insira os dados no banco de dados (Você precisará configurar sua conexão com o banco)
    $conn = new mysqli("localhost", "root", "", "chatgpt");

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $sql = "INSERT INTO brincos (nome_brinco, material, cor) VALUES ('$nomeBrinco', '$material', '$cor')";

    if ($conn->query($sql) === TRUE) {
        echo "Brinco registrado com sucesso!";
    } else {
        echo "Erro ao registrar brinco: " . $conn->error;
    }

    $conn->close();
}
?>