<?php
$host = 'postgres';
$dbname = 'mydatabase';
$username = 'user';
$password = 'toor';

$dsn = "pgsql:host=$host; dbname=$dbname";

try {
    $pdo = new PDO($dsn, $username,$password);
    echo "Conexión a PostgreSQL exitosa!!!";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>