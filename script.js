$.ajax({
    url: 'crud.php',
    type: 'post',
    data: {request: 'create', name: 'Nome', email: 'email@example.com'},
    success: function(response) { alert(response); }
});

function realizarLogin() {
    var formData = $("#loginForm").serialize();

    $.ajax({
        type: "POST",
        url: "verificar_login.php",
        data: formData,
        success: function(response) {
            $("#resultado").html(response);
            if (response.includes("bem-sucedido")) {
                window.location.replace("index.php");
            }
        },
        error: function(error) {
            console.log("Erro na requisição AJAX: " + error);
        }
    });
}

// script.js

function realizarLogin() {
    var formData = $("#loginForm").serialize();

    $.ajax({
        type: "GET",
        url: "login.php",
        data: formData,
        success: function(response) {
            $("#resultado").html(response);
            
            // Verifica se a resposta é "Login bem-sucedido"
            if (response.trim() === "Login bem-sucedido!") {
                // Redireciona para a página listBrincos
                window.location.href = "listBrincos.php";
            }
        },
        error: function(error) {
            console.log("Erro na requisição AJAX: " + error);
        }
    });
}
$(document).ready(function () {
    // Carregar a lista de anéis ao carregar a página
    loadRingList();

    // Função para abrir o formulário de adição
    window.openAddForm = function () {
        $('#ring-form')[0].reset(); // Limpar o formulário
        $('#ring-id').val(''); // Limpar o campo de ID
        $('#form-container').show();
    };

    // Função para fechar o formulário
    window.closeForm = function () {
        $('#form-container').hide();
    };

    // Função para salvar um anel (adicionar ou editar)
    window.saveRing = function (event) {
        event.preventDefault();

        // Obter dados do formulário
        var formData = $('#ring-form').serialize();

        $.ajax({
            url: 'api.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (data) {
                // Atualizar a lista de anéis
                updateRingList(data);

                // Fechar o formulário
                closeForm();
            },
            error: function (error) {
                console.error('Erro ao salvar o anel:', error.responseText);
            }
        });
    };

    // Função para carregar a lista de anéis
    function loadRingList() {
        $.ajax({
            url: 'api.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                updateRingList(data);
            },
            error: function (error) {
                console.error('Erro ao carregar a lista de anéis:', error.responseText);
            }
        });
    }

    // Função para atualizar a lista de anéis no DOM
    function updateRingList(data) {
        var ringList = $('#ring-list');

        // Limpar a lista
        ringList.empty();

        // Adicionar anéis à lista
        data.forEach(function (ring) {
            var listItem = $('<li></li>');
            listItem.text(ring.name + ' - ' + ring.material);

            // Botões para editar e excluir
            var editButton = $('<button onclick="openEditForm(' + ring.id + ')">Editar</button>');
            var deleteButton = $('<button onclick="deleteRing(' + ring.id + ')">Excluir</button>');

            listItem.append(editButton);
            listItem.append(deleteButton);

            ringList.append(listItem);
        });
    }

    // Função para abrir o formulário de edição
    window.openEditForm = function (ringId) {
        // Encontrar o anel pelo ID
        var ring = findRingById(ringId);

        // Preencher o formulário com os dados do anel
        $('#ring-id').val(ring.id);
        $('#ring-name').val(ring.name);
        $('#ring-material').val(ring.material);

        // Abrir o formulário
        $('#form-container').show();
    };

    // Função para excluir um anel
    window.deleteRing = function (ringId) {
        $.ajax({
            url: 'api.php?ring_id=' + ringId,
            type: 'DELETE',
            dataType: 'json',
            success: function (data) {
                // Atualizar a lista de anéis
                updateRingList(data);
            },
            error: function (error) {
                console.error('Erro ao excluir o anel:', error.responseText);
            }
        });
    };

    // Função para encontrar um anel pelo ID
    function findRingById(ringId) {
        var ring;

        $.ajax({
            url: 'api.php',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function (data) {
                ring = data.find(function (r) {
                    return r.id == ringId;
                });
            },
            error: function (error) {
                console.error('Erro ao encontrar o anel:', error.responseText);
            }
        });

        return ring;
    }
});
// Função para abrir o formulário de edição
window.openEditForm = function (userId) {
    // Encontrar o usuário pelo ID
    var user = findUserById(userId);

    // Preencher o formulário com os dados do usuário
    populateForm(user);

    // Abrir o formulário
    $('#form-container').show();
};

// Função para preencher o formulário com os dados do usuário
function populateForm(user) {
    $('#user-id').val(user.id);
    $('#user-name').val(user.name);
    $('#user-email').val(user.email);
}
// Função para carregar a lista de usuários ao carregar a página
$(document).ready(function () {
    loadUserList();

    // Restante do código...
});
