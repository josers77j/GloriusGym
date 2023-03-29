<?php

include('../config.php');
session_start();
$id = $_GET['id'];
// Obtener los datos actuales del registro
$user = $_GET['nombre'];
$pass = $_GET['password'];
$id_rol = $_GET['id_roles'];
$id_empl = $_GET['id_empleados'];
$status = $_GET['id_status'];
$_SESSION['username'] = $user;
$hash = password_hash($pass, PASSWORD_BCRYPT);
// Actualizar el registro en la base de datos
if (empty($pass)) {
    $stmt = $pdo->prepare("UPDATE tbl_usuarios SET usuario = :usuario, 
    id_roles = :id_rol, 
    id_empleados = :id_empl, 
    status = :status
     
    WHERE id = :id");
$stmt->execute([
'usuario' => $user,
'id_rol' => $id_rol,
'id_empl' => $id_empl,
'status' => $status,
'id' => $id
]);    
}else{
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
}


