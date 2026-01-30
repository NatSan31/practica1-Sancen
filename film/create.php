<?php
require "../config/db.php";

if ($_POST) {
    $sql = "INSERT INTO film (title, language_id, rental_duration, rental_rate, replacement_cost)
            VALUES (?, 1, 3, ?, 20.00)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['title'],
        $_POST['rental_rate']
    ]);

    header("Location: index.php");
}
?>

<h1>Nueva Película</h1>

<form method="POST">
    <label>Título:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Precio renta:</label><br>
    <input type="number" step="0.01" name="rental_rate" required><br><br>

    <button>Guardar</button>
</form>
