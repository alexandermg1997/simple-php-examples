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
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../views/dashboard.php">Volver a la Galería</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-8">
            <img src="<?php echo htmlspecialchars($image['src']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($image['title']); ?>">
        </div>
        <div class="col-md-4">
            <h2><?php echo htmlspecialchars($image['title']); ?></h2>
            <p><strong>Categoría:</strong> <?php echo htmlspecialchars($image['category']); ?></p>
            <p><?php echo htmlspecialchars($image['description']); ?></p>
            <a href="../views/dashboard.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver a la Galería</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>