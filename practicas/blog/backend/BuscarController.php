<?php
require_once '../backend/Connection.php';

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: LoginController.php');
    exit;
}

class BuscarController
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Connection::getConnection();
    }

    public function getForSearch(string $buscar): array
    {
        $buscando = '%' . $buscar . '%';

        try {
            $stmt = $this->db->prepare("SELECT * FROM articulos WHERE titulo LIKE ? OR texto LIKE ?");
            $stmt->execute([$buscando, $buscando]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print_r("Error en la búsqueda: " . $e->getMessage());
            return [];
        }
    }

    function BuscarView(): void
    {
        require "../views/buscar.view.php";
    }

}

$buscar = new BuscarController();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['busqueda'])) {
    $posts = $buscar->getForSearch($_GET['busqueda']);
    $buscar->BuscarView();
} else {
    header('Location: IndexController.php');
    exit;
}