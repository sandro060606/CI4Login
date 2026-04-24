<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($titulo) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <h1><?= esc($titulo) ?></h1>
        <p>
            Bienvenido, <strong><?php esc(session()->get('nombreusuario')) ?></strong>
            tiene los accesos de tipo: <?= esc(session()->get('nivelacceso')) ?>
        </p>
        <hr>
        <p>Aqui se mostrara el DASHBOARD...</p>
        <a href="<?= base_url('auth/logout') ?>">Cerrar Sesion</a>
    </div>
    
</body>
</html>