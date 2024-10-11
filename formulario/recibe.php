<?php

//print_r($_POST);

//if (!$_POST) {
//    header('Location: index.php');
//}
//
//$nombre = $_POST['nombre'];
//$sexo = $_POST['sexo'];
//$year = $_POST['year'];
//$terminos = $_POST['terminos'];
//
//echo 'Hola ' . $nombre;

print_r($_GET);

if (!$_GET) {
    header('Location: index.php');
    die();
}

$nombre = $_GET['nombre'];
$sexo = $_GET['sexo'];
$year = $_GET['year'];
$terminos = $_GET['terminos'];

echo 'Hola ' . $nombre;