<?php
include('../config.php');
// Verificar que se ha recibido el ID de la membresia
if (!isset($_GET['id'])) {
    die('No se ha recibido el ID de la membresia');
}

$idMembresia = $_GET['id'];

// Preparar la consulta SQL para obtener los datos de la membresia
$consulta = $pdo->prepare("call obtenerMembresiaEdit(".$idMembresia.")");
// Ejecutar la consulta
$consulta->execute();

// Obtener los resultados
$membresia = $consulta->fetch(PDO::FETCH_ASSOC);

// Devolver los datos de la mascota como JSON
echo json_encode($membresia);
