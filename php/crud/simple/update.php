<?php
// conexión a la bd
require_once('conexión.php');

// definir variables y asociar con campos del formulario 

/* A diferencia de add, aquí incluimos el id para poder buscar el dato a editar */
$id       = $_POST['id'];
$usuario  = $_POST['usuario'];
$titulo   = $_POST['titulo'];
$autor    = $_POST['autor'];
$fecha    = $_POST['fecha'];
$genero   = $_POST['genero'];
$idioma   = $_POST['idioma'];
$prestado = $_POST['prestado'];
$formato  = $_POST['formato'];

// Sanear y validar los datos

// sentencia preparada

/* También se podría dividir en 3 strings concatenados:
 * 1. UPDATE into tabla 
 * 2. SET campo1=:campo1... 
 * 3. WHERE id=:id
 * */
$sql = 'UPDATE INTO libros SET id=:id, usuario=:usuario, titulo=:titulo, autor=:autor, fecha=:fecha, genero=:genero, idioma=:idioma, prestado=:prestado, :formato WHERE id=:id';

$sth = $conn->prepare($sql);
// vinculamos parámetros con valores
$sth->bindParam(':id', $id);
$sth->bindParam(':usuario', $usuario);
$sth->bindParam(':titulo', $titulo);
$sth->bindParam(':autor', $autor);
$sth->bindParam(':fecha', $fecha);
$sth->bindParam(':genero', $genero);
$sth->bindParam(':idioma', $idioma);
$sth->bindParam(':prestado', $prestado);
$sth->bindParam(':formato', $formato);
// ejecutamos la sentencia
$sth->execute();
?>
