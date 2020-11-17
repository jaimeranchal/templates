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
    validate::checkEmpty(['campo1', 'campo2', 'campo3'], $_POST)) {
    // tantas líneas como campos. Usar método apropiado
    $campo1 = validate::str($_POST['campo1']);
    $campo2 = validate::str($_POST['campo2']);
    $campo3 = validate::str($_POST['campo3']);

    // añadimos campos
    $conn->add();
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
