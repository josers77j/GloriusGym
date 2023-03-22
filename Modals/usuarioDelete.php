<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addnewLabel">Agregar Nuevo Registro</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="personaInsert.php">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                        <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                    </div>
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo:</label>
                        <input type="text" class="form-control" id="sexo" name="sexo">
                    </div>
                    <div class="mb-3">
                        <label for="id_contacto" class="form-label">Contacto:</label>
                        <input type="text" class="form-control" id="id_contacto" name="id_contacto">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
