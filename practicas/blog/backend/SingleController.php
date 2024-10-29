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

$id = (isset($_GET['id'])) ? (int)$_GET['id'] : 1;
$post = $single->getPost($id);

$single->SingleView();
