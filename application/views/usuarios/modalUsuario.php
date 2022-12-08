<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="htitleModalUsuarios"></h4>
            <button type="button" class="close exit" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="frmUsuarios" name="frmUsuarios" class="form-horizontal">
                <input type="hidden" id="txtId">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="txtNombreUsuario">Nombre</label>
                            <input id="txtNombreUsuario" type="text" class="form-control">
                        </div>
                        <div class="col">
                            <label for="txtApellidoPaterno">Apellido Paterno</label>
                            <input id="txtApellidoPaterno" type="text" class="form-control">
                        </div>
                        <div class="col">
                            <label for="txtApellidoMaterno">Apellido Materno</label>
                            <input id="txtApellidoMaterno" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="txtEmail">Email</label>
                            <input id="txtEmail" type="text" class="form-control">
                        </div>
                        <div class="col">
                            <label for="selNivel">Nivel</label>
                            <select id="selNivel" class="custom-select">
                                <option style="color: white!important;">Seleccione un nivel...</option>
                                <?php
                                if ($DATA_NIVELES != False) {
                                    foreach ($DATA_NIVELES as $row) {
                                ?>
                                <option style="color: white!important;" value="<?= $row->id_nivelUsuario ?>" >
                                    <?= $row->nivel ?>
                                </option>
                                <?php
                                    
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="selEmpresa">Empresa</label>
                            <select id="selEmpresa" class="custom-select">
                                <option style="color: white!important;">Seleccione una empresa...</option>
                                <?php
                                if ($DATA_EMPRESAS != False) {
                                    foreach ($DATA_EMPRESAS as $row) {
                                ?>
                                <option style="color: white!important;" value="<?= $row->id_empresa ?>" >
                                    <?= $row->razonSocial ?>
                                </option>
                                <?php
                                    
                                    }
                                }
                                ?>
                            </select>
                        </div>
                                
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="txtPass">Contraseña</label>
                            <div class="input-group mb-2">
                                <input type="password" autocomplete="off" class="form-control" id="txtPass"
                                    placeholder="******">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <a href="#" class="btn-outline-secondary" id="eyeButtonPass">
                                            <i id="iEye" class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="txtConfirmPass">Confirmar Contraseña</label>
                            <div class="input-group mb-2">
                                <input type="password" autocomplete="off" class="form-control" id="txtConfirmPass"
                                    placeholder="******">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <a href="#" class="btn-outline-secondary" id="eyeButtonCPass">
                                            <i id="iEyeC" class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger exit" data-dismiss="modal">Cerrar</button>
            <button type="button" id="btnGuardarUsuario" class="btn btn-success">Guardar</button>
        </div>
    </div>

</div>