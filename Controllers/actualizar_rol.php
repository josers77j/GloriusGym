<?php
include('../config.php');

$id = $_GET['id'];
// Obtener los datos actuales del registro
$nombre = $_GET['nombre'];
$status = $_GET['status'];

// Actualizar el registro en la base de datos
$stmt = $pdo->prepare("UPDATE tbl_roles SET nombre = :nombre, 
                                              status = :status
                                               
                                              WHERE id = :id");
$stmt->execute([
    'nombre' => $nombre,
    'status' => $status,
    'id' => $id
]);
