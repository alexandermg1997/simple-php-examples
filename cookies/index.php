<?php
# Establecer cookies con nombres claros y valores apropiados

# Cookies sin escape (setrawcookie)
# setrawcookie($name, $value, $expire, $path, $domain, $secure, $httponly)
setrawcookie('NOMBRE', 'Erasmo', time() + 3600, '/hola_mundo/cookies/');
setrawcookie('EDAD', '27', time() + 3600, '/');
setrawcookie('PAIS', 'México', time() + 3600, '/');

# Cookies con escape (setcookie)
setcookie('APELLIDO', 'Marín', time() + 3600, '/', '', true, true); // $secure = true, $httponly = true
setcookie('SEXO', 'M', time() + 3600, '/', '', true, true);
setcookie('CARRERA', 'Ingeniería', time() + 3600, '/', '', true, true);

setcookie('font-size', '30px', time() + 10, '/', '', true, true);
setcookie('background-color', 'red', time() + 10, '/', '', true, true);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h1>Cookies seteadas</h1>
<a href="texto.php">Ir a la página de texto</a>
</body>
</html>
