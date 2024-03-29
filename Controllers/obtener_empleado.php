<?php
include('../config.php');
// Verificar que se ha recibido el ID de la mascota
if (!isset($_GET['id'])) {
    die('No se ha recibido el ID del usuario');
}

$idEmpleado = $_GET['id'];

// Preparar la consulta SQL para obtener los datos de la mascota
$consulta = $pdo->prepare("call obtenerEmpleadoEdit(".$idEmpleado.")");
// Ejecutar la consulta
$consulta->execute();

// Obtener los resultados
$empleado = $consulta->fetch(PDO::FETCH_ASSOC);

// Devolver los datos de la mascota como JSON
echo json_encode($empleado);
