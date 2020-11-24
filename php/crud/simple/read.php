<?php
// conexión a la bd
require_once('conexión.php');

// sentencia preparada
// Recogemos los datos relevantes
$sth = $conn->prepare('SELECT titulo, autor, fecha FROM libros');
$sth->execute(array());
$resultado = $sth->fetchAll();
?>

<!-- lista o tabla html -->

<?php foreach ($resultado as $fila) { ?>
    <!-- elemento de lista o fila con formato -->
    <?= $fila['titulo'] ?>
    <!-- ... -->
<?php } ?>
