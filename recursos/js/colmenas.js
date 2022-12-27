var colmenas = {
    defaultIndex: function () {
        //Configuraciones de tabla Colmenas
        $(document).ready(function () {
            $('#tblColmenas').DataTable({
                responsive: true,
                autoWidth: true,
                pageLength: 5,
                columnDefs: [{
                    targets: [1],
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
            $('#tblColmenas_filter input').attr("placeholder", "Buscar");
        });

        //configuracion boton exit modal
        $(document).on("click", ".exit", function (e) {
            e.preventDefault();
            $('#modalColmena').modal('hide')
            $("#txtNombreColmena").val('');
        });

        //Mostrar modal agregar Colmena
        $(document).on("click", "#btnNuevaColmena", function (e) {
            e.preventDefault();
            $('#modalColmena').modal('show')
            $('#htitleModalColmena').html('Agregar Colmena')
        });
    },
    datos: function () {
        //Mostrar modal agregar Colmena
        $(document).on("click", "#btnEditarColmena",function (e) {
            e.preventDefault();
            $('#modalColmena').modal('show')
            $('#htitleModalColmena').html('Editar Colmena')

            var data = {
                id_colmena: $(this).data("id")
            };
            //obtener datos del usuario seleccionado
            var response = cargar_ajax.run_server_ajax("Colmenas/getDatabyID", data)
            $("#txtNombreColmena").val(response.identificadorColmena);
            $("#txtId").val($(this).data("id"));
        });
    },
    acciones: function () {
        //Eliminar
        $(document).on("click", "#btnEliminarColmena", function (e) {
            e.preventDefault();
            var data = {
                id_colmena: $(this).data("id")
            };
            swal.fire({
                title: "¿Está seguro?",
                text: "La colmena se eliminará!",
                icon: "warning",
                timer: 2000,
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonText: "Si, eliminar!",
                reverseButtons: true
            }).then(result => {
                if (result.value) {
                    cargar_ajax.run_server_ajax("Colmenas/eliminarColmena", data);
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
        $(document).on("click", "#btnGuardarColmena", function (form) {
            form.preventDefault();
            var data = {
                nombre: $("#txtNombreColmena").val(),
            }
            //Si es vacio es crear, sino es editar
            if ($("#txtId").val() == "") {
                cargar_ajax.run_server_ajax("Colmenas/crearColmena", data)
                var texto = "Colmena creada con exito";
            } else {
                data.id = $("#txtId").val();
                var response = cargar_ajax.run_server_ajax("Colmenas/editarColmena", data);
                console.log(response);
                var texto = "Colmena editada con exito";
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
    colmenas.defaultIndex(this);
    colmenas.datos(this);
    colmenas.acciones(this);
});