<?php
declare(strict_types=1);

$title = 'My Blog';
$numPosts = 0;
$hasPosts = $numPosts > 0;
$numPostsDisplay = "\"$numPosts\" posts";

//switch ($numPosts) {
//    case 0:
//        $message = 'There are no posts.';
//        break;
//    case 1:
//    case 2:
//    case 3:
//        $message = "There are a few posts.";
//        break;
//    default:
//        $message = 'There are many posts.';
//}

$message = match ($numPosts) {
    0 => 'There are no posts.',
    1, 2, 3 => "There are a few posts.",
    default => 'There are many posts.',
};

echo 'Mensaje enviado con un match: ' . $message;
?>

<?php

$title = 'My Blog';
$numPosts = 0;
$hasPosts = $numPosts > 0;
$numPostsDisplay = "\"$numPosts\" posts";

?>

    <h1><?= $title ?></h1>
    <h2><?= $numPostsDisplay ?></h2>
    <!---->
<?php
//if ($numPosts === 3) {
//    echo 'Exist 3 post.';
//} elseif ($hasPosts) {
//    echo 'Posts exist.';
//} else {
//    echo 'There are no posts.';
//}
//?>
    <!---->
<?php //if ($hasPosts): ?>
    <!--    --><?php //if ($numPosts === 3): ?>
    <!--        There are exactly 3 posts.-->
    <!--    --><?php //else: ?>
    <!--        Posts exist.-->
    <!--    --><?php //endif ?>
<?php //else: ?>
    <!--    There are no posts.-->
<?php //endif ?>
    <!---->
<?php //echo $hasPosts ? 'Posts exist' : 'There are no posts.' ?>

    <h3>Variables</h3>
<?php
# String: Cadena de texto
$name = "Erasmo";
# Integer: Numeros enteros
$edad = 27;
# Double: Numeros decimales
$number_decimal = 7.7;
# Boolean: Verdadero o Falso (true or false)
$bool = true;

echo $name . "<br>";
echo $edad . "<br>";
echo $number_decimal . "<br>";
echo $bool . "<br>";

# Concat
echo $name . ' tiene ' . $edad . 'años' . "<br>";
# Type of data
echo gettype($name) . "<br>";
var_dump($bool) . "<br>";
?>

    <h3>Constantes</h3>
<?php
# Las constantes no se pueden sobrescribir
# Esta forma ya esta deprecated
//define('PI', 3.14);
const PI = 3.14;
//const PI = 3.14;
?>

    <h3>Arrays</h3>
<?php
$days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
# Cargar por una posicion especifica
echo $days[0] . "<br>";
# Cargar todas las posiciones
foreach ($days as $day) {
    echo $day . "<br>";
}
# Verificar si existe un elemento en el arreglo y devolver la posicion, para al encontrar un caso
$dayToFind = 'Jueves';
$key = array_search($dayToFind, $days);
if ($key !== false) {
    echo "El día $dayToFind se encuentra en la posición: " . ($key + 1) . "<br>";
} else {
    echo "El día $dayToFind no se encuentra en el arreglo.<br>";
}
# Verificar si existe un elemento en el arreglo y devolver true o false
if (in_array('Domingo', $days)) {
    echo "El día Domingo está en el arreglo.<br>";
} else {
    echo "El día Domingo no está en el arreglo.<br>";
}
# Filtrar el arreglo por una condicion (function)
$filteredDays = array_filter($days, function ($day) {
    return strpos($day, 'e') !== false;
});
foreach ($filteredDays as $day) {
    echo $day . "<br>";
}
# Count the days
echo "Total de días en la semana: " . count($days) . "<br>";
# Modify one day
$days[0] = 'Lunes Modificado';
echo $days[0] . "<br>" . "<br>";

# Ordenar un array de forma ascendente
$order = $days;
sort($order);
foreach ($order as $day) {
    echo $day . "<br>" . "<br>";
}
# Extraer una pocion del arreglo, un subarreglo
$weekdays = array_slice($days, 0, 5); // Obtiene de Lunes a Viernes
foreach ($weekdays as $day) {
    echo $day . "<br>";
}

# Arrays asociativos
$daysAssoc = [
    0 => 'Lunes',
    1 => 'Martes',
    2 => 'Miercoles',
    3 => 'Jueves',
    4 => 'Viernes',
    5 => 'Sabado',
    6 => 'Domingo'
];

$alex = [
    'name' => 'Alexander',
    'lastName' => 'Marín',
    'username' => 'erasmomg',
    'age' => '27',
    'phone' => '+526622811829',
    'country' => 'México'
];

# Comprueba si la clave o índice dado existe en la matriz
if (array_key_exists(3, $daysAssoc)) {
    echo "La clave 3 existe y corresponde a: " . $daysAssoc[3] . "<br>";
} else {
    echo "La clave buscada no existe" . "<br>";
}
echo $alex['name'] . "<br>";
echo $alex['lastName'] . "<br>";
echo $alex['username'] . "<br>";
echo $alex['age'] . "<br>";

?>

    <h4>Arreglos multidimencionales</h4>
