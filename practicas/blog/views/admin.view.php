<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo BLOG_CONFIG['title']; ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&display=swap"
          rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--My CSS-->
    <link rel="stylesheet" href="<?= BLOG_CONFIG['url_base']; ?>css/style.css">

    <!-- jQuery and Bootstrap JS -->
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://kit.fontawesome.com/f131cf0926.js" crossorigin="anonymous"></script>

    <!-- JavaScript -->
    <script src="<?= BLOG_CONFIG['url_base']; ?>js/script.js"></script>
</head>
<body>

<div class="scroll-container">
    <div class="scroll-content" id="scrollContent">
        <?php require_once 'header.view.php'; ?>

        <!-- Contenedor principal -->
        <div class="main-content px-1">
            <?php require_once 'articulos_admin.view.php'; ?>
            <?php require_once 'paginacion.view.php'; ?>
        </div>

        <!-- Añade este botón junto al botón de subir -->
        <button id="back-to-top" class="btn btn-primary scroll-btn" title="Volver arriba">
            <i class="fas fa-arrow-up"></i>
        </button>
        <button id="scroll-to-bottom" class="btn btn-primary scroll-btn" title="Ir abajo">
            <i class="fas fa-arrow-down"></i>
        </button>
        <?php require_once 'footer.view.php'; ?>
    </div>
    <!-- Scrollbar -->
    <div class="custom-scrollbar">
        <div class="scrollbar-track"></div>
        <div class="scrollbar-thumb" id="scrollbarThumb"></div>
    </div>
</div>


</body>
</html>