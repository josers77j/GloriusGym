<?php
// Conectar a la base de datos
include('../config.php');

// Obtener el término de búsqueda enviado desde la petición AJAX
$limitReg = $_GET["num_reg"];
$buscar = $_GET["buscar"];
$inicio = $_GET["inicio"];
// Hacer la consulta
//$sql = "SELECT * FROM tbl_usuarios WHERE usuario LIKE '%".$buscar."%' ORDER BY usuario ASC LIMIT ".$inicio.", ".$limitReg;
$sql = "call obtenerUsuarios('%".$buscar."%', $inicio, $limitReg);";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt->closeCursor(); 

$sqlCount = "SELECT COUNT(*) as total_registros FROM tbl_usuarios WHERE usuario LIKE '%".$buscar."%'";
$stmt2 = $pdo->prepare($sqlCount);
$stmt2->execute();



$count = $stmt2->fetchAll(PDO::FETCH_ASSOC);


$stmt2->closeCursor(); 
// Devolver los resultados en formato JSON
$data = array(
    'resultados' => $resultados,
    'total_registros' => $count[0]['total_registros']
);
$pdo = null;
header('Content-Type: application/json');
echo json_encode($data);
