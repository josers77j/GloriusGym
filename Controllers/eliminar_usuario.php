<?php
// Establecer la conexión a la base de datos
include('../config.php');
// Obtener el ID de la mascota a eliminar
$tokenUsuario = $_GET["token"];

// Preparar la consulta SQL para eliminar la mascota
$sql = "DELETE FROM tbl_usuarios WHERE token = :token";
$consulta = $pdo->prepare($sql);
$consulta->bindParam(":token", $tokenUsuario);

// Ejecutar la consulta SQL y verificar si se eliminó la mascota correctamente
try {
    $consulta->execute();
    if ($consulta->rowCount() == 1) {
        echo "Usuario eliminadO correctamente";
    } else {
        echo "No se encontró ningun Usuario con el ID especificado";
    }
} catch (PDOException $e) {
    echo "Error al eliminar al usuario: " . $e->getMessage();
}
