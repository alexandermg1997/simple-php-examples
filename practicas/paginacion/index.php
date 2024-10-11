<?php
// Configuración de la base de datos
$servername = "localhost"; // Utilizar su servidor de MySQL
$username = "erasmomg"; // Utilizar su usuario de MySQL
$password = "aldea*2017"; // Utilizar su contraseña de MySQL
$dbname = "paginacion"; // Utilizar el nombre de su base de datos

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

    $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $postPorPagina = 5; // Cantidad de artículos por página

    $inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

    $articulos = $conn->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT :inicio, :postPorPagina");

    // Vincular parámetros para evitar inyección SQL
    $articulos->bindParam(':inicio', $inicio, PDO::PARAM_INT);
    $articulos->bindParam(':postPorPagina', $postPorPagina, PDO::PARAM_INT);

    // Ejecutar la consulta
    $articulos->execute();

    // Obtener los resultados
    $resultados = $articulos->fetchAll(PDO::FETCH_ASSOC);

    // Si llegamos aquí, la conexión fue exitosa
    $conexionExitosa = true;

    if (!$resultados) {
        header('Location: index.php');
        exit;
    }

    try {
        $totalArticulos = $conn->query('SELECT COUNT(*) as total FROM articulos')->fetch(PDO::FETCH_ASSOC)['total'];
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $numeroDePaginas = (int)ceil($totalArticulos / $postPorPagina);

} catch (PDOException $e) {
    // Manejo del error
    error_log($e->getMessage()); // Registra el error en un archivo de log
    $error = "Lo sentimos, hubo un problema al conectar a la base de datos.";
}


require 'index.view.php';

