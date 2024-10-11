<?php

//file_exists('documento.txt') or die('No se puede acceder a este archivo'); // Comprueba si el archivo existe

//$archivo = fopen('documento.txt', 'r'); // Abre el archivo en lectura
//$contenido = fread($archivo, filesize('documento.txt')); // Lee el contenido del archivo
//fclose($archivo); // Cierra el archivo
//echo $contenido; // Muestra el contenido del archivo
//
//echo '<br>';


file_put_contents('documento.txt', "Contenido nuevo \n", FILE_APPEND); // Escribe contenido en el archivo con un salto de linea
file_put_contents('documento.txt', "Contenido nuevo \n"); // Sobre_escribe el contenido del archivo
for ($i = 0; $i < 10; $i++) {
    file_put_contents('documento.txt', "$i \n", FILE_APPEND); // Crea un archivo con 10 líneas
}

echo file_get_contents('documento.txt'); // Lee el contenido del archivo


echo pathinfo('documento.txt', PATHINFO_EXTENSION); // Obtiene la extensión del archivo
echo pathinfo('documento.txt', PATHINFO_FILENAME); // Obtiene el nombre del archivo
echo pathinfo('documento.txt', PATHINFO_DIRNAME); // Obtiene el directorio del archivo

$resultados = glob('./d*.php'); // Busca archivos con extensión .php en el directorio actual que empiecen con d
foreach ($resultados as $archivo) {
    echo "$archivo<br>";
}

$resultadosVarios = glob('session/*.{php,txt}', GLOB_BRACE); // Busca archivos con cualquier extensión en el directorio session
foreach ($resultadosVarios as $archivo) {
    echo "$archivo<br>";
}

echo '<br>';
echo basename('documento.txt'); // Obtiene el nombre del archivo

echo '<br>';
echo dirname('documento.txt'); // Obtiene el directorio del archivo