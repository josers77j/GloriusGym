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

    <div class="col-auto col-md-2 col-xl-1 px-sm-2 px-0 bg-dark">
      <div class="d-flex flex-column align-items-center align-items-sm-start px-1 pt-3 text-white min-vh-100">

        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
          <li class="nav-item">
            <a href="../Views/principalView.php" class="hover-class nav-link px-0 align-middle text-warning">
              <i class="fs-5 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Inicio</span>
            </a>
          </li>

          <li>
            <a href="dashboard.php" class="nav-link px-0 align-middle text-warning" id="my-element">
              <i class="fs-5 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
          </li>

          <li>
            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-warning" data-bs-target="#account-collapse1" aria-expanded="false">
            <i class="bi bi-list"></i><span class="ms-1 d-none d-sm-inline">Accciones</span> </a>
            <div class="collapse show" id="account-collapse1">
              <ul class="btn-toggle-nav list-unstyled pb-1 small" id="submenu3" data-bs-parent="#menu">
                <li class="w-100">
                  <a href="mascotas.php" class="nav-link px-0 aProperties text-secondary" id="my-element">
                  <i class="bi bi-person-badge"></i><span class="d-none d-sm-inline"> Miembros</span> </a>
                </li>
                <li>
                  <a href="clientes.php" class="nav-link px-0 text-secondary" id="my-element"><i class="bi bi-card-checklist"></i><span class="d-none d-sm-inline"> Membresias</span></a>
                </li>
                <li>
                  <a href="consultas.php" class="nav-link px-0 text-secondary"><i class="bi bi-journal"></i> <span class="d-none d-sm-inline">Asistencias</span></a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-warning <?= $permiso ?>" data-bs-target="#account-collapse2" aria-expanded="false">
            <i class="bi bi-menu-app"></i><span class="ms-1 d-none d-sm-inline">Administrar</span></a>
            <div class="collapse show" id="account-collapse2">
              <ul class="btn-toggle-nav list-unstyled pb-1 small" id="submenu3" data-bs-parent="#menu">

                <li class="w-100">
                  <a href="../Views/usuariosView.php" class="nav-link px-0 aProperties text-secondary <?= $permiso ?>">
                    <i class="bi-people"></i> <span class="d-none d-sm-inline"> Usuarios</span> </a>
                </li>
                <li class="w-100">
                  <a href="../Views/empleadosView.php" class="nav-link px-0 aProperties text-secondary <?= $permiso ?>">
                    <i class="bi bi-person-vcard"></i><span class="d-none d-sm-inline"> Empleados</span> </a>
                </li>
                <li class="w-100">
                  <a href="../Views/rolesView.php" class="nav-link px-0 aProperties text-secondary <?= $permiso ?>">
                  <i class="bi bi-person-rolodex"></i><span class="d-none d-sm-inline"> Roles</span> </a>
                </li>
              </ul>
            </div>
          </li>



        </ul>

      </div>
    </div>
    <div class="col p-0">
      <script src="../js/menu.js"></script>