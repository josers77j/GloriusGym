<?php
include('../config.php');

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
?>
