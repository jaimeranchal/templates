<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Inicio de sesión (test)</title>
    </head>
    <body>
        <!-- Cuerpo -->
        <h1>Sesión cerrada</h1>
        <?php

        session_start();
        // vaciar la información de sesión
        $_SESSION = array();
        // destruir la sesión
        session_destroy();

        ?>

        <p>Has cerrado sesión con éxito</p>

    </body>
</html>
