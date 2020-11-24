<?php
// conexión a la bd
require_once('conexión.php');

// Comprobar si se ha definido el campo del formulario
if (isset($_POST['id'])) {
    // filtrar y validar id
    if (!filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
        die('Error: el id proporcionado no es un entero');
    } else {

        $id  = $_POST['id'];

        // sentencia preparada
        $sql = 'DELETE FROM biblioteca WHERE id=?';
        $sth = $conn->prepare($sql);
        $sth->execute(array($id));
    }
}
?>
