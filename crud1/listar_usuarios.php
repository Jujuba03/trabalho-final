<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>
<body>

    <button href="index.php" class="button" type="text">Voltar</button>;

</body>
</html>

<?php
include 'conexao.php';

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Usuários</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["nome"]. "</td>
                <td>" . $row["email"]. "</td>
                <td>
                    <a href='editar_usuario.php?id=" . $row["id"] . "'>Editar</a>
                    <a href='excluir_usuario.php?id=" . $row["id"] . "'>Excluir</a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum usuário encontrado.";
}

$conn->close();
?>
