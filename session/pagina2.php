<?php
session_start();

// Verifica si la sesión está activa
if (!isset($_SESSION['nombre']) || (time() - $_SESSION['last_activity'] > 60)) {
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header('Location: index.php'); // Redirige si no hay sesión activa o ha pasado el tiempo
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Principal</title>
</head>
<body>
<h1>Hola, te has logueado con éxito</h1>
<p>Nombre: <?= $_SESSION['nombre'] ?></p>
<p>Edad: <?= $_SESSION['edad'] ?></p>
<p>Pais: <?= $_SESSION['pais'] ?></p>

<a href="cerrar.php">Cerrar sesión</a>
</body>
</html>