<?php
$dsn = 'mysql:host=autorack.proxy.rlwy.net;port=59716;dbname=railway;charset=utf8mb4';
$username = 'root';
$password = 'MqwWgOLHcmdoVukKKGfohqdigwQXMwWY';

try {
    // Crear una nueva conexión PDO
    $conn = new PDO($dsn, $username, $password);

    // Configurar el modo de error para que lance excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Realizar la consulta
    $query = $conn->query("SELECT id, description, stock, price FROM products");

    // Obtener todos los resultados
    $products = $query->fetchAll(PDO::FETCH_ASSOC);

    // Devolver los datos en formato JSON
    header('Content-Type: application/json');
    echo json_encode($products);

} catch (PDOException $e) {
    // Devolver el error en formato JSON
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
}

