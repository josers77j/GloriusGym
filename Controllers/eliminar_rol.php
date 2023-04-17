<?php
// Establecer la conexión a la base de datos
include('../config.php');
// Obtener el ID de la empleado a eliminar
$idRoles = $_GET["id"];

// Preparar la consulta SQL para eliminar la empleado
$sql = "DELETE FROM tbl_roles WHERE id = :id";
$consulta = $pdo->prepare($sql);
$consulta->bindParam(":id", $idRoles);

// Ejecutar la consulta SQL y verificar si se eliminó la empleado correctamente
try {
    $consulta->execute();
    if ($consulta->rowCount() == 1) {
        echo "rol eliminado correctamente";
    } else {
        echo "No se encontró ningun rol con el ID especificado";
    }
} catch (PDOException $e) {
    echo "Error al eliminar el rol: " . $e->getMessage();
}
