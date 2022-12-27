<?php
$Colmena = "";
if ($DATOSCOLMENAID != False) {
    foreach ($DATOSCOLMENAID as $row) {
        $Colmena = $row->identificadorColmena;
    }
}

?>
<input type="hidden" name="txtIdColmena" id="txtIdColmena" value="<?= $ID ?>">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2" style="padding-bottom: 3%;padding-top: 2%;">
            <ul class="nav nav-tabs d-flex justify-content-between navGrafAl" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active btnNav" id="grafics-tab" data-bs-toggle="tab"
                        data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane"
                        aria-selected="false">GRAFICAS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btnNav" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">ALERTAS</button>
                </li>
            </ul>
        </div>
        <div class="row mb-2">
            <div class="col-sm-12 col-md-6 col-lg-6" style="align-self: center;">
                <h1 class="m-0  title-color">Datos Colmena <?= $Colmena ?>
                </h1>
            </div>
            <div id="divPicker" class="col-sm-12 col-md-6 col-lg-6">
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
</section>

<section class="content">
    <div class="container-fluid">
        <div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <?php $this->load->view('datos/tabla'); ?>
                </div>
                <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel"
                    aria-labelledby="profile-tab" tabindex="0">
                    <?php $this->load->view('datos/graficaColmena'); ?>
                </div>
            </div>