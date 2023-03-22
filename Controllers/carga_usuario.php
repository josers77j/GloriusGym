<?php
// Conectar a la base de datos
include('../config.php');

// Obtener el término de búsqueda enviado desde la petición AJAX
$buscar = $_GET["buscar"];
// Hacer la consulta
$sql = "call obtenerUsuarios('%".$buscar."%');";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Devolver los resultados en formato JSON
header('Content-Type: application/json');
echo json_encode($resultados);
