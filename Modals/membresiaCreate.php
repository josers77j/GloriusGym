

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Membresias</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form id="form_membresias" method="post">
    <div class="row">
        <div class="form-group col-6">
            <label for="nombre">Nombre:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="estandar" required>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-tag"></i></span>
            </div>
        </div>

        <div class="form-group col-6">
            <label for="nombre">Duracion:</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control" id="duracion" name="duracion" placeholder="5" required>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-check"></i></span>
            </div>
        </div>

        <div class="form-group col-12">
            <label for="nombre">Descripcion:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="caracteristicas de la membresia" required>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-text"></i></span>
            </div>
        </div>
      

        <div class="form-group col-12">
            <label for="nombre">Costo:</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control" id="costo" name="costo" placeholder="24.99" required>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-dollar"></i></span>
            </div>
        </div>

    </div>
</form>

      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarModal">Cerrar</button>
        <div id="containerbutton"></div>
      </div>
    </div>
  </div>
</div>




