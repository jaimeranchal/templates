<?php
// conexión a la bd
require_once('conexión.php');

// definir variables y asociar con campos del formulario
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
$sql = 'INSERT INTO libros values (null, :usuario, :titulo, :autor, :fecha, :genero, :idioma, :prestado, :formato)';

$sth = $conn->prepare($sql);
// vinculamos parámetros con valores
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
