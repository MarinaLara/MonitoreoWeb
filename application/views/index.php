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
                    <span class="textColor" for="inlineFormInputGroup">Contraseña</span>
                    <div class="input-group mb-2">
                        <input type="password" autocomplete="off" class="form-control" id="inlineFormInputGroup"
                            placeholder="***">
                        <div class="input-group-prepend">
                            <div style="position:relative;margin-left:-43px;" class="input-group-text">
                                <span><i class="fa-solid fa-eye"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="padding-top: 3%;" class="form-group row d-flex justify-content-center">
                <div class="col-10 ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>