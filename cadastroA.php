<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Anéis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>CRUD de Anéis</h1>

    <div id="result"></div>

    <!-- Botão para abrir o formulário de adição -->
    <button onclick="openAddForm()">Adicionar Anel</button>

    <!-- Lista de Anéis -->
    <ul id="ring-list"></ul>

    <!-- Formulário de Adição/Edição -->
    <div id="form-container">
        <form id="ring-form" onsubmit="saveRing(event)">
            <input type="hidden" id="ring-id" name="ring_id">
            <label for="ring-name">Nome do Anel:</label>
            <input type="text" id="ring-name" name="ring_name" required>
            <label for="ring-material">Material do Anel:</label>
            <input type="text" id="ring-material" name="ring_material" required>
            <button type="submit">Salvar</button>
            <button type="button" onclick="closeForm()">Cancelar</button>
        </form>
    </div>
    <!-- Lista de Usuários -->
<div id="user-list-container">
    <h2>Lista de Usuários</h2>
    <ul id="user-list"></ul>
</div>


</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="script.js"></script>

</body>
</html>