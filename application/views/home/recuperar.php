<div class="row g-0 d-flex align-items-center contenedor">
    <div class="col-sm-12 col-md-6 d-flex justify-content-center" style="align-items: center;">
        <img src="<?= base_url() ?>recursos/imagenes/logoLogin.png" alt="Logo">
    </div>

    <div class="col-sm-12 col-md-6">
    <div class="row d-flex justify-content-center" style="margin-bottom: 10%; margin-top: 10%;">
            <div class="col-sm-12 col-md-12">
                <h1 style="text-transform: uppercase;">Recuperar contraseña</h1>
            </div>
        </div>
        <form id="recuperarPass" autocomplete="off">
            <div class="form-group row d-flex justify-content-center">
                <div style="margin-bottom: 3%;" class="col-10 ">
                    <span class="textColor" for="exampleInputEmail1">Correo</span>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-secondary btnInicio">Enviar</button>
            </div>
        </form>
    </div>
</div>