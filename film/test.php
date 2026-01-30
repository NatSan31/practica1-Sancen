<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Intentamos cargar la configuración
require "../config/db.php";

if (isset($pdo)) {
    echo "✅ ¡Conexión exitosa a la base de datos Sakila!<br>";
    
    // Prueba rápida: Contar cuántas películas hay
    $stmt = $pdo->query("SELECT COUNT(*) FROM film");
    $total = $stmt->fetchColumn();
    echo "Total de películas en la tabla 'film': " . $total;
} else {
    echo "❌ La conexión no se estableció correctamente.";
}
?>