<?php

$host = 'localhost';
$db = 'test';
$user = 'root';
$pass = '';

// MySQL/MariaDB
$dbh = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass);

// PostgreSQL
// $dbh = new PDO('pgsql:host=' . $host . ';dbname=' . $dbname, $username, $password);

?>
