<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="htitleModalEmpresa"></h4>
            <button type="button" class="close exit" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="frmEmpresa" name="frmEmpresa" class="form-horizontal">
                <input type="hidden" id="txtId">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="txtRazonSocial">Razon Social</label>
                            <input id="txtRazonSocial" type="text" class="form-control">
                        </div>
                        <div class="col">
                            <label for="txtnombreContacto">Contacto</label>
                            <input id="txtnombreContacto" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="txtcorreoContacto">Correo</label>
                            <input id="txtcorreoContacto" type="text" class="form-control">
                        </div>
                        <div class="col">
                            <label for="txttelefonoContacto">Telefono</label>
                            <input id="txttelefonoContacto" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                
                    
            </form>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger exit" data-dismiss="modal">Cerrar</button>
            <button type="button" id="btnGuardarEmpresa" class="btn btn-success">Guardar</button>
        </div>
    </div>

</div>