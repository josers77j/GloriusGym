<?php
include('../config.php');

$id = $_GET['id'];
// Obtener los datos actuales del registro
$user = $_GET['nombre'];
$pass = $_GET['password'];
$id_rol = $_GET['id_roles'];
$id_empl = $_GET['id_empleados'];
$status = $_GET['id_status'];
$hash = password_hash($pass, PASSWORD_BCRYPT);
// Actualizar el registro en la base de datos
$stmt = $pdo->prepare("UPDATE tbl_usuarios SET usuario = :usuario, 
                                              password = :pass, 
                                              id_roles = :id_rol, 
                                              id_empleados = :id_empl, 
                                              status = :status
                                               
                                              WHERE id = :id");
$stmt->execute([
    'usuario' => $user,
    'pass' => $hash,
    'id_rol' => $id_rol,
    'id_empl' => $id_empl,
    'status' => $status,
    'id' => $id
]);
