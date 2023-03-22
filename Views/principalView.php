<?php
include('../config.php');
include('../Includes/header.php');
include('../Includes/loginCheck.php'); ?>
<title>Inicio</title>

</head>

<body>
    <?php include('../Includes/saludo.php') ?>

    <?php include('../Includes/menu.php') ?>

    <div class="p-md-3 rounded-end text-bg-dark">
        <div class="row">
            <div class="col-md-0">
                <?= '<h1 class="display-4 fs-2 fst-italic">' . $saludo . '</h1>' ?>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="container col-9">
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
            <div class="container col-2">
                <p class="text-center fs-2 w-light">Consultas</p>
                <div class="row">
                    <div class="row row-cols-1 row-cols-md-1 g-2">
                        <div class="col">
                            <div class="card">
                                <img src="img/mascotaP.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Consulta Rapida</h5>
                                    <p class="card-text">Accede al listado de Mascotas.</p>
                                    <a href="mascotas.php" class="btn btn-primary">Acceder</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="img/dueñosP.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Consulta Completa</h5>
                                    <p class="card-text">Accede a todo el listado de Dueños.</p>
                                    <a href="clientes.php" class="btn btn-primary">Acceder</a>
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