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
        <h1>Página de usuario</h1>
        <!-- Control de sesión iniciada -->
        <?php if (isset($_SESSION['alias']) === false) { ?>
        <p>No has iniciado sesión</p>
        <?php } else { ?>
        <!-- cuerpo de  la página de usuario -->
        <p>Bienvenido, <?= $_SESSION['alias']?> (<a href="logout.php">Cerrar sesión</a>) </p>
        <?php } ?>
    </body>
</html>
