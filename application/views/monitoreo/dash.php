<?php
$nombre = $this->session->userdata('nombre');
$fechaFin = date('Y-m-d');
$startdate = strtotime($fechaFin);
$enddate = strtotime("-1 weeks", $startdate);
$fechaIni = date("Y-m-d", $enddate);
?>
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2 " style="padding-bottom: 3%;padding-top: 2%;">
            <div class="d-flex justify-content-between">
                <div class="col-sm-6">
                    <h1 class="m-0  title-color">
                        Bienvenido <?= $nombre; ?>
                    </h1>
                </div>
                <div class="col-sm-6" style="text-align: end;">
                    <div class="form-group">
                        <label>Selección de periodo:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                            <input type="text" class="form-control float-right" id="selFechasPeriod">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2" style="padding-bottom: 3%;">
            <div class="d-flex justify-content-between" id="perro">
                <select class="form-control" id="columnsHives" multiple="multiple">
                </select>
            </div>
        </div>
    </div>

</section>

<section class="content" style="margin-top: 5%;">
    <div class="container-fluid">
        <div style="padding-bottom: 1rem;">
            <?php $this->load->view('datos/graficaColmena'); ?>