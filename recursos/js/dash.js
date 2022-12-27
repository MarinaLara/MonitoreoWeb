var char;
var datosSelect = new Array();
function sumarDias(fecha, dias) {
    fecha.setDate(fecha.getDate() - dias);
    return fecha;
}

var dash = {
    default: function () {
        var dataP = cargar_ajax.run_server_ajax('Datos/getDataDash')
        if (dataP !== false) {
            dataP.forEach(elem => {
                var data = {
                    id: elem.id_colmena,
                    text: elem.identificadorColmena,
                    "selected": true,
                }
                datosSelect.push(data);
            });
        }
        $(document).ready(function () {
            $('#columnsHives').select2({
                data: datosSelect,
                tags: true,
            }).on("select2:unselecting", function (e) {
                $(this).data("unselecting", true);
                //quitar data/colmenas
                var textSelected = e.params.args.data.text;
                var posArray = char.data.labels.indexOf(textSelected);

                char.data.labels.splice(posArray, 1); // remove the label

                char.data.datasets.forEach(dataset => {
                    dataset.data.splice(posArray, 1); //remove the data
                });

                char.update();
            }).on("select2:select", function (e) {
                //agregar data/colmenas
                const data = char.data;
                var textSelected = e.params.data.text;

                if (data.datasets.length > 0) {
                    if (dataP !== false) {
                        dataP.forEach(elem => {
                            if (textSelected == elem.identificadorColmena) {
                                data.labels.push(elem.identificadorColmena); //agregando label
                                data.datasets[0].data.push(elem.promedioTI1);
                                data.datasets[1].data.push(elem.promedioTI2);
                                data.datasets[2].data.push(elem.promedioTE);
                                data.datasets[3].data.push(elem.promedioHI);
                                data.datasets[4].data.push(elem.promedioHE);
                                char.update();
                            }
                        });
                    }
                }
            });
        })
        //Chart
        Chart.defaults.global.defaultFontColor = '#fff';
        Chart.defaults.global.defaultFontSize = 20;
        Chart.defaults.global.defaultFontFamily = 'Lato';
        var name = [];
        var valueT1 = [];
        var valueT2 = [];
        var valueT3 = [];
        var valueH1 = [];
        var valueH2 = [];

        if (dataP != (false || undefined)) {
            for (var i in dataP) {
                name.push(dataP[i].identificadorColmena);
                valueT1.push(dataP[i].promedioTI1);
                valueT2.push(dataP[i].promedioTI2);
                valueT3.push(dataP[i].promedioTE);
                valueH1.push(dataP[i].promedioHI);
                valueH2.push(dataP[i].promedioHE);
            }
        }

        var areaChartData = {
            labels: name,
            datasets: [
                {
                    label: 'Temperatura interna 1',
                    backgroundColor: 'rgb(213, 37, 37)',
                    borderColor: 'rgb(213, 37, 37)',
                    pointRadius: false,
                    pointColor: '#fff',
                    pointStrokeColor: 'rgba(60, 141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: valueT1,
                },
                {
                    label: 'Temperatura interna 2',
                    backgroundColor: 'rgb(213, 37, 37)',
                    borderColor: 'rgb(213, 37, 37)',
                    pointRadius: false,
                    pointColor: '#fff',
                    pointStrokeColor: 'rgba(60, 141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: valueT2,
                },
                {
                    label: 'Temperatura externa',
                    backgroundColor: 'rgb(213, 37, 37)',
                    borderColor: 'rgb(213, 37, 37)',
                    pointRadius: false,
                    pointColor: '#fff',
                    pointStrokeColor: 'rgba(60, 141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: valueT3,
                },
                {
                    label: 'Humedad interna',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: valueH1,
                },
                {
                    label: 'Humedad externa',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: valueH2,
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
    },
    grafica: function () {
        //hoy
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        today = yyyy + '/' + mm + '/' + dd;

        //hace una semana
        var d = new Date(today);
        var weekago = sumarDias(d, 7);
        var dd = String(weekago.getDate()).padStart(2, '0');
        var mm = String(weekago.getMonth() + 1).padStart(2, '0');
        var yyyy = weekago.getFullYear();
        weekago = yyyy + '/' + mm + '/' + dd;

        //datapicker
        $('#selFechasPeriod').daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 30,
            startDate: weekago,
            endDate: today,
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
    },
}

jQuery(document).ready(function () {
    dash.default(this);
    dash.grafica(this);
});