<?php
include('../config.php');
include('../Includes/header.php');
include('../Includes/loginCheck.php'); ?>
<title>Usuarios</title>
</head>

    <?php
    include('../Includes/menu.php');
    include('../Includes/saludo.php');
    ?>
    
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
                    <table id="tabla-usuarios" class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Usuario</th>
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
<div class="container">
<div class="card border-dark mb-3" style="max-width: 18rem;">
  <div class="card-header">Nota</div>
  <div class="card-body text-dark">
    <h5 class="card-title">Importante</h5>
    <p class="card-text">Al editar un usuario, no es necesario rellenar el campo de "Contraseña" en caso de el administrador requiera realizar un cambio dentro del registro y difiera del cambio de contraseña de un usuario cualquiera, este puede omitirse "dejar en blanco", y continuar con los cambios que desea realizar.</p>
  </div>
</div>
            </div>


        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php include("../Includes/footer.php"); ?>
    <script src="../js/usuarios.js"></script>
 
</body>

</html>