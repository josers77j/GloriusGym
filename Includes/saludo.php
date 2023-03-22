<?php

date_default_timezone_set('America/Costa_Rica');

$hora = date('H');

// Determina el saludo adecuado en función de la hora del día
if ($hora >= 5 && $hora < 12) {
    $saludo = "¡Buenos días " . $username."!";
} else if ($hora >= 12 && $hora < 19) {
    $saludo = "¡Buenas tardes ". $username."!";
} else {
    $saludo = "¡Buenas noches ".$username."!";
}
?>