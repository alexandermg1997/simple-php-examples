<?php
require_once 'Database.php';

session_start();

if (isset($_SESSION['user'])) {
    header('Location: ../frontend/dashboard.php');
    exit;
}

class RegisterController
{
    public function register($nombre, $email, $password)
    {
        try {
            $db = Database::getConnection();

            // Verificar si el email ya está registrado
            $stmt = $db->prepare("SELECT id FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->fetch()) {
                return [
                    'success' => false,
                    'message' => 'Este email ya está registrado'
                ];
            }

            // Crear el nuevo usuario
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare("INSERT INTO usuarios (nombre, email, password_hash) VALUES (:nombre, :email, :password_hash)");
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
            $stmt->execute();

            return [
                'success' => true,
                'message' => 'Usuario registrado exitosamente'
            ];
        } catch (PDOException $e) {
            error_log("Error de base de datos: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Error al registrar el usuario'
            ];
        }
    }
}


$error_message = '';
$success_message = '';
$nombre = $email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if ($password !== $confirm_password) {
        $error_message = 'Las contraseñas no coinciden';
    } else {
        $controller = new RegisterController();
        $result = $controller->register($nombre, $email, $password);

        if ($result['success']) {
            $success_message = 'Registro exitoso. Ahora puedes iniciar sesión.';
            $nombre = $email = '';
        } else {
            $error_message = $result['message'];
        }
    }
}

require '../frontend/register.claude.php';