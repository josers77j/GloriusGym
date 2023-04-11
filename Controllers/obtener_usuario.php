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

// Devolver los datos de la mascota como JSON
echo json_encode($usuario);
