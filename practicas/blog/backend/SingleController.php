<?php
require_once '../backend/Connection.php';

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: LoginController.php');
    exit;
}

class SingleController
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Connection::getConnection();
    }

    public function getPost(int $id): false|array
    {
        $stmt = $this->db->prepare("SELECT * FROM articulos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function SingleView(): void
    {
        require "../views/single.view.php";
    }
}

$single = new SingleController();

// Obtener el ID de la URL
$id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? (int)$_GET['id'] : 0;

// Verificar si el ID es 0 o no es un número válido
if ($id <= 0) {
    // Redirigir al dashboard
    header("Location: IndexController.php");
    exit();
} else {
    // Ejecutar la función para obtener el post
    $post = $single->getPost($id);
}

$single->SingleView();
