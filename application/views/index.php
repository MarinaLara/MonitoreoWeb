<div class="row g-0 d-flex align-items-center">
    <div class="col-sm-12 col-md-6 d-flex justify-content-center" style="align-items: center;">
        <img src="<?= base_url() ?>recursos/imagenes/logoLogin.png" alt="Logo">
    </div>

    <div class="col-sm-12 col-md-6">
        <div class="row d-flex justify-content-center" style="margin-bottom: 10%; margin-top: 10%;">
            <div class="col-sm-12 col-md-12">
                <h1>Monitoreo de colmenas Sonora</h1>
            </div>
        </div>
        <form id="login" autocomplete="off">
            <div class="form-group row d-flex justify-content-center">
                <div style="margin-bottom: 3%;" class="col-10 ">
                    <span class="textColor" for="exampleInputEmail1">Correo</span>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
            </div>
            <div class="form-group row d-flex justify-content-center">
                <div style="margin-bottom: 3%;" class="col-10">
                    <span class="textColor" for="input_password">Contraseña</span>
                    <div class="input-group mb-2">
                        <input type="password" autocomplete="off" class="form-control" id="input_password"
                            placeholder="******">
                        <div class="input-group-prepend">
                            <div style="position:relative;margin-left:-43px;border:none;background-color: #e8f0fe;" class="input-group-text">
                                <a href="#" id="eyeButton" style="color:#212529;"><i id="iEye" class="fa-solid fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                    <a id="emailHelp" href="<?= base_url() ?>Inicio/Recuperar" type="button">Olvide mi contraseña.</a>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-secondary btnInicio">Entrar</button>
            </div>
        </form>
    </div>
</div>