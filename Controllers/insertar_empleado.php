<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verificar que los campos obligatorios no estén vacíos
  if (empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion']) || empty($_POST['correo']) || empty($_POST['fecha']) || empty($_POST['salario']) || empty($_POST['fecha_reg'])) {
    $error = "Todos los campos son obligatorios.";
  } else {
    // Validar que los campos sean del tipo correcto
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
    $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
    $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
    $fecha = $_POST['fecha'];
    $salario = filter_input(INPUT_POST, 'salario', FILTER_VALIDATE_FLOAT);
    $fecha_reg = $_POST['fecha_reg'];

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
      $error = "El correo electrónico no es válido.";
    } else if (!$salario) {
      $error = "El salario debe ser un número válido.";
    } else {
      // Todos los campos son válidos
      // Hacer algo con los datos
      // ...
      $exito = "Datos enviados correctamente.";
    }
  }
}



   $nombre = $_GET['nombre'];
   $tel = $_GET['telefono'];
   $dir = $_GET['direccion'];
   $corr = $_GET['correo'];
   $fech = $_GET['fecha'];
   $sal = $_GET['salario'];
   $fecha_reg =$_GET['fecha_reg'];

   $stmt = $pdo->prepare('INSERT INTO tbl_empleados (nombre, direccion, telefono, correo, fecha_nac, salario, fecha_reg) VALUES (:nombre, :direccion, :telefono, :correo, :fecha_nac, :salario, :fecha_reg)');
   if ($stmt->execute(array(
       ':nombre' => $nombre,
       ':direccion' => $dir,
       ':telefono' => $tel,
       ':correo' => $corr,
       ':fecha_nac' => $fech,
       ':salario' => $sal,
       ':fecha_reg' => $fecha_reg
   ))) {
   } else {
       echo "<script>alert('Error al registrar al empleado');</script>";
   }
   $conn = null;
