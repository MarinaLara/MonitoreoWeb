<?php
$nombre = $this->session->userdata('nombre');
?>
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0  title-color">Bienvenido <?= $nombre;?></h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div style="padding-bottom: 1rem;">