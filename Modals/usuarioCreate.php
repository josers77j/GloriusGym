<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form id="form_usuarios" method="post">
          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre">
          </div>
          <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password">
          </div>
          <div class="form-group">
            <label for="id_roles">Rol:</label>
            <select class="form-control" id="id_roles">
              <option value="1">Administrador</option>
              <option value="2">Usuario</option>
            </select>
          </div>
          <div class="form-group">
            <label for="id_persona">ID Persona:</label>
            <input type="text" class="form-control" id="id_persona">
          </div>
          <div class="form-group">
            <label for="status">Estado:</label>
            <select class="form-control" id="status">
              <option value="activo">Activo</option>
              <option value="inactivo">Inactivo</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cancelarEdicion()">Close</button>
        <button type="button" class="btn btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>

