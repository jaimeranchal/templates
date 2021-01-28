<?php 
// Conexión a base de datos
require_once('conexion.db');

// Variables

$usuario = $_POST['usuario'];
$pass    = $_POST['pass'];

/* Comprobación de datos */
// Sentencia preparada
$sql = 'SELECT * FROM usuario WHERE usuario=:usuario and pass=:pass';
$stp = $dbh->prepare($sql);
$stp->bindParam(':usuario', $usuario);
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
        $_SESSION['usuario'] = $result['usuario'];
        $_SESSION['rol']     = $result['rol'];
?>
<p>Has iniciado sesión con éxito </p>
<?php } else { ?>
<p>Tu cuenta no ha sido activada aún </p>
<?php } } ?>
