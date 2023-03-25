<?php
include('../config.php');
include('../Includes/header.php');
include('../Includes/loginCheck.php'); ?>
<title>Usuarios</title>
</head>

<body>
    <?php
    include('../Includes/saludo.php');
    include('../Includes/menu.php')
    ?>
    <div class="p-md-3 rounded-end text-bg-dark">
        <div class="row">
            <div class="col-md-0">
                <?= '<h1 class="display-4 fs-2 fst-italic">' . $saludo . '</h1>' ?>
            </div>
        </div>
    </div>

    <div class="container"><br>
        <div class="row">
            <div class="col-4">

                <?php
                include("../Modals/usuarioCreate.php");
                ?>
            </div>
            <div class="container-fluid">
                <div class="container-fluid bg-light shadow p-2 mb-3 bg-body rounded">
                    <div class="row">
                        <div class="container col-9 my-2">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control" id="busqueda-usuarios" placeholder="Buscar Usuario..." aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="container col-2 m-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="nuevo" onclick="limpiarFormulario('guardarUsuario'); ">
                                Nuevo Usuario
                            </button>
                        
                        </div>
                    </div>
                </div>

                <div class="container-fluid bg-light p-3 shadow p-3 mb-5 bg-body rounded">
                    <table id="tabla-usuarios" class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Empleado</th>
                                <th scope="col">Status</th>
                                <th scope="col" colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- aquí se llenarán los datos de la consulta -->
                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/usuarios.js"></script>
    <script>
     
    </script>
    <?php include("../Includes/footer.php"); ?>

</body>

</html>