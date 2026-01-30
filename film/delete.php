<?php
require "../auth/auth.php";
require "../config/db.php";


if (isset($_GET['id'])) {
    try {
        $sql = "DELETE FROM film WHERE film_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['id']]);
    } catch (PDOException $e) {
        // Sakila tiene restricciones de llaves foráneas, 
        // si la película está en inventario, no te dejará borrarla.
        die("No se pudo eliminar: La película está vinculada a otras tablas (inventario/rentas).");
    }
}

header("Location: index.php");
exit;
?>
