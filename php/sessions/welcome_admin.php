<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Inicio de sesión (test)</title>
    </head>
    <?php session_start(); ?>
    <body>
        <!-- Cuerpo -->
        <h1>Panel de control</h1>
        <!-- Control de sesión iniciada -->
        <?php if (isset($_SESSION['alias']) === false) { ?>
        <p>No has iniciado sesión</p>
        <?php } elseif ($_SESSION['rol'] !== 'a') { ?>
        <p>No tienes permiso para acceder a esta página. Por favor inicie sesión como administrador </p>
        <?php } else { ?>
        <!-- cuerpo del panel de control -->
        <?php } ?>
    </body>
</html>
