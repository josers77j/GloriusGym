<?php
include('../config.php');
// Verificar que se ha recibido el ID de la mascota
if (!isset($_GET['token'])) {
    die('No se ha recibido el token del usuario');
}

$tokenUsuario = $_GET['token'];

// Preparar la consulta SQL para obtener los datos del usuario
$consulta = $pdo->prepare("call obtenerUsuariosEdit(:tokenUsuario)");
$consulta->bindParam(':tokenUsuario', $tokenUsuario, PDO::PARAM_STR);

// Ejecutar la consulta
$consulta->execute();

// Obtener los resultados
$usuario = $consulta->fetch(PDO::FETCH_ASSOC);
$id_empleado = $usuario['id_empleados'];


//cierro la consulta
$consulta->closeCursor();

//inicio la consulta para llenar el select de empleados
$sql = "SELECT * FROM tbl_empleados WHERE status = 0 ";
$stmt2 = $pdo->prepare($sql);
$stmt2->execute();

$empleados = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$stmt2->closeCursor(); 


$data = array(
    'resultados' => $usuario,
    'empleados' => $empleados
);
// Devolver los datos de la mascota como JSON
echo json_encode($data);