<?php
$family = [[1, 'mamá'], [2, 'tata'], [3, 'barbaro']];
echo $family[0][1];
?>


    <h4>Foreach</h4>
<?php
$months = [
    'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
    'Julio',
    'Agosto',
    'Septiembre',
    'Octubre',
    'Noviembre',
    'Diciembre'
];
$monthsSort = $months;
sort($monthsSort);
$monthsRsort = $months;
rsort($monthsRsort);
?>

<?php
$edad = (isset($edad)) ? $edad : 'El usuario no ha establecio su edad';
echo $edad;
?>

<?php if ($edad === 27 and $name === "Erasmo"): ?>
    Ese soy yo
<?php elseif ($edad !== 27 || $name <> 'Erasmo'): ?>
    Ese no soy yo
<?php endif ?>

    <h4>Ciclo for</h4>
<?php
for ($i = 0; $i <= 10; $i++) {
    echo $i . "<br>";
}
?>

    <h4>Ciclo while</h4>
<?php
$i = 10;
while ($i > 0) {
    echo $i . "<br>";
    $i--;
}
?>

    <h4>Var_DUMP()</h4>
<?php
var_dump($edad);
echo "<br>";
var_dump($name);
echo "<br>";
echo "<pre>";
var_dump($months);
echo "</pre>";
var_dump($months);
?>

    <h4>Print_r()</h4>
<?php
print_r($edad);
echo "<br>";
print_r($name);
echo "<br>";
echo "<pre>";
print_r($months);
echo "</pre>";
print_r($months);
?>


    <h4>Function()</h4>
<?php

function Hello($name): void
{
    print('Hola ' . $name . "<br>");
}

Hello($name);

function Sum(int $a, int $b): int
{
    return ($a + $b);
}

echo Sum(5, 5) . "<br>";

function Calcular_Area_Triangulo($base, $altura)
{
    return ($base * $altura) / 2;
}

echo Calcular_Area_Triangulo(10, 10);
?>

<?php
$texto = '<br>Hola<br>';
$texto1 = ' Hello world  '; // 8 character

# Para evitar algunos script
# Renderiza los caracteres expeciales
echo htmlspecialchars($texto);
# Elimina los espacios al principio y la fina de un string
echo trim($texto1);
# Return the count of characters of one string
echo strlen($texto1);
# Return a substring (string, init point, length)
echo substr($texto1, 7, 3);
# Return all upper
echo strtoupper($texto1);
# Return all lower
echo strtolower($texto1);
# Return the position of a character (the first one found)
echo strpos($texto1, 'o');
?>

<?php
# Extrae los valores de un array y los convierte en variables
$amigo = ['telefono' => 526622811829, 'edad' => 27, 'pais' => 'Mexico'];
extract($amigo);
echo $telefono;
echo $pais . '<br>';

$semana = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];

# Extrae el ultimo elemento de un array
$ultimoDiaSemana = array_pop($semana);

foreach ($semana as $dia) {
    echo $dia . '<br>';
}

echo $ultimoDiaSemana . '<br>';

echo join(' - ', $semana) . '<br>';
echo join(' <br> ', $semana);

$semanaReverse = array_reverse($semana);
echo join(' - ', $semanaReverse) . '<br>';

$numero = 15.585;
echo round($numero, 1);

echo rand(1, 10);

echo ceil(1.001); // Redondea por exceso siempre
?>

    <h1>Scope</h1>
<?php

$numero = 7;

function mostrarNumero($numero)
{
    echo $numero;
}

mostrarNumero($numero);
?>

<?php
echo "<br>";
echo "<h1>Operedor espacial</h1>";

echo 1 <=> 1;
echo "<br>";
echo 2 <=> 1;
echo "<br>";
echo 1 <=> 2;
?>

    <!doctype html>
<?php require 'vista.php'; ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Document</title>
    </head>
    <body>
    <h4><?= 'Hola mundo con html y php junto' ?></h4>
    <h3>Cargando meses del año</h3>
    <ul>
        <!-- Ejemplo de cómo mostrar todos los meses -->
        <?php foreach ($months as $month): ?>
            <!-- Utilizando html para renderizar -->
            <li><?= $month; ?></li><br>
        <?php endforeach; ?>
    </ul>
    <ol>
        <?php foreach ($monthsSort as $month): ?>
            <!-- Renderizando dentro de php -->
            <?= '<li>' . $month . '</li>' . '<br>' ?>
        <?php endforeach; ?>
    </ol>
    <dl>
        <?php foreach ($monthsRsort as $month): ?>
            <!-- Renderizando dentro de php -->
            <?= '<dt>' . $month . '</dt>' . '<br>' ?>
        <?php endforeach; ?>
    </dl>

    <h1>El resultado es igual a: <?= Suma(4, 6) ?></h1>

    </body>
    </html>

<?php
sort($semana);
echo implode(' , ', $semana);

$arrayNum = [3, 1, 4, 7, 5, 9];
usort($arrayNum, 'opener');
echo implode(' , ', $arrayNum);

function opener(int $a, int $b): int
{
    return $a <=> $b;
}

?>