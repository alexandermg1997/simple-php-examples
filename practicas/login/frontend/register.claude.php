<?php
global $error_message, $success_message, $nombre, $email;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
    <script defer src="https://kit.fontawesome.com/f131cf0926.js" crossorigin="anonymous"></script>

    <!-- JavaScript -->
    <script defer src="../js/script.js"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-4">
            <div class="login-container pt-4 pb-4 ps-5 pe-5">
                <h2 class="text-center mb-2">Registro <i class="fa-solid fa-user-plus"></i></h2>
                <?php if ($error_message): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>
                <?php if ($success_message): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo htmlspecialchars($success_message); ?>
                    </div>
                <?php endif; ?>
                <form method="POST" id="registerForm">
                    <div class="mb-2">
                        <label for="nombre" class="form-label text-light"><i class="fas fa-user"></i> Nombre:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            <input type="text" class="form-control" id="nombre" name="nombre" required
                                   value="<?php echo htmlspecialchars($nombre); ?>">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label text-light"><i class="fas fa-envelope"></i> Email:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                            <input type="email" class="form-control" id="email" name="email" required
                                   value="<?php echo htmlspecialchars($email); ?>">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label text-light"><i class="fas fa-lock"></i>
                            Contraseña:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label text-light"><i class="fas fa-lock"></i>
                            Confirmar Contraseña:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                   required>
                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                <i class="fas fa-eye" id="toggleConfirmIcon"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-custom text-white w-100"><i class="fas fa-user-plus"></i>
                        Registrarse
                    </button>
                    <div class="mt-3 text-center">
                        <a href="<?php echo '../backend/LoginController.php'; ?>" class="text-light">¿Ya tienes cuenta?
                            Inicia sesión aquí <i class="fas fa-sign-in-alt ms-1"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>