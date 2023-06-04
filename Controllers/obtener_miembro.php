<?php
include('../config.php');
// Verificar que se ha recibido el ID de la Miembro
if (!isset($_GET['id'])) {
    die('No se ha recibido el ID del Miembro');
}

$idMiembro = $_GET['id'];

// Preparar la consulta SQL para obtener los datos de la Miembro
$consulta = $pdo->prepare("call obtenerMiembroEdit(".$idMiembro.")");
// Ejecutar la consulta
$consulta->execute();

// Obtener los resultados
$Miembro = $consulta->fetch(PDO::FETCH_ASSOC);

// Devolver los datos de la mascota como JSON
echo json_encode($Miembro);
