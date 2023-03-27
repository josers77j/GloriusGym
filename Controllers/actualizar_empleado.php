<?php
include('../config.php');

$id = $_GET['id'];
// Obtener los datos actuales del registro
$nombre = $_GET['nombre'];
$tel = $_GET['telefono'];
$dir = $_GET['direccion'];
$corr = $_GET['correo'];
$fech = $_GET['fecha'];
$sal = $_GET['salario'];
$fech_reg = $_GET['fecha_reg'];

// Actualizar el registro en la base de datos
$stmt = $pdo->prepare("UPDATE tbl_empleados SET nombre = :nombre, 
                                              direccion = :direccion, 
                                              telefono = :telefono, 
                                              correo = :correo, 
                                              fecha_nac = :fecha_nac, 
                                              salario = :salario, 
                                              fecha_reg = :fecha_reg
                                               
                                              WHERE id = :id");
$stmt->execute([
    'nombre' => $nombre,
    'direccion' => $dir,
    'telefono' => $tel,
    'correo' => $corr,
    'fecha_nac' => $fech,
    'salario' => $sal,
    'fecha_reg' => $fech_reg,
    'id' => $id
]);
