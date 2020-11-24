<?php
// inicio se sesión
session_start();
// vaciar la información de sesión
$_SESSION = array();
// destruir la sesión
session_destroy();
?>
<!-- Mensaje de confirmación al usuario -->
<p>Has cerrado sesión con éxito</p>
