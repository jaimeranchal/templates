<?php

$host = 'localhost';
$db = 'test';
$user = 'admin';
$password = '1234';

// Para bbdd en MySQL o MariaDB
try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    // selecciona el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado con éxito a la base de datos";
} catch(PDOException $e) {
    echo "Conexión fallida: " . $e->getMessage();
}

function closeConn() {
    $conn = null;
}
?>
