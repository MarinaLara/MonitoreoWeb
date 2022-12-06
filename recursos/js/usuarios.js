var usuarios = {
    defaultIndex: function () {
        //Configuraciones de tabla usuarios
        $(document).ready(function () {
            $('#tblUsuarios').DataTable({
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "spageLength": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                    "sInfo": "Registros del _START_ al _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Columnas",
                        "print": "Imprimir",
                        "pageLength": {
                            _: "Mostrar  %d ",
                            '-1': "Todo"
                        }

                    }
                }
            });
        });

        //cambio de tipo de input contraseña
        $("#eyeButtonPass").on("click", function (e) {
            e.preventDefault();
            var inPassword = $("#txtPass").attr("type");
            if (inPassword == "password") {
                $("#txtPass").attr("type", "text");
                $("#iEye").removeClass('fa-solid fa-eye');
                $("#iEye").addClass('fa-solid fa-eye-slash');
            } else {
                $("#txtPass").attr("type", "password");
                $("#iEye").removeClass('fa-solid fa-eye-slash');
                $("#iEye").addClass('fa-solid fa-eye');
            }
        });

        //cambio de tipo de input confirmar contraseña
        $("#eyeButtonCPass").on("click", function (e) {
            e.preventDefault();
            var inPassword = $("#txtConfirmPass").attr("type");
            if (inPassword == "password") {
                $("#txtConfirmPass").attr("type", "text");
                $("#iEyeC").removeClass('fa-solid fa-eye');
                $("#iEyeC").addClass('fa-solid fa-eye-slash');
            } else {
                $("#txtConfirmPass").attr("type", "password");
                $("#iEyeC").removeClass('fa-solid fa-eye-slash');
                $("#iEyeC").addClass('fa-solid fa-eye');
            }
        });

        //Mostrar modal agregar usuario
        $("#btnNuevoUsuario").on("click", function (e) {
            e.preventDefault();
            $('#modalUsuario').modal('show')
            $('#htitleModalUsuarios').html('Agregar Usuario')
        });

        //configuracion boton exit modal
        $(".exit").on("click", function (e) {
            e.preventDefault();
            $('#modalUsuario').modal('hide')
            $("#txtNombreUsuario").val('');
            $("#txtApellidoPaterno").val('');
            $("#txtApellidoMaterno").val('');
            $("#txtEmail").val('');
            $("#selNivel").val('');
            $("#txtPass").val('');
        });
    },

    datos: function () {
        //Mostrar modal editar usuario
        $(document).on("click", "#btnEditarUsuario", function (e) {
            e.preventDefault();
            $('#modalUsuario').modal('show')
            $('#htitleModalUsuarios').html('Editar Usuario')

            var data = {
                id_usuario: $(this).data("id")
            };
            //obtener datos del usuario seleccionado
            var response = cargar_ajax.run_server_ajax("Usuarios/getDatabyID", data)
            $("#txtId").val($(this).data("id"));
            $("#txtNombreUsuario").val(response.nombre);
            $("#txtApellidoPaterno").val(response.apellidoPaterno);
            $("#txtApellidoMaterno").val(response.apellidoMaterno);
            $("#txtEmail").val(response.email);
            $("#selNivel").val(response.nivel);
            $("#txtPass").val('');
        });
    },

    acciones: function () {
        //Eliminar
        $(document).on("click", "#btnEliminarUsuario", function (e) {
            e.preventDefault();
            var data = {
                id_usuario: $(this).data("id")
            };
            swal.fire({
                title: "¿Está seguro?",
                text: "El usuario se eliminará!",
                icon: "warning",
                timer: 2000,
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonText: "Si, eliminar!",
                reverseButtons: true
            }).then(result => {
                if (result.value) {
                    cargar_ajax.run_server_ajax("Usuarios/eliminarUsuario", data);
                    Swal.fire(
                        'Eliminado!',
                        'Se elimino correctamente',
                        'success'
                    ).then((result) => {
                        location.reload();
                    });
                }
            });
        });

        //Submit crear y guardar
        $(document).on("click", "#btnGuardarUsuario", function (form) {
            form.preventDefault;
            var pass = $("#txtPass").val();
            //datos default
            var data = {
                nombre: $("#txtNombreUsuario").val(),
                apellidoP: $("#txtApellidoPaterno").val(),
                apellidoM: $("#txtApellidoMaterno").val(),
                email: $("#txtEmail").val(),
                nivel: $("#selNivel").val(),
            }

            //Si es vacio es crear, sino es editar
            if ($("#txtId").val() == "") {
                //comprobacion de contraseña
                if (pass != $("#txtConfirmPass").val()) {
                    swal.fire({
                        title: "Error!",
                        text: "Contraseñas no coinciden!",
                        icon: "warning",
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    });
                } else {
                    data.passw = pass;
                }

                //Crear
                cargar_ajax.run_server_ajax("Usuarios/crearUsuario", data)
                swal.fire({
                    title: "Completado!",
                    text: "Usuario creado correctamente",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                }).then((result) => {
                    location.reload();
                });

            } else {
                data.id = $("#txtId").val();
                //comprobacion del cambio de contraseña
                if (pass != "") {
                    if ($("#txtConfirmPass").val() == "") {
                        swal.fire({
                            title: "Error!",
                            text: "Campo Confirmar contraseña no puede ir vacio",
                            icon: "warning",
                            timer: 2000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                        });
                    } else if (pass != $("#txtConfirmPass").val()) {
                        swal.fire({
                            title: "Error!",
                            text: "Contraseñas no coinciden!",
                            icon: "warning",
                            timer: 2000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                        });
                    } else {
                        data.passw = pass;
                    }
                }
                //Guardar datos
                var response = cargar_ajax.run_server_ajax("Usuarios/guardarUsuario", data)
                if (response.Error == "Error") {
                    swal.fire({
                        title: "Error!",
                        text: "No se guardaron los cambios",
                        icon: "warning",
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    }).then((result) => {
                        location.reload();
                    });
                } else {
                    swal.fire({
                        title: "Completado!",
                        text: "Usuario editado correctamente",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    }).then((result) => {
                        location.reload();
                    });
                }
            }

        });
    },
}

jQuery(document).ready(function () {
    usuarios.defaultIndex(this);
    usuarios.datos(this);
    usuarios.acciones(this);
});