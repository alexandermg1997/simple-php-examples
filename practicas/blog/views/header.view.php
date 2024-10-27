<header class="py-5">
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