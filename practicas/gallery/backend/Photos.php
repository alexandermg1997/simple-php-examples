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
}

$photos = new Photos();
$image = $photos->getImage($_GET['id']);

require '../views/photos.php';