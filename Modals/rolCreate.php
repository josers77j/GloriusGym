
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

        <form id="form_roles" method="post">
          <div class="row">
            <div class="form-group col-6">
              <label for="nombre">Nombre del Rol:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Entrenador">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-ui-radios-grid"></i></span>
              </div>
            </div>
            <div class="form-group col-6">
              <label for="id_roles">Estado del rol:</label>
              <div class="input-group mb-3">
              <select class="form-control" id="status" name="status">               
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

