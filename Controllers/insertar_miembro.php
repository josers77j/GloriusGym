<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Verificar que los campos obligatorios no estén vacíos
    if (
        preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['nombre']) &&
        preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['direccion']) &&
        filter_var($_GET['correo'], FILTER_VALIDATE_EMAIL) &&
        preg_match('/^[0-9 ]+$/', $_GET['telefono']) &&
        $_GET["fecha_reg"] != null
    ) {
        $nombre = filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $direccion = filter_input(INPUT_GET, 'direccion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $telefono = filter_input(INPUT_GET, 'telefono', FILTER_VALIDATE_INT);
        $correo = filter_input(INPUT_GET, 'correo', FILTER_SANITIZE_EMAIL);
        $fecha = $_GET["fecha_reg"];

        $stmt = $pdo->prepare('INSERT INTO tbl_miembros (nombre, direccion, telefono, correo, fecha_registro) VALUES (:nombre, :direccion, :telefono, :correo, :fecha)');
        if ($stmt->execute(array(
            ':nombre' => $nombre,
            ':direccion' => $direccion,
            ':telefono' => $telefono,
            ':correo' => $correo,
            ':fecha' => $fecha
        ))) {
            $pdo = null;
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error general"]);
        }
    } else {
        echo json_encode(["status" => "error preg match"]);
    }
}
