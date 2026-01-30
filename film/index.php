<?php

require "../auth/auth.php";
require "../config/db.php";


// Habilitar errores para depuración
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluir la conexión
require "../config/db.php";

try {
    // Consultamos las últimas 20 películas agregadas
    $sql = "SELECT film_id, title, rental_rate, last_update FROM film ORDER BY film_id DESC LIMIT 20";
    $stmt = $pdo->query($sql);
    $peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al consultar películas: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Películas - Sakila</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { padding: 10px 15px; background: #28a745; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>

    <h1>Películas en Sakila</h1>
    
    <div style="margin-bottom: 20px;">
        <a href="new.php" class="btn">+ Agregar Nueva Película</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Tarifa de Renta</th>
                <th>Última Actualización</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peliculas as $p): ?>
            <tr>
                <td><?php echo $p['film_id']; ?></td>
                <td><?php echo htmlspecialchars($p['title']); ?></td>
                <td>$<?php echo $p['rental_rate']; ?></td>
                <td><?php echo $p['last_update']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>