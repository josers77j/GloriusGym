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

          
        </div>
        <div class="container-fluid ">

            <div class="container-fluid bg-light shadow p-0 mb-3 bg-body rounded">
                <div class="row g-3 m-1 p-2">
                 
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


                        <table id="tabla-asistencias" class="table table-borderless  text-center table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Hora y Fecha de asistencia</th>
                                    <th scope="col">Miembro</th>

                                    <!-- <?php if ($_SESSION["id_roles"] == 1) {
                                        ?>
                                          <th scope="col">Acciones</th>                                 
                                        <?php
                                    } ?> -->
                                    
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
<script src="../js/asistencias.js"></script>


</body>

</html>