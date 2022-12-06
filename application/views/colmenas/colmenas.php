<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0  title-color">Colmenas</h1>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 ml-auto text-center">
                <a type="button" href="" id="btnNuevaColmena" class="btn btn-outline-light">
                    Nueva Colmena 
                    <span style="padding: 5px;">
                        <i class="fa-brands fa-hive"></i>
                        <i class="fa-solid fa-plus" style="font-size: small;position: fixed;"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div style="padding-bottom: 1rem; padding-top: 4rem;">
            <table id="tblColmenas" class="table table-borderless responsive nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>Nombre Colmena</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($DATA_COLMENAS != False) {
                        foreach ($DATA_COLMENAS as $row) {
                    ?>
                    <tr id="tr_<?= $row->id_colmena ?>">
                        <td>
                            <a href="<?= base_url()?>Datos/DatosColmena/<?= $row->id_colmena?>" style>
                                <span style="color: white;text-shadow: #c3e1ff 0.1em 0.1em 0.2em;"><?= $row-> identificadorColmena ?></span>
                            </a>
                        </td>
                        
                        <td>
                            <a id="btnEditarColmena" type="button" data-id="<?= $row->id_colmena; ?>" href="">
                                <i class="fa-solid fa-pen-to-square" data-id="<?= $row->id_colmena ?>"></i>
                            </a>
                            /
                            <a id="btnEliminarColmena" type="button"  data-id="<?= $row->id_colmena; ?>" href="">
                                <i class="fa-solid fa-trash-can" data-id="<?= $row->id_colmena ?>" style="color: red;"></i>
                            </a>
                        </td>
                    </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="modalColmena" style="display: none;" aria-hidden="true">
                <?php $this->load->view('colmenas/modalColmena'); ?>
            </div>