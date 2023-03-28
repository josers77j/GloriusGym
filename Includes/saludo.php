<body class="bg-light">
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

if (isset($_SESSION['primer_login']) && $_SESSION['primer_login']) {
    echo "<script>Swal.fire({
      icon: 'success',
      title: 'Iniciaste Sesion',
      showConfirmButton: false,
      timer: 2000
    })</script>";
    // eliminar la variable de sesión para que no se muestre de nuevo
    $_SESSION['primer_login'] = false;
  }
?>

<div class="p-md-3 rounded-end text-bg-dark">
        <div class="row">
            <div class="col-md-0">
                <?= '<h1 class="display-4 fs-2 fst-italic">' . $saludo . '</h1>' ?>
            </div>
        </div>
    </div>