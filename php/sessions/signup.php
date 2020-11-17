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
        <h1>Registro de nuevo usuario</h1>
        <?php
        /* Conexión a base de datos */
        require_once('connection.php');

        // Variables
        $usuario = filter_var($_POST['alias'], FILTER_SANITIZE_STRING);
        $usuario = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

        // patrones para realizar chequeo
        $user_regex = '/^[A-Za-z][A-Za-z0-9]{3,31}$/';
        $pass_regex = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';

        if (preg_match($user_regex, $usuario) === 0) {
        ?>

        <!-- Nombre de usuario no válido -->
        <div>
            <h3>Algo ha ido regular</h3>
            <p>Tu nombre de usuario:</p>
            <ul>
              <li>Debe empezar con una letra.</li>
              <li>Mínimo 4 - máximo 32 caracteres</li>
              <li>Sólo se admiten letras y números</li>
            </ul>
        </div>

        <?php } elseif (preg_match($pass_regex, $pass) === 0) { ?>
        <!-- Contraseña no válido -->
        <div>
            <h3>Algo ha ido regular</h3>
            <p>Tu contraseña:</p>
            <ul>
              <li>8 caracteres mínimo</li>
              <li>Debe contener al menos 1 número</li>
              <li>Debe contener al menos una mayúscula</li>
              <li>Debe contener al menos uno de los siguientes caracteres especiales: <code>!@#$%^&amp;*-</code></li>
            </ul>
        </div>

        <?php } else { 

        // Insertamos datos en la bd
        $sql = "INSERT INTO usuarios(usuario, pass, activo, rol) values(?,?,?,?)";
        $stp = $conn->prepare($sql);
        $exito = $stp->execute(array($usuario, $pass, 'y', 'u'));

        if ($exito) {
        ?>

        <div>
            <h3>¡Enhorabuena!<h3>
            <p>Usuario registrado con éxito</p>
        </div>
        <?php } else { ?>
        <div>
            <p>Ha habido algún tipo de error durante el registro</p>
        </div>
    </body>
</html>
