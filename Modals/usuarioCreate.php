<?php
include('../config.php');
$query = $pdo->prepare("call obtenerRoles()");
$query->execute();
$query = $query->fetchAll();

$query2 = $pdo->prepare("call obtenerEmpleadosU()");
$query2->execute();
$query2 = $query2->fetchAll();



?>

<!-- pdo::fetchAssoc  -->
<!-- pdo::fetchobj -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Usuarios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="form_usuarios" method="post">
          <div class="row">
            <div class="form-group col-6">
              <label for="nombre">Nombre de usuario:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tomoya116">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>
            <div class="form-group col-6">
              <label for="password">Contraseña:</label>

              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Contraseña" aria-describedby="button-addon2" name="password" id="password">
                <button class="btn btn-outline-secondary" onclick="togglePassword()" type="button" id="button-addon2"><i class="bi bi-eye-slash"></i></button>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="id_roles">Rol:</label>
              <div class="input-group mb-3">
                <select class="form-control" id="id_roles" name="id_roles">
                  <option selected value="id_roles">Seleccionar Rol</option>
                  <?php
                  foreach ($query as $key) :
                  ?>
                    <option value="<?php echo $key['id']; ?>"><?php echo $key['nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-lines-fill"></i></span>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="id_roles">Empleado:</label>
              <div class="input-group mb-3">
                <select class="form-control" id="id_empleados" name="id_empleados">
                  <option selected value="id_empleados">Seleccionar Empleado</option>
                  <?php
                  foreach ($query2 as $key) :
                  ?>
                    <option value="<?php echo $key['id']; ?>"><?php echo $key['nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-lines-fill"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label for="id_roles">Estado del usuario:</label>
              <div class="input-group mb-3">
              <select class="form-control" id="id_status" name="id_status">               
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-toggles"></i></span>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarModal">Cerrar</button>
        <div id="containerbutton"></div>
      </div>
    </div>
  </div>
</div>

<script>
  function togglePassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>