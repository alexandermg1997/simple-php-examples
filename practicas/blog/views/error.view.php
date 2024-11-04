<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 - Página no encontrada</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;
        }

        .error-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="error-container">
    <h1 class="display-1">404</h1>
    <h2>Página no encontrada</h2>
    <p>Lo sentimos, la página que buscas no existe.</p>
    <a href="<?php echo BLOG_CONFIG['url_base']; ?>backend/IndexController.php" class="btn btn-primary">Volver a la
        página principal</a>
</div>
</body>
</html>