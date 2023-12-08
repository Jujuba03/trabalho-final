<?php
// verificar_login.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexao.php';

    // Recupera os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta SQL para verificar as credenciais no banco de dados usando parâmetros preparados
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Se você estiver usando hash de senha, use password_verify para comparar
        if (password_verify($senha, $row['senha'])) {
            echo "Login bem-sucedido!";
            // Aqui você pode adicionar informações do usuário à sessão, se necessário
        } else {
            echo "Credenciais inválidas. Por favor, verifique seu email e senha.";
        }
    } else {
        echo "Credenciais inválidas. Por favor, verifique seu email e senha.";
    }

    // Feche a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>
