<?php

require "../auth/auth.php";
require "../config/db.php";

$stmt = $pdo->query("SELECT film_id, title, release_year, rental_rate FROM film LIMIT 50");
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Películas (Sakila)</h1>
<a href="create.php">➕ Nueva película</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Año</th>
        <th>Precio</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($films as $film): ?>
    <tr>
        <td><?= $film['film_id'] ?></td>
        <td><?= $film['title'] ?></td>
        <td><?= $film['release_year'] ?></td>
        <td><?= $film['rental_rate'] ?></td>
        <td>
            <a href="edit.php?id=<?= $film['film_id'] ?>">✏️</a>
            <a href="delete.php?id=<?= $film['film_id'] ?>" onclick="return confirm('¿Seguro?')">🗑️</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
