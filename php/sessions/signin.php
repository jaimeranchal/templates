<?php session_start(); ?>
<!-- Mensaje de información -->
<?php
/* Conexión a base de datos */
require_once('connection.php');

// Variables
$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
$usuario = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

// patrones para realizar chequeo
$user_regex = '/^[A-Za-z][A-Za-z0-9]{3,31}$/';
$pass_regex = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';

// Control de formato (usuario)
if (preg_match($user_regex, $usuario) === 0) {
?>

<!-- ERROR: Nombre de usuario -->
<div>
    <h3>Algo ha ido regular</h3>
    <p>Tu nombre de usuario:</p>
    <ul>
      <li>Debe empezar con una letra.</li>
      <li>Mínimo 4 - máximo 32 caracteres</li>
      <li>Sólo se admiten letras y números</li>
    </ul>
</div>

<?php 
// Control de formato (contraseña)
} elseif (preg_match($pass_regex, $pass) === 0) { ?>

<!-- ERROR: Contraseña -->
    <h3>Algo ha ido regular</h3>
    <p>Tu contraseña no cumple alguno de los siguientes requisitos:</p>
    <ul>
      <li>8 caracteres mínimo</li>
      <li>Debe contener al menos 1 número</li>
      <li>Debe contener al menos una mayúscula</li>
      <li>Debe contener al menos uno de los siguientes caracteres especiales: <code>!@#$%^&amp;*-</code></li>
    </ul>

<?php } else { 

/* Sentencia preparada */
// Insertamos datos en la bd
$sql = "INSERT INTO usuarios(usuario, pass, activo, rol) values(?,?,?,?)";
$stp = $conn->prepare($sql);
$exito = $stp->execute(array($usuario, $pass, 'y', 'u'));

/* Control de errores */
if ($exito) {
?>
    <h3>¡Enhorabuena!<h3>
    <p>Usuario registrado con éxito</p>
<?php } else { ?>
    <p>Ha habido algún tipo de error durante el registro</p>
