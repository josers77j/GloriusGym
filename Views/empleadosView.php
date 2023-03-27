<?php
include('../config.php');
include('../Includes/header.php');
include('../Includes/loginCheck.php'); ?>
<title>empleados</title>
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
                include("../Modals/empleadoCreate.php");
                ?>
            </div>
            <div class="container-fluid">
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
                                Nuevo empleado
                            </button>
                        
                        </div>
                    </div>
                </div>

                <div class="container-fluid bg-light p-3 shadow p-3 mb-5 bg-body rounded">
                    <table id="tabla-empleados" class="table table-striped">
                        <thead class="table-dark">
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
    
    <?php include("../Includes/footer.php"); ?>
    <script src="../js/empleados.js"></script>
   
  
</body>

</html>