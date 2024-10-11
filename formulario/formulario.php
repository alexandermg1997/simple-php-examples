<?php
declare(strict_types=1);

$errores = '';

if (isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST['correo'];

    // Sanitizar el nombre
    if (!empty($nombre)) {
        $nombre = htmlspecialchars(strip_tags(trim($nombre)), ENT_QUOTES);
        echo "Tu nombre es: $nombre" . "<br>";
    } else {
        $errores .= "El nombre no puede estar vacío." . "<br>";
    }

    // Validar y sanitizar el correo
    if (!empty($correo)) {
        // Sanitizar el correo
        $correo = filter_var(htmlspecialchars(strip_tags(trim($correo)), ENT_QUOTES), FILTER_SANITIZE_EMAIL);

        // Validar el formato del correo
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            echo "Tu email es: $correo";
        } else {
            $errores .= "El correo electrónico no es válido." . "<br>";
        }
    } else {
        $errores .= "El correo no puede estar vacío." . "<br>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <style>
        .error {
            color: brown;
        }
    </style>
</head>
<body>
<form action="<?php echo htmlspecialchars(($_SERVER['PHP_SELF'])); ?>" method="post">
    <label>
        <input type="text" name="nombre" placeholder="Nombre">
    </label>
    <label>
        <input type="email" name="correo" placeholder="Correo">
    </label>

    <input type="submit" name="submit">
</form>
<?php if (!empty($errores)): ?>
    <div class="error"><?= $errores ?></div>
<?php endif; ?>
</body>
</html>