<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "erasmomg"; // Cambia según tu configuración
$password = "aldea*2017"; // Cambia según tu configuración
$dbname = "exampleAdvanced"; // Cambia según tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializar variables
$nombre = "";
$mensaje = "";
$error = "";

// Procesar el formulario al enviar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"])) {
        $error = "El nombre es requerido.";
    } else {
        $nombre = htmlspecialchars(trim($_POST["nombre"]));

        // Insertar en la base de datos
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);

        if ($stmt->execute()) {
            $mensaje = "Registro exitoso: " . $nombre;
            $nombre = "";
        } else {
            $error = "Error al registrar: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulario con PHP y Bootstrap</title>
</head>
<body>
<div class="container mt-5">
    <h2>Registro de Usuario</h2>

    <?php if ($mensaje): ?>
        <div class="alert alert-success"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                   value="<?php echo htmlspecialchars($nombre); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>