<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0  title-color">Empresas</h1>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 ml-auto text-center">
                <a type="button" href="" id="btnNuevaEmpresa" class="btn btn-outline-light">
                    Nueva Empresa <span><i class="fa-solid fa-user-plus"></i></span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div style="padding-bottom: 1rem; padding-top: 4rem;">
            <table id="tblEmpresa" class="table table-borderless responsive nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Contacto</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($DATA_EMPRESAS != False) {
                        foreach ($DATA_EMPRESAS as $row) {
                    ?>
                    <tr id="tr_<?= $row->id_empresa ?>">
                        <td>
                            <?= $row->razonSocial  ?>
                        </td>
                        <td>
                            <?= $row->nombreContacto ?>
                        </td>
                        <td>
                            <?=$row->correoContacto?>
                        </td>
                        <td>
                            <?=$row->telefonoContacto?>
                        </td>
                        <td>
                            <a id="btnEditarEmpresa" type="button" data-id="<?= $row->id_empresa; ?>" href="">
                                <i class="fa-solid fa-pen-to-square" data-id="<?= $row->id_empresa ?>"></i>
                            </a>
                            /
                            <a id="btnEliminarEmpresa" type="button"  data-id="<?= $row->id_empresa; ?>" href="">
                                <i class="fa-solid fa-trash-can" data-id="<?= $row->id_empresa ?>" style="color: red;"></i>
                            </a>
                        </td>
                    </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="modalEmpresa" style="display: none;" aria-hidden="true">
                <?php $this->load->view('empresas/modalEmpresas'); ?>
            </div>