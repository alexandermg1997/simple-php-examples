<?php
/** @var string $nombre */
/** @var string $correo */
/** @var string $mensaje */
/** @var string $errores */
/** @var bool $enviado */
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de contacto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</head>

<body>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5 shadow-sm">
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="form-group">
                            <label for="nombre"></label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"
                                   value="<?php echo htmlspecialchars($nombre); ?>">
                        </div>
                        <div class="form-group">
                            <label for="correo"></label>
                            <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo"
                                   value="<?php echo htmlspecialchars($correo); ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label for="mensaje"></label>
                            <textarea name="mensaje" id="mensaje" cols="10" rows="5" class="form-control"
                                      placeholder="Mensaje"><?php echo htmlspecialchars($mensaje); ?></textarea>
                        </div>
                        <?php if (!empty($errores)): ?>
                            <div class="alert alert-danger"><?php echo $errores; ?></div>
                        <?php elseif ($enviado): ?>
                            <div class="alert alert-success">Formulario enviado con éxito</div>
                        <?php endif ?>
                        <div class="text-end"> <!-- Clase para alinear a la derecha -->
                            <input type="submit" name="submit" value="Enviar Correo" class="btn btn-outline-dark">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>