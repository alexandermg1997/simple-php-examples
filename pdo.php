<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "erasmomg"; // Cambia según tu configuración
$password = "aldea*2017"; // Cambia según tu configuración
$dbname = "prueba_consola"; // Cambia según tu base de datos

// Inicializar variables
$nombre = "";
$correo = "";
$mensaje = "";
$error = "";
$conexionExitosa = false;

try {
    // Crear una nueva conexión PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Configurar el modo de error para lanzar excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si llegamos aquí, la conexión fue exitosa
    $conexionExitosa = true;
} catch (PDOException $e) {
    // Manejo del error
    error_log($e->getMessage()); // Registra el error en un archivo de log
    $error = "Lo sentimos, hubo un problema al conectar a la base de datos.";
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
        $sql = "INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $correo);

        if ($stmt->execute()) {
            $mensaje = "Registro exitoso: " . $nombre;
            // Limpiar campos después del registro exitoso
            $nombre = "";
            $correo = "";
        } else {
            $error = "Error al registrar: " . implode(", ", $stmt->errorInfo());
        }
    }
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

    <!-- DataTables CSS -->
    <!-- Bootstrap CSS for DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
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

<!-- Ícono en la parte inferior izquierda -->
<div id="iconoModal" style="position: fixed; bottom: 20px; left: 20px; cursor: pointer;">
    <i class="fas fa-plus-circle fa-3x" title="Abrir Modal"></i>
</div>

<!-- Modal -->
<div class="modal fade w-100" id="miModal" tabindex="-1" role="dialog" aria-labelledby="miModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tablaUsuarios" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<!-- Font Awesome JS -->
<script src="https://kit.fontawesome.com/f131cf0926.js" crossorigin="anonymous"></script>

<!-- AlertifyJS JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

<!-- DataTables JS -->
<script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script defer
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script defer src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
<script defer src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>

<script>
    // Mostrar mensajes usando AlertifyJS después del envío del formulario
    <?php if ($mensaje): ?>
    alertify.success('<?php echo addslashes($mensaje); ?>');
    <?php endif; ?>

    <?php if ($error): ?>
    alertify.error('<?php echo addslashes($error); ?>');
    <?php endif; ?>
</script>

<script>
    $(document).ready(function () {
        // Inicializar el modal al hacer clic en el ícono
        $('#iconoModal').on('click', function () {
            $('#miModal').modal('show'); // Mostrar el modal
            cargarDatos(); // Cargar los datos en la tabla
        });

        function cargarDatos() {
            $('#tablaUsuarios').DataTable({
                "ajax": {
                    "url": "pdo_list.php", // Asegúrate de que esta ruta sea correcta
                    "dataSrc": "" // Indica que los datos están en la raíz del JSON
                },
                "columns": [
                    {"data": "id"},
                    {"data": "nombre"},
                    {"data": "email"}
                ],
                "destroy": true // Permite reinicializar la tabla sin errores
            });
        }
    });
</script>

</body>
</html>