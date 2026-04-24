<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h3>Login</h3>
                <h5>Iniciar Sesión en la Aplicacion</h5>
                <form action="<?= base_url('auth/login') ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="mb-2">
                        <label for="">Usuario:</label>
                        <input type="text" name="nombreusuario" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="">Clave</label>
                        <input type="password" name="claveacceso" class="form-control">
                    </div>
                    <div class="mb-2 text-end">
                        <button class="btn btn-primary">Iniciar Sesión</button>
                    </div>
                </form>

                <!-- Zona para mensaje que envia el BACKEND -->
                <!-- Los mensajes son Enviados desde AuthController.php -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <!-- El BACKEND nos envia un arreglo -->
                        <ul class="mb-0">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= $error?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('info')): ?>
                    <div class="alert alert-info"> <?= session()->getFlashdata('info') ?></div>
                <?php endif ?>
            </div>
        </div>
    </div>

</body>

</html>