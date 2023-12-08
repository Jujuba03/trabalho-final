<!-- Lista de Usuários -->
<ul id="user-list"></ul>

<!-- Formulário de Adição/Edição de Usuário -->
<div id="form-container">
    <form id="user-form" onsubmit="saveUser(event)">
        <input type="hidden" id="user-id" name="user_id">
        <label for="user-name">Nome do Usuário:</label>
        <input type="text" id="user-name" name="user_name" required>
        <label for="user-email">E-mail do Usuário:</label>
        <input type="email" id="user-email" name="user_email" required>
        <button type="submit">Salvar</button>
        <button type="button" onclick="closeForm()">Cancelar</button>
    </form>
</div>
