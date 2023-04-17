<?php
include('../config.php');



if (
    preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['nombre']) &&
    preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['password'])
) {
    $nombre = $_GET['nombre'];
    $pass = $_GET['password'];
    $id_rol = $_GET['id_roles'];
    $id_empl = $_GET['id_empleados'];
    $stat = $_GET['id_status'];
    $hash = password_hash($pass, PASSWORD_BCRYPT);
    $token = md5($_GET['nombre'] . "+" . $_GET['password'] . "+" . $_GET['id_roles'] . "+" . $_GET['id_empleados'] . "+" . $_GET['id_status']);
    $stmt = $pdo->prepare('INSERT INTO tbl_usuarios (token, usuario, password, id_roles, id_empleados, status) VALUES (:token, :nombre, :pass, :id_rol, :id_empl, :status)');
    if ($stmt->execute(array(
        ':token' => $token,
        ':nombre' => $nombre,
        ':pass' => $hash,
        ':id_rol' => $id_rol,
        ':id_empl' => $id_empl,
        ':status' => $stat
    ))) {
        $statusEmpleadoActivo = 1;
        $statusEmpleadoInactivo = 0;

        $pdo = null;
        $response = ["response" => "success"];
        $json_response = json_encode($response);
        echo trim($json_response);
    } else {
        $pdo = null;
        echo json_encode(["status" => "error"]);
    }
} else {
    $pdo = null;
    echo json_encode(["status" => "error"]);
}
