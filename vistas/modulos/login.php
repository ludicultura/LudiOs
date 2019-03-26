<!-- Login: En esta pagina los Ludis podran acceder a sus cuentas -->
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 offset-md-2 col-md-8 offset-sm-1 col-sm-10">
                <div class="card border-info">
                    <div class="card-header bg-dark">
                        <div class="card-title text-white">Iniciar Sesi&oacute;n</div>
                            <a href="#" style="float: right; font-size: 80%;">¿Se te olvid&oacute; tu contraseña?</a>
                        </div>
                        <div class="card-body pt-5">
                            <form action="?page=1" method="post" autocomplete="off" class="mb-4">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <i class="fas fa-user input-group-text"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="username" name="username" required>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <i class="fas fa-key input-group-text"></i>
                                    </div>
                                    <input type="password" class="form-control" placeholder="password" name="password" required>
                                </div>
                                <input type="submit" class="btn btn-success" value="Iniciar Sesi&oacute;n">
                            </form>
                            <?php displayErrors($errores) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>