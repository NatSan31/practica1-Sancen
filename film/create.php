<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $sql = "INSERT INTO film (title, language_id, rental_duration, rental_rate, replacement_cost)
                VALUES (?, 1, 3, ?, 20.00)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['title'],
            $_POST['rental_rate']
        ]);

        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        echo "Error al guardar: " . $e->getMessage();
    }
}
?>
