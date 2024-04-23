<div class="container-fluid">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <div class="card  m-1 p-1 bg-prussian-blue">
                <div class="card-body text-light-gray">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h1 class="card-title text-center">Inicio de sesion</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3 text-center">
                            <img src="<?= base_url('public/img/icono-login.png') ?>" alt="icono-login" height="100"
                                width="100">
                        </div>
                    </div>
                    <form action="#" class="row gap-3" id="form">
                        <div class="col-md-12">
                            <label for="email" class="form-label">Correo: </label>
                            <input type="email" name="email" id="email" class="form-control">
                            <div class="col-md-12">
                                <label for="password" class="form-label">Contraseña: </label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-orange-c text-light-gray">Iniciar
                                    sesión</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>