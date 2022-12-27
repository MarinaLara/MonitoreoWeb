var char;
var datos = {
    default: function () {
        //Configuraciones de tabla datosColmena, chart y datapicker
        $(document).ready(function () {
            //datapicker
            $('#selFechasPeriod').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                timePickerIncrement: 30,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'Y/M/DD hh:mm',
                    "direction": "ltr",
                    "applyLabel": "Aplicar",
                    "cancelLabel": "Cancelar",
                    "daysOfWeek": [
                        "Do",
                        "Lu",
                        "Ma",
                        "Mi",
                        "Ju",
                        "Vi",
                        "Sa"
                    ],
                    "monthNames": [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ],
                }
            });

            //tabla
            $('#tblDatosColmena').DataTable({
                responsive: true,
                autoWidth: true,
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5', '10', '25', '50', 'Todo']
                ],
                columnDefs: [{
                    targets: [0],
                    visible: false,
                }],
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
            $('#tblDatosColmena_filter input').attr("placeholder", "Buscar");

            //Chart
            Chart.defaults.global.defaultFontColor = '#fff';
            Chart.defaults.global.defaultFontSize = 20;
            Chart.defaults.global.defaultFontFamily = 'Lato';

            var data = {
                id_colmena: $('#txtIdColmena').val(),
            }

            var dataP = cargar_ajax.run_server_ajax('Datos/getPromedio', data)

            if (dataP != (false || undefined)) {
                if (dataP[0].promedioTI1 != null && dataP[0].promedioTI2 != null && dataP[0].promedioTE != null && dataP[0].promedioHI != null && dataP[0].promedioHE != null) {
                    var T1 = dataP[0].promedioTI1;
                    var T2 = dataP[0].promedioTI2;
                    var T3 = dataP[0].promedioTE;
                    var H1 = dataP[0].promedioHI;
                    var H2 = dataP[0].promedioHE;
                }else {
                    var T1 = 0;
                    var T2 = 0;
                    var T3 = 0;
                    var H1 = 0;
                    var H2 = 0;
                }
            } else {
                var T1 = 0;
                var T2 = 0;
                var T3 = 0;
                var H1 = 0;
                var H2 = 0;
            }
            
            var areaChartData = {
                labels: [
                    'Temperatura interna 1',
                    'Temperatura interna 2',
                    'Temperatura externa',
                    'Humedad interna',
                    'Humedad externa',
                ],
                datasets: [
                    {
                        label: 'Temperatura',
                        backgroundColor: 'rgb(213, 37, 37)',
                        borderColor: 'rgb(213, 37, 37)',
                        pointRadius: false,
                        pointColor: '#fff',
                        pointStrokeColor: 'rgba(60, 141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [T1, T2, T3, 0, 0],
                    },
                    {
                        label: 'Humedad',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [0, 0, 0, H1, H2],
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                datasetFill: false,
                legend: {
                    display: true,
                    position: 'bottom',
                },
                layout: {
                    padding: 10,
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            var barChartCanvas = $('#chartColmenaId').get(0).getContext('2d')

            char = new Chart(barChartCanvas, {
                type: 'bar',
                data: areaChartData,
                options: areaChartOptions
            })
        });
    }
}

var grafica = {
    selectFechas: function () {
        $(document).on('click', '#home-tab', function (e){
            $("#divPicker").css('display', 'none');
        });

        $(document).on('click', '#grafics-tab', function (e){
            $("#divPicker").css('display', '');
        });

        $(document).on('click', '.applyBtn', function (e) {
            if (char != null){
                char.clear();
                char.destroy();
                char = null
            }
            var strFecha = String($("#selFechasPeriod").val())
            strFecha = strFecha.replace('-', '#')
            for (let index = 0; index < strFecha.length; index++) {
                strFecha = strFecha.replace('/', '-')
            }
            var divisiones = strFecha.split("#", 2);

            var data = {
                inicio: divisiones[0],
                fin: divisiones[1],
                id_colmena: $("#txtIdColmena").val(),
            }

            var dataP = cargar_ajax.run_server_ajax('Datos/GetDatabyDate', data);
            if (dataP != (false || undefined)) {
                if (dataP[0].promedioTI1 != null && dataP[0].promedioTI2 != null && dataP[0].promedioTE != null && dataP[0].promedioHI != null && dataP[0].promedioHE != null) {
                    var T1 = dataP[0].promedioTI1;
                    var T2 = dataP[0].promedioTI2;
                    var T3 = dataP[0].promedioTE;
                    var H1 = dataP[0].promedioHI;
                    var H2 = dataP[0].promedioHE;
                }else {
                    var T1 = 0;
                    var T2 = 0;
                    var T3 = 0;
                    var H1 = 0;
                    var H2 = 0;
                }
            } else {
                var T1 = 0;
                var T2 = 0;
                var T3 = 0;
                var H1 = 0;
                var H2 = 0;
            }

            var areaChartData = {
                labels: [
                    'Temperatura interna 1',
                    'Temperatura interna 2',
                    'Temperatura externa',
                    'Humedad interna',
                    'Humedad externa',
                ],
                datasets: [
                    {
                        label: 'Temperatura',
                        backgroundColor: 'rgb(213, 37, 37)',
                        borderColor: 'rgb(213, 37, 37)',
                        pointRadius: false,
                        pointColor: '#fff',
                        pointStrokeColor: 'rgba(60, 141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [T1, T2, T3, 0, 0],
                    },
                    {
                        label: 'Humedad',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [0, 0, 0, H1, H2],
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                datasetFill: false,
                legend: {
                    display: true,
                    position: 'bottom',
                },
                layout: {
                    padding: 10,
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            var barChartCanvas = $('#chartColmenaId').get(0).getContext('2d')

            char = new Chart(barChartCanvas, {
                type: 'bar',
                data: areaChartData,
                options: areaChartOptions
            })

        });
    },
}
jQuery(document).ready(function () {
    datos.default(this);
    grafica.selectFechas(this);
});