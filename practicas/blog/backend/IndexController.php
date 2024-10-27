<?php
require_once '../backend/Connection.php';

class IndexController
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Connection::getConnection();
    }

    public function getPostPaginado(int $pagina, int $postPorPagina): false|array
    {
        // Calcular el índice de inicio
        $inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

        // Preparar la consulta para obtener los artículos
        $stmt = $this->db->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT :inicio, :postPorPagina");

        // Vincular parámetros
        $stmt->bindParam(':inicio', $inicio, PDO::PARAM_INT);
        $stmt->bindParam(':postPorPagina', $postPorPagina, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener los resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Obtener el número total de imágenes
        $totalPost = $this->db->query('SELECT COUNT(*) as total FROM articulos')->fetch(PDO::FETCH_ASSOC)['total'];

        // Calcular el número de páginas
        $numeroDePaginas = (int)ceil($totalPost / $postPorPagina);

        // Retornar los resultados y la paginación (opcional)
        return [
            'posts' => $resultados,
            'totalPaginas' => $numeroDePaginas,
            'paginaActual' => $pagina,
            'totalPost' => $totalPost
        ];
    }

    function IndexController(): void
    {
        require "../views/index.view.php";
    }
}

$index = new IndexController();

$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
$postPorPagina = 5; // Cantidad de artículos por página
$postPaginados = $index->getPostPaginado($pagina, $postPorPagina);

// Procesar los resultados
$posts = $postPaginados['posts'];
$totalPaginas = $postPaginados['totalPaginas'];
$paginaActual = $postPaginados['paginaActual'];
$totalPost = $postPaginados['totalPost'];

$index->IndexController();