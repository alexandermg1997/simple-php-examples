<?php

$year = date("Y");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>

<body>
<form action="recibe.php" method="get">
    <label for="nombre"> Nombre:
        <input type="text" id="nombre" name="nombre" placeholder="Nombre">
    </label>
    <br>

    <label for="hombre"> Masculino:
        <input type="radio" id="hombre" name="sexo" value="hombre">
    </label>
    <label for="mujer"> Femenino:
        <input type="radio" id="mujer" name="sexo" value="mujer">
    </label>
    <br>

    <label for="year">Año de nacimiento</label>
    <select name="year" id="year">
        <?php
        // Bucle para generar las opciones desde 1990 hasta el año actual
        for ($i = 1990; $i <= $year; $i++) {
            // echo '<option value="' . $i . '">' . $i . '</option>';
            printf('<option value="%s">%s</option>', $i, $i);
        }
        ?>
    </select>
    <br>

    <label for="terminos">Aceptas los terminos?
        <input type="checkbox" id="terminos" name="terminos" value="si">
    </label>
    <br>

    <input type="submit" value="Enviar">
</form>
</body>

</html>