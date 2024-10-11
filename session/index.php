<?php
session_start();

// Verifica si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aquí deberías validar las credenciales del usuario
    $_SESSION['nombre'] = 'Erasmo'; // Ejemplo de nombre
    $_SESSION['edad'] = 27; // Ejemplo de edad
    $_SESSION['pais'] = 'México'; // Ejemplo de país
    $_SESSION['last_activity'] = time(); // Establece el tiempo de última actividad

    session_regenerate_id(true); // Regenera el ID de sesión para mayor seguridad

    // Guarda la cookie PHPSESSID en el navegador
//    setcookie(session_name(), session_id(), time() + 3600, '/');

    // Obtiene el ID de sesión actual
    $sessionName = session_name();
    $sessionId = session_id();

    header('Location: pagina2.php'); // Redirige a la página principal
    exit();
}

// Actualiza el tiempo de última actividad
$_SESSION['last_activity'] = time();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
<h1>Página de Inicio de Sesión</h1>
<form method="POST">
    <input type="submit" value="Iniciar Sesión">
</form>
</body>
</html>