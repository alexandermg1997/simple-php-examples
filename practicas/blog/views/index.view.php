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
    <link rel="stylesheet" href="<?= BLOG_CONFIG['url_base']; ?>/css/style.css">

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

</head>
<body>
<header class="my-5 py-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Mi primer blog</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-1">
                        <a class="nav-link" href="#"><i class="fa fa-envelope"></i></a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link" href="#"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link" href="#"><i class="fa fa-cog"></i></a>
                    </li>
                    <li class="nav-item me-1">
                        <form name="busqueda" class="buscar"
                              action="<?= BLOG_CONFIG['url_base']; ?>backend/buscar.php"
                              method="GET">
                            <label><input class="form-control" type="text" name="buscar"
                                          placeholder="Buscar..."></label>
                            <button type="submit" class="btn btn-secondary mb-1"><i class="fa fa-search"></i></button>
                        </form>
                    </li>

                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BLOG_CONFIG['url_base']; ?>backend/cerrar.php"><i
                                        class="fa fa-sign-out-alt"></i> Cerrar
                                sesión</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container my-5 py-5 bg-light">
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center">Mi primer blog</h5>
                    <img src="<?php echo BLOG_CONFIG['url_base']; ?>img/blog.jpg" alt="Blog" class="img-fluid">
                    <p class="fw-light fst-italic fs-6 text-end">Fecha de publicación: <?php echo date('d/m/Y'); ?></p>
                    <p class="card-text">Este es un blog de ejemplo para aprender a crear un blog con PHP y
                        Bootstrap.</p>
                    <a href="#" class="btn btn-primary">Obtener mas información</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>