<body class="bg-light">
  <?php

  date_default_timezone_set('America/Costa_Rica');

  $hora = date('H');

  // Determina el saludo adecuado en función de la hora del día
  if ($hora >= 5 && $hora < 12) {
    $saludo = "¡Buenos días " . $username . "!";
  } else if ($hora >= 12 && $hora < 19) {
    $saludo = "¡Buenas tardes " . $username . "!";
  } else {
    $saludo = "¡Buenas noches " . $username . "!";
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

  <div class="p-md-2  text-bg-dark">
    <div class="container-fluid row">
      <div class="col-md-11">
        <?= '<h3 class="display-4 fs-3 fst-italic">' . $saludo . '</h3>' ?>
      </div>
      <div class="col-md-1">
        <div class="flex-shrink-0 p-2 dropdown">
          <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://images4.alphacoders.com/615/61508.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">

            <li><a class="dropdown-item" href="#"><i class="bi bi-person-gear"></i> Configuraciones</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="../Includes/logout.php"> <i class="bi bi-box-arrow-left"></i> Cerrar Sesion</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>