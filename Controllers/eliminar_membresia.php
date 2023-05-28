<?php
// Establecer la conexión a la base de datos
include('../config.php');
// Obtener el ID de la membresia a eliminar
$idMembresia = $_GET["id"];

// Preparar la consulta SQL para eliminar la empleado
$sql = "DELETE FROM tbl_membresias WHERE id = :id";
$consulta = $pdo->prepare($sql);
$consulta->bindParam(":id", $idMembresia);

// Ejecutar la consulta SQL y verificar si se eliminó la membresia correctamente
try {
    $consulta->execute();
    if ($consulta->rowCount() == 1) {
        echo "Membresia eliminada correctamente";
    } else {
        echo "No se encontró ninguna membresia con el ID especificado";
    }
} catch (PDOException $e) {
    echo "Error al eliminar el rol: " . $e->getMessage();
}