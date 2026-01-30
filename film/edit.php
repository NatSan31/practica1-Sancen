<?php
require "../config/db.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM film WHERE film_id = ?");
$stmt->execute([$id]);
$film = $stmt->fetch();

if ($_POST) {
    $sql = "UPDATE film SET title = ?, rental_rate = ? WHERE film_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['title'],
        $_POST['rental_rate'],
        $id
    ]);

    header("Location: index.php");
}
?>

<h1>Editar Película</h1>

<form method="POST">
    <input type="text" name="title" value="<?= $film['title'] ?>"><br><br>
    <input type="number" step="0.01" name="rental_rate" value="<?= $film['rental_rate'] ?>"><br><br>
    <button>Actualizar</button>
</form>

