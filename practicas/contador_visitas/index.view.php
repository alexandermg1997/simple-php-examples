<?php global $visitas; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
<h1 class="text-center mt-5">
    Contador de visitas
</h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-light shadow">
                <div class="card-header text-center">
                    <h5><i class="fas fa-calendar-alt"></i> Contador de Visitas</h5>
                </div>
                <div class="card-body text-center">
                    <div class="calendar-container">
                        <div class="day-box">
                            <span class="day-number">1</span>
                            <span class="visit-count">Visitas: <?php echo $visitas; ?></span>
                        </div>
                        <!-- Puedes duplicar el siguiente bloque para más días -->
                        <div class="day-box">
                            <span class="day-number">2</span>
                            <span class="visit-count">Visitas: 150</span>
                        </div>
                        <div class="day-box">
                            <span class="day-number">3</span>
                            <span class="visit-count">Visitas: 200</span>
                        </div>
                        <!-- Fin de duplicación -->
                    </div>
                    <a href="index.php" class="btn btn-primary mt-3">Recargar</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>