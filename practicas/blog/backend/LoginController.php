<?php
require_once '../backend/Connection.php';

class LoginController
{

    function login($email, $password)
    {
        try {
            $db = Connection::getConnection();

            $stmt = $db->prepare("SELECT id, nombre, email, password_hash, rol FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                // Login exitoso
                return [
                    'success' => true,
                    'message' => 'Login exitoso',
                    'user' => [
                        'id' => $user['id'],
                        'nombre' => $user['nombre'],
                        'email' => $user['email'],
                        'rol' => $user['rol']
                    ]
                ];
            } else {
                // Login fallido
                return [
                    'success' => false,
                    'message' => 'Credenciales inválidas'
                ];
            }
        } catch (PDOException $e) {
            // Error en la base de datos
            return [
                'success' => false,
                'message' => 'Error en el servidor: ' . $e->getMessage()
            ];
        }
    }
}


// Uso de la función de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(htmlspecialchars(strip_tags(trim($_POST['email'])), ENT_QUOTES), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';

    $controller = new LoginController();
    $result = $controller->login($email, $password);

    if ($result['success']) {
        // Iniciar sesión y redirigir
        session_start();
        $_SESSION['user'] = $result['user'];
        $_SESSION['last_activity'] = time();
        header('Location: IndexController.php');
        exit();
    } else {
        $error_message = $result['message'];
    }
}

require '../views/login.view.php';