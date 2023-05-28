<div class="container-fluid">
  <div class="row flex-nowrap">

    <div class="col-2 col-sm-auto px-sm-4 px-0 bg-dark">
      <div class="d-flex flex-column align-items-center align-items-sm-start px-1 pt-3 text-white min-vh-100">
        <a href="../Views/dashboardView.php" class="d-flex align-items-center mb-3 mb-sm-0 me-sm-auto link-dark text-decoration-none">
          <img src="../img/gym-icon.png" width="40" height="32">
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
          <li class="nav-item mx-1 my-1 w-100">
            <a href="../Views/dashboardView.php" class="nav-link px-1 align-middle text-white" id="my-element">
              <i class=" bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
          </li>
          <li class="nav-item mx-1 w-100">
            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-1 align-middle text-warning" data-bs-target="#account-collapse1" aria-expanded="false">
              <i class="bi bi-list"></i><span class="ms-1 d-none d-sm-inline">Accciones</span> </a>
            <div class="collapse show" id="account-collapse1">
              <ul class="btn-toggle-nav list-unstyled pb-1 small" id="submenu3" data-bs-parent="#menu">
                <li class="w-100">
                  <a href="../Views/miembrosView.php" class="nav-link px-1 aProperties text-white" id="my-element">
                    <i class="bi bi-person-badge"></i><span class="d-none d-sm-inline text-truncate"> Miembros</span> </a>
                </li>
                <li>
                  <a href="../Views/membresiasView.php" class="nav-link px-1 text-white" id="my-element"><i class="bi bi-card-checklist"></i><span class="d-none d-sm-inline text-truncate"> Membresias</span></a>
                </li>
                <li>
                  <a href="../Views/asistenciasView.php" class="nav-link px-1 text-white d-sm-block"><i class="bi bi-journal"></i> <span class="d-none d-sm-inline text-truncate">Asistencias</span></a>
                </li>
              </ul>
            </div>
          </li>
<?php
if ( $_SESSION['id_roles'] == 1) {
  ?>
         <li class="nav-item mx-1 w-100">
            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-1 align-middle text-warning" data-bs-target="#account-collapse2" aria-expanded="false">
            <i class="bi bi-menu-app"></i><span class="ms-1 d-none d-sm-inline">Administrar</span></a>
            <div class="collapse show" id="account-collapse2">
              <ul class="btn-toggle-nav list-unstyled pb-1 small" id="submenu3" data-bs-parent="#menu">

                <li class="w-100">
                  <a href="../Views/usuariosView.php" class="nav-link px-1 aProperties text-white">
                    <i class="bi-people"></i> <span class="d-none d-sm-inline"> Usuarios</span> </a>
                </li>
                <li class="w-100">
                  <a href="../Views/empleadosView.php" class="nav-link px-1 aProperties text-white">
                    <i class="bi bi-person-vcard"></i><span class="d-none d-sm-inline"> Empleados</span> </a>
                </li>
                <li class="w-100">
                  <a href="../Views/rolesView.php" class="nav-link px-1 aProperties text-white">
                  <i class="bi bi-person-rolodex"></i><span class="d-none d-sm-inline"> Roles</span> </a>
                </li>
              </ul>
            </div>
          </li>

  <?php
} 
?>
 


        </ul>

      </div>
    </div>
    <div class="col p-0">
      <script src="../js/menu.js"></script>