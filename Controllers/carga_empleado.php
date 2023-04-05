<?php
// Conectar a la base de datos
include('../config.php');

// Obtener el número de registros por página y el término de búsqueda enviado desde la petición AJAX
$limitReg = $_GET["num_reg"];
$buscar = $_GET["buscar"];
$inicio = $_GET["inicio"];

// Hacer la consulta para obtener los registros correspondientes a la página actual
$sql = "SELECT * FROM tbl_empleados WHERE nombre LIKE '%".$buscar."%' ORDER BY nombre ASC LIMIT ".$inicio.", ".$limitReg;

$stmt = $pdo->prepare($sql);
$stmt->execute();

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sqlCount = "SELECT COUNT(*) as total_registros FROM tbl_empleados WHERE nombre LIKE '%".$buscar."%'";
$stmt2 = $pdo->prepare($sqlCount);
$stmt2->execute();
$count = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$data = array(
    'resultados' => $resultados,
    'total_registros' => $count[0]['total_registros']
);

// Devolver los resultados en formato JSON
header('Content-Type: application/json');
echo json_encode($data);

