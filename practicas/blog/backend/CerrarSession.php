<?php

use JetBrains\PhpStorm\NoReturn;

class CerrarSession
{
    #[NoReturn] function cerrarSession(): void
    {
        session_start();
        session_unset(); // Elimina todas las variables de sesión
        session_destroy(); // Destruye la sesión

        // Elimina la cookie PHPSESSID del navegador
        setcookie(session_name(), '', time() - 3600, '/');

        header('Location: LoginController.php'); // Redirige a la página de login
        exit();
    }
}

$cerrar = new CerrarSession();
$cerrar->cerrarSession();