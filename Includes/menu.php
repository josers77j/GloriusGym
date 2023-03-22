<?php

include('../config.php');

if (!empty($username)) {
  $query5 = 'select id,usuario,id_roles from tbl_usuarios
  where usuario = "' . $username . '"';
  $sql5 = $pdo->prepare($query5);
  $sql5->execute();
  $getUser = $sql5->fetchAll(PDO::FETCH_OBJ);

  $permiso = '';

  if ($getUser[0]->id_roles == 1) {
    $permiso = '';
  } else {
    $permiso = 'd-none';
  }
}

?>

<div class="container-fluid">
    <div class="row flex-nowrap">
     
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
  <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-5 d-none d-sm-inline "><img class=" img-fluid" src="../img/GLORIUS.png" style="width: 250px; height: 100px;" alt=""></span>
    </a>
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
      <li class="nav-item">
        <a href="../Views/principalView.php" class="hover-class nav-link px-0 align-middle text-secondary" >
          <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Inicio</span>
        </a>
      </li>

      <li>
          <a href="dashboard.php" class="nav-link px-0 align-middle text-secondary" id="my-element">
          <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
      </li>

      <li>
        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-light" data-bs-target="#account-collapse1" aria-expanded="false">
          <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Accciones</span> <i class="bi bi-caret-down-fill"></i></a>
          <div class="collapse show" id="account-collapse1">
        <ul class="btn-toggle-nav list-unstyled pb-1 small" id="submenu3" data-bs-parent="#menu">
          <li class="w-100">
            <a href="mascotas.php" class="nav-link px-0 aProperties text-secondary" id="my-element">
              <i class="fa-solid fa-paw "></i><span class="d-none d-sm-inline">Miembros</span> </a>
          </li>
          <li>
            <a href="clientes.php" class="nav-link px-0 text-secondary" id="my-element"><i class="bi bi-person"></i> <span class="d-none d-sm-inline">Dueños</span></a>
          </li>
          <li>
            <a href="consultas.php" class="nav-link px-0 text-secondary"><i class="bi bi-journal"></i> <span class="d-none d-sm-inline">Consultas</span></a>
          </li>
        </ul>
          </div>
      </li>
      <li>
        <a href="../Views/usuariosView.php" class="nav-link px-0 align-middle text-secondary <?=$permiso?>">
          <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Usuarios</span> </a>
      </li>

     
      <li class="border-top my-3"></li>
      <li class="mb-1">
      <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle" data-bs-target="#account-collapse" aria-expanded="false">
          <i class="bi bi-person-circle text-white"></i> <span class="ms-1 d-none d-sm-inline text-white"><?=$username?></span> <i class="bi bi-caret-down-fill text-white"></i></a>
        </button>
        <div class="collapse show" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled pb-1 small">
           
            <li>
              <a href="configuraciones.php" class="nav-link px-0 text-secondary"><i class="bi bi-person-gear"></i> <span class="d-none d-sm-inline ">Configuraciones</span></a>
            </li>
            <li>
              <a href="../Includes/logout.php" class="nav-link px-0 text-secondary"><i class="bi bi-box-arrow-left"></i> <span class="d-none d-sm-inline">Cerrar Sesion</span></a>
            </li>
          </ul>
        </div>
      </li>
    </ul>

  </div>
</div>
<div class="col p-0">
<script src="../js/menu.js"></script>