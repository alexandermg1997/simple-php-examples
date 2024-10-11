<?php
# Obtener cookies
$fontSize = $_COOKIE['font-size'];
$backgroundColor = $_COOKIE['background-color'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Texto</title>
</head>
<body>
<p style="background-color: <?= $backgroundColor ?>; font-size: <?= $fontSize ?>">Lorem ipsum dolor sit amet,
    consectetur incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
    deserunt mollit anim id est laborum.</p>
</body>
</html>