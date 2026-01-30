<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Nueva Película</title>
</head>
<body>
    <h2>Registrar Película en Sakila</h2>

    <form action="create.php" method="POST">
        <div>
            <label>Título:</label><br>
            <input type="text" name="title" required placeholder="Ej: Inception">
        </div>
        <br>
        <div>
            <label>Tarifa de Renta (Rental Rate):</label><br>
            <input type="number" name="rental_rate" step="0.01" value="4.99" required>
        </div>
        <br>
        <button type="submit">Guardar Película</button>
    </form>

    <br>
    <a href="index.php">Volver al listado</a>
</body>
</html>