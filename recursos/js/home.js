var home = {
    inicio: function () {
        $("#eyeButton").on("click", function (e) {
            e.preventDefault();
            var inPassword = $("#input_password").attr("type");
            if (inPassword == "password") {
                $("#input_password").attr("type", "text");
                $("#iEye").removeClass('fa-solid fa-eye');
                $("#iEye").addClass('fa-solid fa-eye-slash');
            } else {
                $("#input_password").attr("type", "password");
                $("#iEye").removeClass('fa-solid fa-eye-slash');
                $("#iEye").addClass('fa-solid fa-eye');
            }
        });
    },
}
var recuperar = {
    enviar: function (){
        
    },
}
jQuery(document).ready(function () {
    home.inicio(this);
    recuperar.enviar(this);
});