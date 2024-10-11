<?php
require_once '../../login/backend/Database.php';

class ImageUploader
{
    private PDO $db;
    private string $targetDir;
    private int $maxFileSize = 500000; // 500KB
    private array $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->db = Database::getConnection();
        $this->targetDir = dirname(__DIR__) . "/img/";
        $this->ensureDirectoryExists();
    }

    /**
     * @throws Exception
     */
    private function ensureDirectoryExists(): void
    {
        if (!file_exists($this->targetDir)) {
            if (!mkdir($this->targetDir, 0755, true)) {
                throw new Exception("No se pudo crear el directorio de destino.");
            }
        }

        if (!is_writable($this->targetDir)) {
            throw new Exception("El directorio de destino no tiene permisos de escritura.");
        }
    }

    public function uploadImage($title, $category, $description, $image): array
    {
        try {
            $this->validateImage($image);
            $imagePath = $this->moveUploadedFile($image);
            $this->saveToDatabase($title, $category, $description, $imagePath);
            return [
                'success' => true,
                'message' => 'La imagen se ha subido correctamente y los datos se han guardado.'
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * @throws Exception
     */
    private function validateImage($image): void
    {
        if (!isset($image['tmp_name']) || !is_uploaded_file($image['tmp_name'])) {
            throw new Exception("No se ha subido ninguna imagen.");
        }

        $check = getimagesize($image['tmp_name']);
        if ($check === false) {
            throw new Exception("El archivo no es una imagen válida.");
        }

        if ($image['size'] > $this->maxFileSize) {
            throw new Exception("Lo siento, tu archivo es demasiado grande. El tamaño máximo es " . ($this->maxFileSize / 1000) . "KB.");
        }

        $imageFileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        if (!in_array($imageFileType, $this->allowedExtensions)) {
            throw new Exception("Lo siento, solo se permiten archivos " . implode(', ', $this->allowedExtensions) . ".");
        }
    }

    /**
     * @throws Exception
     */
    private function moveUploadedFile($image): string
    {
        $targetFile = $this->targetDir . basename($image['name']);
        if (!move_uploaded_file($image['tmp_name'], $targetFile)) {
            throw new Exception("Lo siento, hubo un error al subir tu archivo. Verifica los permisos del directorio.");
        }
        return $targetFile;
    }

    /**
     * @throws Exception
     */
    private function saveToDatabase($title, $category, $description, $imagePath): void
    {
        $stmt = $this->db->prepare("INSERT INTO images (title, category, description, image_path) VALUES (:title, :category, :description, :image_path)");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':image_path', $imagePath, PDO::PARAM_STR);
        if (!$stmt->execute()) {
            throw new Exception("Error al guardar en la base de datos: " . implode(", ", $stmt->errorInfo()));
        }
    }
}

// Manejo de la solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $uploader = new ImageUploader();
        $result = $uploader->uploadImage(
            $_POST['title'] ?? '',
            $_POST['category'] ?? '',
            $_POST['description'] ?? '',
            $_FILES['image'] ?? []
        );

        if ($result['success']) {
            $message = $result['message'];
        } else {
            $error = $result['message'];
        }
    } catch (Exception $e) {
        $error = "Error: " . $e->getMessage();
    }
}

require '../views/uploader.php';