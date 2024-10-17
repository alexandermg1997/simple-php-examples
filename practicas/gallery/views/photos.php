<?php global $image; ?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Photos Details</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/f131cf0926.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../backend/Dashboard.php">Dashboard</a>

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
                    <a class="nav-link" href="../backend/Dashboard.php">Volver a la Galería</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-8 text-center">
            <img src="<?php echo htmlspecialchars($image[0]['image_path']); ?>" class="img-fluid rounded shadow-sm"  style='height: 450px; object-fit: cover;'   alt="<?php echo htmlspecialchars($image[0]['title']); ?>">
        </div>
        <div class="col-md-4 mt-5 text-center">
            <h2><?php echo htmlspecialchars($image[0]['title']); ?></h2>
            <p><strong>Categoría:</strong> <?php echo ucfirst(htmlspecialchars($image[0]['category'])); ?></p>
            <p><?php echo htmlspecialchars($image[0]['description']); ?></p>
            <a href="../backend/Dashboard.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver a la Galería</a>
        </div>
    </div>
</div>

<button id="back-to-top" class="btn btn-primary" title="Volver arriba"><i class="fas fa-arrow-up"></i></button>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<!-- JavaScript para el photo gallery -->
<script src="../js/script.js"></script>
</body>
</html>