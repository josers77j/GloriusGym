<?php
include('../config.php');
include('../Includes/header.php');
include('../Includes/loginCheck.php');

?>
<title>Inicio</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<?php
include('../Includes/menu.php');
include('../Includes/saludo.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="container-fluid shadow p-2 mb-2 mt-3 bg-body rounded">
                    <p class="text-center fs-2 w-light">Estadisticas</p>
                    <div class="row row-cols-1 row-cols-md-4 g-3">

                        <div class="col-3">
                            <div class="card text-white bg-primary">
                                <div class="card-header">Miembros Registrados</div>
                                <div class="card-body">
                                    <div class="row">
                                        <i class="bi bi-people-fill fs-1 col-2"></i>
                                        <h5 class="card-title fs-1 col-5">+320</h5>
                                    </div>
                                    <p class="card-text fs-2">Totales</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="col card text-white bg-secondary">
                                <div class="card-header">Miembros Activos</div>
                                <div class="card-body">
                                    <div class="row">
                                        <i class="bi bi-people-fill fs-1 col-2"></i>
                                        <h5 class="card-title fs-1 col-5">+89</h5>
                                    </div>
                                    <p class="card-text fs-2">Del año anterior.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="col card text-white bg-success">
                                <div class="card-header">Recaudado</div>
                                <div class="card-body">
                                    <div class="row">
                                        <i class="bi bi-people-fill fs-1 col-2"></i>
                                        <h5 class="card-title fs-1 col-5">+10</h5>
                                    </div>
                                    <p class="card-text fs-2">Del mes anterior.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="col card text-white bg-success">
                                <div class="card-header">Asistencias Registradas</div>
                                <div class="card-body">
                                    <div class="row">
                                        <i class="bi bi-people-fill fs-1 col-2"></i>
                                        <h5 class="card-title fs-1 col-5">+10</h5>
                                    </div>
                                    <p class="card-text fs-2">Del mes anterior.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>


        <div class="col-md-12">
            <div class="container-fluid shadow p-2 mb-2 mt-3 bg-body rounded">
            <p class="text-center fs-2 w-light">Graficos</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Membresias Vendidas por mes</h5>
                        </div>
                        <div class="card-body">
                        <canvas id="myChart1"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Membresias populares</h5>
                        </div>
                        <div class="card-body">
                        <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            </div>
      
            <div class="col-md-12">
            <div class="container-fluid shadow p-2 mb-2 mt-3 bg-body rounded">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Tabla de datos</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Columna 1</th>
                                        <th>Columna 2</th>
                                        <th>Columna 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Dato 1</td>
                                        <td>Dato 2</td>
                                        <td>Dato 3</td>
                                    </tr>
                                    <tr>
                                        <td>Dato 4</td>
                                        <td>Dato 5</td>
                                        <td>Dato 6</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('../Includes/footer.php') ?>
<script>
    var ctx = document.getElementById('myChart1').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
    datasets: [{
      label: 'Ventas',
      data: [12, 19, 3, 5, 2, 3],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

</script>
<script>
    var ctx = document.getElementById('myChart2').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Rojo', 'Azul', 'Amarillo'],
    datasets: [{
      label: '# de votos',
      data: [12, 19, 3],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});

</script>
</body>



</html>