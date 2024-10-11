<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/f131cf0926.js" crossorigin="anonymous"></script>

    <script src="../js/script.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Dashboard</a>

        <!-- Toggle de tema fuera del menú colapsable -->
        <div class="theme-toggle me-2" id="theme-toggle">
            <i class="fas fa-moon" id="moon-icon"></i>
            <i class="fas fa-sun d-none" id="sun-icon"></i>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Galería</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#statistics">Estadísticas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="main-content pt-5">
    <div class="container mb-5">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="btn-group" role="group" aria-label="Filtros de imagen">
                    <button type="button" class="btn btn-outline-primary active" data-filter="all">Todas</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="nature">Naturaleza</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="city">Ciudad</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="people">Personas</button>
                </div>
            </div>
        </div>

        <div class="row mt-4" id="gallery">
            <?php
            $images = [
                ['src' => '../img/image1.jpg', 'category' => 'nature', 'title' => 'Montaña'],
                ['src' => '../img/image2.jpg', 'category' => 'city', 'title' => 'Ciudad'],
                ['src' => '../img/image3.jpg', 'category' => 'people', 'title' => 'Retrato'],
                // ... Añade más imágenes aquí
            ];

            foreach ($images as $image) {
                echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-3 image-item' data-category='{$image['category']}'>
                    <div class='card'>
                        <img src='{$image['src']}' class='card-img-top' alt='{$image['title']}' style='height: 250px; object-fit: cover;' loading='lazy'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$image['title']}</h5>
                            <p class='card-text'>Categoría: {$image['category']}</p>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</div>


<div class="container mb-5">
    <div class="row">
        <?php
        $images = glob('../img/*.jpg');
        foreach ($images as $image) {
            $image = basename($image);
            echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-5'>
                            <div class='card'>
                                <img src='../img/$image' class='card-img-top' alt='...' style='height: 250px; object-fit: cover;' loading='lazy'>
                                <div class='card-body'>
                                    <h5 class='card-title'>Card title</h5>
                                    <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href='#' class='btn btn-primary'>Go somewhere</a>
                                </div>
                            </div>
                        </div>";
        }
        ?>
    </div>
</div>

<section id="statistics" class="mt-5 mb-5">
    <div class="container">
        <h2 class="text-center mb-4">Estadísticas</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total de Imágenes</h5>
                        <p class="card-text display-4"><?php echo count($images); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categoría más popular</h5>
                        <p class="card-text display-4">Naturaleza</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vistas totales</h5>
                        <p class="card-text display-4">1,234</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<button id="back-to-top" class="btn btn-primary" title="Volver arriba"><i class="fas fa-arrow-up"></i></button>
</body>
</html>