<?php
include('../config.php');
include('../Includes/header.php');
include('../Includes/loginCheck.php');

?>
<title>Inicio</title>

</head>
<?php
include('../Includes/menu.php');
include('../Includes/saludo.php');
?>


<div class="container-fluid">
    <div class="row">

        <div class="container col-2 shadow p-3 mt-4 mb-3 bg-body rounded">
            <p class="text-center fs-2 w-light">Miembros</p>


            <div class="row row-cols-1 row-cols-md-1 g-2">
                <div class="col">
                    <div class="card">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nuevo Miembro</h5>
                            <p class="card-text">Ingresa rapido un nuevo Miembro.</p>
                            <a href="mascotas.php" class="btn btn-primary">Agregar</a>
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="card">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Consulta de Membresias</h5>
                            <p class="card-text">Listado de miembros activos con membresias vigentes.</p>
                            <a href="clientes.php" class="btn btn-primary">Acceder</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container col-9 shadow p-2 mb-3 mt-4 bg-body rounded">
            <div class="w-100 my-1">
                <div class="container">
                    <p class="text-center fs-2 w-light">Estadisticas</p>
                    <div class="row row-cols-1 row-cols-md-4 g-3">

                        <div class="col">
                            <div class="card text-white bg-primary">
                                <div class="card-header">Numero de clientes</div>
                                <div class="card-body">
                                    <div class="row">
                                        <i class="bi bi-people-fill fs-1 col-2"></i>
                                        <h5 class="card-title fs-1 col-5">+320</h5>
                                    </div>
                                    <p class="card-text fs-2">Totales</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="col card text-white bg-secondary">
                                <div class="card-header">numero de clientes</div>
                                <div class="card-body">
                                    <div class="row">
                                        <i class="bi bi-people-fill fs-1 col-2"></i>
                                        <h5 class="card-title fs-1 col-5">+89</h5>
                                    </div>
                                    <p class="card-text fs-2">Del año anterior.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="col card text-white bg-success">
                                <div class="card-header">numero de clientes</div>
                                <div class="card-body">
                                    <div class="row">
                                        <i class="bi bi-people-fill fs-1 col-2"></i>
                                        <h5 class="card-title fs-1 col-5">+10</h5>
                                    </div>
                                    <p class="card-text fs-2">Del mes anterior.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card text-white bg-danger ">
                                <div class="card-header">numero de visitas</div>
                                <div class="card-body">
                                    <i class="fas fa-walking fs-1"></i>
                                    <h5 class="card-title fs-2">+405</h5>
                                    <p class="card-text">Totales.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card text-dark bg-warning ">
                                <div class="card-header">numero de visitas</div>
                                <div class="card-body">
                                    <i class="fas fa-walking fs-1"></i>
                                    <h5 class="card-title fs-2">+175</h5>
                                    <p class="card-text">Del año anterior.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card text-dark bg-info ">
                                <div class="card-header">numero de visitas</div>
                                <div class="card-body">
                                    <i class="fas fa-walking fs-1"></i>
                                    <h5 class="card-title fs-1">+405</h5>
                                    <p class="card-text">Del mes anterior.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card text-dark bg-light">
                                <div class="card-header">Vacunas suministradas</div>
                                <div class="card-body">
                                    <i class="fas fa-syringe fs-1"></i>
                                    <h5 class="card-title fs-1">+58</h5>
                                    <p class="card-text">Totales</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card text-white bg-dark ">
                                <div class="card-header">Mascotas desparasitadas</div>
                                <div class="card-body">
                                    <i class="fas fa-bug fs-1"></i>
                                    <h5 class="card-title fs-1">+125</h5>
                                    <p class="card-text">Totales</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card text-white bg-primary ">
                                <div class="card-header">Ingresos</div>
                                <div class="card-body">
                                    <i class="fas fa-dollar-sign fs-1"></i>
                                    <h5 class="card-title fs-1">+$15,485</h5>
                                    <p class="card-text">Totales</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>
</div>

<?php include('../Includes/footer.php') ?>

</body>



</html>