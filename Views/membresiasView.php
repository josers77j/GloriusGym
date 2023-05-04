<?php
include('../config.php');
include('../Includes/header.php');
include('../Includes/adminCheck.php'); ?>
<title>empleados</title>
</head>
<?php
include('../Includes/menu.php');
include('../Includes/saludo.php');
?>
<div class="container"><br>
    <div class="row">
        <div class="col-4">

            <?php
            include("../Modals/empleadoCreate.php");
            ?>
        </div>
        <div class="container-fluid ">

            <div class="container-fluid bg-light shadow p-0 mb-3 bg-body rounded">
                <div class="row g-3 m-1 p-2">
                    <div class="col-auto my-3">
                        <label for="" class="form-label">Mostrar :</label>
                    </div>
                    <div class="col-auto my-2">
                        <select class="form-select form-select" name="num_reg" id="num_reg">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                    <div class="col-auto my-3">
                        <label for="" class="form-label">Registros.</label>
                    </div>

                    <div class="col-5"></div>
                    <div class="col-auto my-2">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" id="busqueda-empleados" placeholder="Buscar empleado..." aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-auto col-md4 my-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="nuevo" onclick="limpiarFormulario(); ">
                            <i class="bi bi-plus-circle-fill"> Nuevo Usuario</i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="container-fluid bg-light shadow p-0 mb-5 bg-body rounded">
                <div class="container mt-3 p-0">
                    <div class="table-responsive">


                        <table id="tabla-membresias" class="table table-borderless  text-center table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Fecha de Nacimiento</th>
                                    <th scope="col">Salario</th>
                                    <th scope="col">Fecha de registro</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- aquí se llenarán los datos de la consulta -->
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="container p-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination" id="paginador"></ul>
                    </nav>
                </div>
            </div>
        </div>


    </div>
</div>

<?php include("../Includes/footer.php"); ?>
<script src="../js/membresias.js"></script>


</body>

</html>