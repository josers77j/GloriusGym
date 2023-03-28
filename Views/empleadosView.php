<?php
include('../config.php');
include('../Includes/header.php');
include('../Includes/loginCheck.php'); ?>
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
            <div class="container-fluid bg-light shadow p-2 mb-3 bg-body rounded">
                <div class="row">
                    <div class="container col-9 my-2">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" id="busqueda-empleados" placeholder="Buscar empleado..." aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="container col-2 m-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="nuevo" onclick="limpiarFormulario('guardarempleado'); ">
                        <i class="bi bi-plus-circle-fill"> Nuevo Usuario</i>
                        </button>

                    </div>
                </div>
            </div>

            <div class="container-fluid bg-light shadow p-0 mb-5 bg-body rounded">
                <div class="container p-0">
                <table id="tabla-empleados" class="table table-borderless table-hover">
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
                <div class="container p-3">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">2</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
                </div>
            </div>

        </div>


    </div>
</div>

<?php include("../Includes/footer.php"); ?>
<script src="../js/empleados.js"></script>


</body>

</html>