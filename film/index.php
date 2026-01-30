<?php
// 1. Configuración de errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Importar conexión
require "../config/db.php";

try {
    // Consultamos las últimas 20 películas para ver los cambios recientes
    // Seleccionamos film_id, title y rental_rate que son los campos que estamos manejando
    $sql = "SELECT film_id, title, rental_rate FROM film ORDER BY film_id DESC LIMIT 20";
    $stmt = $pdo->query($sql);
    $peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al consultar la base de datos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Películas - Sakila</title>
    <style>
        body { font-family: sans-serif; margin: 40px; background-color: #f9f9f9; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:hover { background-color: #f1f1f1; }
        
        .btn { padding: 8px 12px; text-decoration: none; border-radius: 4px; font-size: 14px; display: inline-block; }
        .btn-add { background-color: #28a745; color: white; margin-bottom: 20px; }
        .btn-edit { background-color: #ffc107; color: #212529; margin-right: 5px; }
        .btn-delete { background-color: #dc3545; color: white; }
        
        .actions { white-space: nowrap; }
    </style>
</head>
<body>

    <h1>🎬 Listado de Películas (Sakila)</h1>
    
    <a href="new.php" class="btn btn-add">+ Agregar Nueva Película</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Tarifa de Renta</th>
                <th style="text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($peliculas) > 0): ?>
                <?php foreach ($peliculas as $p): ?>
                <tr>
                    <td><?php echo $p['film_id']; ?></td>
                    <td><strong><?php echo htmlspecialchars($p['title']); ?></strong></td>
                    <td>$<?php echo $p['rental_rate']; ?></td>
                    <td class="actions" style="text-align: center;">
                        <a href="edit.php?id=<?php echo $p['film_id']; ?>" class="btn btn-edit">Editar</a>
                        
                        <a href="delete.php?id=<?php echo $p['film_id']; ?>" 
                           class="btn btn-delete" 
                           onclick="return confirm('¿Estás seguro de que deseas eliminar esta película?');">
                           Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center;">No se encontraron películas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>