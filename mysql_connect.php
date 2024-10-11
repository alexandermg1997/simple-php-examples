<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "erasmomg"; // Cambia según tu configuración
$password = "aldea*2017"; // Cambia según tu configuración
$dbname = "prueba_consola"; // Cambia según tu base de datos

$conn = null; // Inicializar la variable $conn

// Inicializar variable de conexión
$conexionExitosa = false;

// Inicializar variables
$nombre = "";
$correo = "";
$mensaje = "";
$error = "";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica si hay un error en la conexión
    if (!$conn->connect_error) {
        $conexionExitosa = true; // Cambia a verdadero si la conexión es exitosa
    }
} catch (Exception $e) {
    // Manejo del error
    error_log($e->getMessage()); // Registra el error en un archivo de log
    // Guardar el mensaje de error para mostrarlo más tarde
    $error = "Error de conexión: " . $e->getMessage();
}

// Procesar el formulario al enviar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"]) || empty($_POST["correo"])) {
        if (empty($_POST["nombre"])) {
            $error .= "El nombre es requerido.<br>";
        } else {
            $nombre = htmlspecialchars(trim($_POST["nombre"])); // Mantener el valor
        }
        if (empty($_POST["correo"])) {
            $error .= "El correo es requerido.<br>";
        } else {
            $correo = htmlspecialchars(trim($_POST["correo"])); // Mantener el valor
        }
    } else {
        $nombre = htmlspecialchars(trim($_POST["nombre"]));
        $correo = htmlspecialchars(trim($_POST["correo"]));

        // Insertar en la base de datos
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $correo);

        if ($stmt->execute()) {
            $mensaje = "Registro exitoso: " . $nombre;
            // Limpiar campos después del registro exitoso
            $nombre = "";
            $correo = "";
        } else {
            $error = "Error al registrar: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Cerrar la conexión solo si fue establecida
if ($conn) {
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- AlertifyJS CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>

    <link rel="stylesheet" href="css/style.css">

    <title>Formulario con PHP y Bootstrap</title>
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container mt-5 col-md-6 col-lg-4 col-xl-3">
        <h2 class="text-center mb-4">Registro de Usuario</h2>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                       value="<?php echo htmlspecialchars($nombre); ?>">
                <label for="correo" class="form-label mt-2">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo"
                       value="<?php echo htmlspecialchars($correo); ?>">
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary mt-3">Registrar</button>
            </div>
        </form>
    </div>
</div>

<?php if ($conexionExitosa): ?>
    <div id="conexionExitosa" style="position: fixed; top: 20px; right: 20px; z-index: 1000; display: none;">
        <i class="fas fa-check-circle" style="color: #63E6BE;"></i>
    </div>
    <script>
        // Mostrar el ícono durante 2 segundos y luego ocultarlo
        document.getElementById('conexionExitosa').style.display = 'block';
        setTimeout(function () {
            document.getElementById('conexionExitosa').style.display = 'none';
        }, 2000);
    </script>
<?php endif; ?>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/f131cf0926.js" crossorigin="anonymous"></script>

<!-- AlertifyJS JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

<script>
    // Mostrar mensajes usando AlertifyJS después del envío del formulario
    <?php if ($mensaje): ?>
    alertify.success('<?php echo addslashes($mensaje); ?>');
    <?php endif; ?>

    <?php if ($error): ?>
    alertify.error('<?php echo addslashes($error); ?>');
    <?php endif; ?>
</script>

</body>
</html>