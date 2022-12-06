<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0  title-color">Usuarios</h1>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 ml-auto text-center">
                <a type="button" href="" id="btnNuevoUsuario" class="btn btn-outline-light">
                    Nuevo usuario <span><i class="fa-solid fa-user-plus"></i></span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div style="padding-bottom: 1rem; padding-top: 4rem;">
            <table id="tblUsuarios" class="table table-borderless responsive nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Nivel</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($DATA_USUARIOS != False) {
                        foreach ($DATA_USUARIOS as $row) {
                    ?>
                    <tr id="tr_<?= $row->id_usuario ?>">
                        <td>
                            <?= $row->nombre . ' ' . $row->apellidoPaterno . ' ' . $row->apellidoMaterno ?>
                        </td>
                        <td>
                            <?= $row->email ?>
                        </td>
                        <td>
                            <?=$row->nivel?>
                        </td>
                        <td>
                            <a id="btnEditarUsuario" type="button" data-id="<?= $row->id_usuario; ?>" href="">
                                <i class="fa-solid fa-pen-to-square" data-id="<?= $row->id_usuario ?>"></i>
                            </a>
                            /
                            <a id="btnEliminarUsuario" type="button"  data-id="<?= $row->id_usuario; ?>" href="">
                                <i class="fa-solid fa-trash-can" data-id="<?= $row->id_usuario ?>" style="color: red;"></i>
                            </a>
                        </td>
                    </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="modalUsuario" style="display: none;" aria-hidden="true">
                <?php $this->load->view('usuarios/modalUsuario'); ?>
            </div>