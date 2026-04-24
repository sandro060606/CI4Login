<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de Acceso</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <div class="container text-center">
        <h1>Ud. no tiene los permisos requeridos</h1>
        <h3>Consulte con el administrador del sistema</h3>
        <a href="<?= base_url('auth/login') ?>">Cerrar Sesión</a>
    </div>
</body>

</html>