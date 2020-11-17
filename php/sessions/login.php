<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Inicio de sesión (test)</title>
    </head>
    <body>
        <!-- Cuerpo -->
        <h1>Inicio de sesión</h1>
        <!-- Conexión a bbdd -->
        <?php 
        require_once('connection.db');

        $alias = $_POST['alias'];
        $pass = $_POST['pass'];

        /* Comprobación de datos */
        // Sentencia preparada
        $sql = 'SELECT * FROM usuario WHERE alias=:alias and pass=:pass';
        $stp = $conn->prepare($sql);
        $stp->bindParam(':alias', $alias);
        $stp->bindParam(':pass', $pass);
        $stop->execute();
        $result = $stop->fetch();

        if (empty($result)) { 
        ?>
        <!-- Error en usuario o contraseña -->
        <p>El nombre de usuario o la contraseña es incorrecto. Inténtalo otra vez</p>

        <!-- Inicio de sesión con éxito -->
        <?php
        } else {
            /* si hay un campo que controle que el usuario está activo */
            if ($result['activo'] === 'y') {
                session_start();
                $_SESSION['alias'] = $result['alias'];
                $_SESSION['rol'] = $result['rol'];
        ?>
        <p>Has iniciado sesión con éxito </p>
        <?php } else { ?>
        <p>Tu cuenta no ha sido activada aún </p>
        <?php } } ?>

    </body>
</html>
