<?php

require_once '../../login/backend/Database.php';

class Photos
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getImage(int $id): false|array
    {
        $query = "SELECT * FROM images WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Usar PDO::FETCH_ASSOC en lugar de MYSQLI_ASSOC
    }

    public function incrementViews(int $id): bool
    {
        $query = "UPDATE images SET views = views + 1 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public  function contadorDeVisitas(): void
    {
        $visitas = 0;
        if (isset($_COOKIE['visitas'])) {
            $visitas = $_COOKIE['visitas'];
        }
        $visitas++;
        setcookie('visitas', $visitas, time() + (86400 * 30), "/"); // Expira en 30 días
    }
}

$photos = new Photos();
$photos->contadorDeVisitas();
$photos->incrementViews($_GET['id']);
$image = $photos->getImage($_GET['id']);

require '../views/photos.php';