<?php
$visitas = 0;
if (isset($_COOKIE['visitas'])) {
    $visitas = $_COOKIE['visitas'];
}
$visitas++;
setcookie('visitas', $visitas, time() + (86400 * 30), "/"); // Expira en 30 días

require 'index.view.php';