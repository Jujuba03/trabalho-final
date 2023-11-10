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
