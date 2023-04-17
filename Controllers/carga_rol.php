<?php
// Conectar a la base de datos
include('../config.php');

// Obtener el número de registros por página y el término de búsqueda enviado desde la petición AJAX

// Hacer la consulta para obtener los registros correspondientes a la página actual
$sql = "SELECT *, CASE status WHEN 1 THEN 'activo'  WHEN 0 THEN 'inactivo' END AS Nombrestatus FROM tbl_roles ORDER BY nombre ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
// Devolver los resultados en formato JSON
header('Content-Type: application/json');
echo json_encode($resultados);

