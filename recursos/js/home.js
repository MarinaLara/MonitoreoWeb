var home = {
    inicio: function () {
        $("#eyeButton").on("click", function (e) {
            e.preventDefault();
            var inPassword = $("#txtPassword").attr("type");
            if (inPassword == "password") {
                $("#txtPassword").attr("type", "text");
                $("#iEye").removeClass('fa-solid fa-eye');
                $("#iEye").addClass('fa-solid fa-eye-slash');
            } else {
                $("#txtPassword").attr("type", "password");
                $("#iEye").removeClass('fa-solid fa-eye-slash');
                $("#iEye").addClass('fa-solid fa-eye');
            }
        });
    },
    login: function () {
        $(document).on("click", "#btnLogin", function (e) {
            e.preventDefault;
            var data = {
                email: $("#txtEmail").val(),
                pass: $("#txtPassword").val(),
            }

            cargar_ajax.run_server_ajax("Inicio/logIn", data)
            window.location.assign(base_url + 'Monitoreo/');
        });
    },
}
var recuperar = {
    enviar: function () {
        $(document).on("click", "#btnRecovery", function (e) {
            e.preventDefault;
            var data = {
                email: $("#txtEmail").val(),
            }

            cargar_ajax.run_server_ajax("Inicio/enviarContrasena", data)
            window.location.assign(base_url + 'Monitoreo/');
        });
    },
}
jQuery(document).ready(function () {
    home.inicio(this);
    home.login(this);
    recuperar.enviar(this);
});