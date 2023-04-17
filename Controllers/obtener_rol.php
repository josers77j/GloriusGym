<?php
include('../config.php');
// Verificar que se ha recibido el ID de la mascota
if (!isset($_GET['id'])) {
    die('No se ha recibido el ID del usuario');
}

$idRol = $_GET['id'];

// Preparar la consulta SQL para obtener los datos de la mascota
$consulta = $pdo->prepare("call obtenerRolesEdit(".$idRol.")");
// Ejecutar la consulta
$consulta->execute();

// Obtener los resultados
$rol = $consulta->fetch(PDO::FETCH_ASSOC);

// Devolver los datos de la mascota como JSON
echo json_encode($rol);
