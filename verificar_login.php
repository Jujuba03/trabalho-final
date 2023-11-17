<?php
include 'conexao.php';

function validarLogin($email, $senha) {
    global $conn;

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            session_start();
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nome'] = $row['nome'];
            return true;
        }
    }

    return false;
}

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (validarLogin($email, $senha)) {
        echo "Login bem-sucedido. Redirecionando...";
        
    } else {
        echo "Senha incorreta ou usuário não encontrado.";
    }
} else {
    echo "Requisição inválida.";
}

$conn->close();
?>
