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
        <h1>Inicio de sesión</h1>
        <!-- Entradas de menú -->
        <p><a href='welcome_admin.php'>Administración</a></p>
        <p><a href='welcome_user.php'>Página de usuario</a></p>
        <?php if (isset($_SESSION['alias']) === false) { ?>
        <!-- Bienvenida invitado -->
        <p>Bievenido. Inicia sesión o regístrate para avanzar </p>
        <?php } else { ?>
        <!-- Bienvenida usuario registrado -->
        <p>Bienvenido, <?= $_SESSION['alias']?> (<a href="logout.php">Cerrar sesión</a>) </p>

        <!-- Formulario de login -->
        <form action='log_in.php' method='post'>
            <fieldset>
                <legend>Inicia sesión</legend>
                <input type='text' name='alias' title='alias' required='required' />
                <input type='pass' name='pass' title='pass' required='required' />
                <input type='submit' value='Log in' />
            </fieldset>
        </form>

        <!-- Formulario de registro (nuevo usuario) -->
        <form action='sign_up.php' method='post'>
            <fieldset>
                <legend>Nuevo usuario</legend>
                <input type='text' name='alias' title='alias'  /><br />
                <input type='pass' name='pass' title='pass' /><br />
                <!-- 
                    otros campos necesarios se insertan "ocultos"
                    - tipo de usuario (normal o admin p.e)
                -->
                <input type='hidden' name="rol" value='c' />
                <input type='submit' value='Create an account' />
            </fieldset>
        </form>
    </body>
</html>
