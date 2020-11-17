<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Acceso a BBDD (test)</title>
    </head>
<?php
// Importamos scripts y clases php (conexión y validación de datos)
require_once('connection.php');
require_once('validate.php');

//iniciamos conexion
$conn = new connection();

// Filtrar y validar datos 
if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
    validate::checkEmpty(['id'], $_POST)) {
    // Normalmente el id será un número
    $id = validate::int($_POST['id']);

    // borramos fila 
    $conn->delete($id);
    // cerramos conexion
    $conn->closedb();
}
?>
    <body>
        <!-- Cuerpo -->
        <ul>
          <li>Campo 1: <?= $campo1 ?>.</li>
          <li>Campo 2: <?= $campo2 ?>.</li>
          <li>Campo 3: <?= $campo3 ?>.</li>
        </ul>
    </body>
</html>
