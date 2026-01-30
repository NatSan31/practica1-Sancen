<?php
$host = "localhost";
$db   = "sakila";
$user = "db_21031041";
$pass = "21031041"; // en WSL normalmente root no tiene password

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8",
        $user,
        $pass
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
