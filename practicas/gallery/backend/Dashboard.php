<?php
require_once '../../login/backend/Database.php';

class Dashboard
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getImages(): false|array
    {
        $query = "SELECT * FROM images ORDER BY id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Usar PDO::FETCH_ASSOC en lugar de MYSQLI_ASSOC
    }

    public function getCategoryStats(): false|array
    {
        $query = "SELECT category, COUNT(*) as count FROM images GROUP BY category ORDER BY count DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalViews()
    {
        $query = "SELECT SUM(views) as total_views FROM images";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_views'];
    }

    public function getImagesPaginado(int $pagina, int $postPorPagina): false|array {
        // Calcular el índice de inicio
        $inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

        // Preparar la consulta para obtener las imágenes
        $stmt = $this->db->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM images LIMIT :inicio, :postPorPagina");

        // Vincular parámetros
        $stmt->bindParam(':inicio', $inicio, PDO::PARAM_INT);
        $stmt->bindParam(':postPorPagina', $postPorPagina, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener los resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Obtener el número total de imágenes
        $totalImagenes = $this->db->query('SELECT COUNT(*) as total FROM images')->fetch(PDO::FETCH_ASSOC)['total'];

        // Calcular el número de páginas
        $numeroDePaginas = (int) ceil($totalImagenes / $postPorPagina);

        // Retornar los resultados y la paginación (opcional)
        return [
            'imagenes' => $resultados,
            'totalPaginas' => $numeroDePaginas,
            'paginaActual' => $pagina,
            'totalImagenes' => $totalImagenes
        ];
    }
}

$dashboard = new Dashboard();
$images = $dashboard->getImages();
$categoryStats = $dashboard->getCategoryStats();
$totalViews = $dashboard->getTotalViews();

$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
$postPorPagina = 5; // Cantidad de artículos por página

$imagenesPaginadas = $dashboard->getImagesPaginado($pagina, $postPorPagina);

// Procesar los resultados
$imagenes = $imagenesPaginadas['imagenes'];
$totalPaginas = $imagenesPaginadas['totalPaginas'];
$paginaActual = $imagenesPaginadas['paginaActual'];
$totalImagenes = $imagenesPaginadas['totalImagenes'];

require '../views/dashboard.php';
