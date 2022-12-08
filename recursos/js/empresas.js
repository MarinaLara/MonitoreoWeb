var empresas = {
    defaultIndex: function () {
        //Configuraciones de tabla empresas
        $(document).ready(function () {
            $('#tblEmpresa').DataTable({
                responsive: true,
                autoWidth: true,
                pageLength: 5,
                columnDefs: [{
                    targets: [4],
                    orderable: false,
                }],
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5', '10', '25', '50', 'Todo']
                ],
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
            }).columns.adjust();
            $('#tblEmpresas_filter input').attr("placeholder", "Buscar");
        });

        //configuracion boton exit modal
        $(".exit").on("click", function (e) {
            e.preventDefault();
            $('#modalEmpresa').modal('hide')
            $("#txtRazonSocial").val('');
            $("#txtnombreContacto").val('');
            $("#txttelefonoContacto").val('');
            $("#txtcorreoContacto").val('');
        });

        //Mostrar modal agregar empresa
        $("#btnNuevaEmpresa").on("click", function (e) {
            e.preventDefault();
            $('#modalEmpresa').modal('show')
            $('#htitleModalEmpresa').html('Agregar Empresa')
        });
    },
    datos: function () {
        //Mostrar modal agregar empresa
        $("#btnEditarEmpresa").on("click", function (e) {
            e.preventDefault();
            $('#modalEmpresa').modal('show')
            $('#htitleModalEmpresa').html('Editar Empresa')

            var data = {
                id_empresa: $(this).data("id")
            };
            //obtener datos de la empresa seleccionado
            var response = cargar_ajax.run_server_ajax("Empresas/getDatabyID", data)
            $("#txtRazonSocial").val(response.razonSocial);
            $("#txtnombreContacto").val(response.nombreContacto);
            $("#txttelefonoContacto").val(response.telefonoContacto);
            $("#txtcorreoContacto").val(response.correoContacto);
            $("#txtId").val($(this).data("id"));
        });
    },
    acciones: function () {
        //Eliminar
        $(document).on("click", "#btnEliminarEmpresa", function (e) {
            e.preventDefault();
            var data = {
                id_empresa: $(this).data("id")
            };
            swal.fire({
                title: "¿Está seguro?",
                text: "La empresa se eliminará!",
                icon: "warning",
                timer: 2000,
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonText: "Si, eliminar!",
                reverseButtons: true
            }).then(result => {
                if (result.value) {
                    cargar_ajax.run_server_ajax("Empresas/eliminarEmpresa", data);
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

        //Crear y editar
        $(document).on("click", "#btnGuardarEmpresa", function (form) {
            form.preventDefault();
            var data = {
                razonSocial: $("#txtRazonSocial").val(),
                nombreContacto: $("#txtnombreContacto").val(),
                telefonoContacto: $("#txttelefonoContacto").val(),
                correoContacto: $("#txtcorreoContacto").val(),
            }
            //Si es vacio es crear, sino es editar
            if ($("#txtId").val() == "") {
                cargar_ajax.run_server_ajax("Empresas/crearEmpresa", data)
                var texto = "Empresa creada con exito";
            } else {
                data.id = $("#txtId").val();
                var response = cargar_ajax.run_server_ajax("Empresas/editarEmpresa", data);
                console.log(response);
                var texto = "Empresa editada con exito";
            }
            Swal.fire({
                title: "Completado!",
                text: texto,
                icon: "success",
                timer: 2000,
                showConfirmButton: false,
                timerProgressBar: true,
            }).then((result) => {
                location.reload();
            });
        });
    },
}

jQuery(document).ready(function () {
    empresas.defaultIndex(this);
    empresas.datos(this);
    empresas.acciones(this);
});