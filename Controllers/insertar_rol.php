<?php
include('../config.php');



if (preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['nombre']) &&
    preg_match('/^[0-9 ]+$/', $_GET['status'])) {
    $nombre = $_GET['nombre'];
    $status = $_GET['status'];
    
    $stmt = $pdo->prepare('INSERT INTO tbl_roles (nombre, status) VALUES (:nombre, :status)');
    if ($stmt->execute(array(
        ':nombre' => $nombre,
        ':status' => $status
    ))) {
        $pdo = null;
        $response = ["response" => "success"];
        $json_response = json_encode($response);
    } else {
        $pdo = null;
        echo json_encode(["status" => "error"]);
    }
} else {
    $pdo = null;
    echo json_encode(["status" => "error"]);
}
