<?php

$host = 'localhost';
$db = 'db_example';
$user = 'admin';
$pass = '1234';

// MySQL/MariaDB
$dbh = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass);

// PostgreSQL
// $dbh = new PDO('pgsql:host=' . $host . ';dbname=' . $dbname, $username, $password);

?>
