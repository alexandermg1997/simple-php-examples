<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "erasmomg"; // Cambia según tu configuración
$password = "aldea*2017"; // Cambia según tu configuración
$dbname = "prueba_consola"; // Cambia según tu base de datos

// Inicializar variables
$nombre = "";
$correo = "";
$mensaje = "";
$error = "";
$conexionExitosa = false;

try {
    // Crear una nueva conexión PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Configurar el modo de error para lanzar excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si llegamos aquí, la conexión fue exitosa
    $conexionExitosa = true;
} catch (PDOException $e) {
    // Manejo del error
    error_log($e->getMessage()); // Registra el error en un archivo de log
    $error = "Lo sentimos, hubo un problema al conectar a la base de datos.";
}


// Manejar solicitudes GET para cargar usuarios
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $stmt = $conn->prepare("SELECT id, nombre, email FROM usuarios");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//    header('Content-Type: application/json'); // Asegúrate de establecer el tipo de contenido
    echo json_encode($result); // Devuelve los datos en formato JSON
}
