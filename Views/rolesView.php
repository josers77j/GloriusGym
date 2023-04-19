<?php
include('../config.php');
include('../Includes/header.php');
include('../Includes/adminCheck.php'); ?>
<title>Roles</title>
</head>

<?php
include('../Includes/menu.php');
include('../Includes/saludo.php');
?>

<div class="container"><br>
    <div class="row">
        <div class="col-4">

            <?php
            include("../Modals/rolCreate.php");
            ?>
        </div>
        <div class="container-fluid ">
           
        <div class="container-fluid bg-light shadow p-0 mb-3 bg-body rounded">
                <div class="row g-3 m-1 p-2">
 
                    <div class="col-auto col-md4 my-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="nuevo" onclick="limpiarFormulario(); ">
                            <i class="bi bi-plus-circle-fill"> Nuevo Rol</i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="container-fluid bg-light shadow p-0 mb-5 bg-body rounded">
                <div class="container mt-3 p-0">
                    <table id="tabla-roles" class="table table-borderless text-center table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Roles</th>
                                <th scope="col">Status</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- aquí se llenarán los datos de la consulta -->
                        </tbody>

                    </table>
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
    <script src="../js/roles.js"></script>

    </body>

    </html>