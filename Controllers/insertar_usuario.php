<?php
include('../config.php');
   $nombre = $_GET['nombre'];
   $pass = $_GET['password'];
   $id_rol = $_GET['id_roles'];
   $id_empl = $_GET['id_empleados'];
   $stat = $_GET['id_status'];
   
   $stmt = $pdo->prepare('INSERT INTO tbl_usuarios (usuario, password, id_roles, id_empleados, status) VALUES (:nombre, :pass, :id_rol, :id_empl, :status)');
   if ($stmt->execute(array(
       ':nombre' => $nombre,
       ':pass' => $pass,
       ':id_rol' => $id_rol,
       ':id_empl' => $id_empl,
       ':status' => $stat
   ))) {
   } else {
       echo "<script>alert('Error al registrar al usuario');</script>";
   }
   $conn = null;
?>
