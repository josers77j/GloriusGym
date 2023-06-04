<?php
include('../config.php');



if (
    preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['id_miembro']) &&
    preg_match('/^[0-9 ]+$/', $_GET['id_membresia']) &&
    preg_match('/^[0-9 ]+$/', $_GET['status']) &&
    preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]*$/', $_GET['observaciones']) &&
    preg_match('/^[0-9 ]+$/', $_GET['id_usuario']) &&
    preg_match('/^[-+]?[0-9]+(\.[0-9]+)?$/', $_GET['monto'])
) {
    
    //datos para pagos
    $monto = $_GET["monto"];
    $metodo_pago = "efectivo";
    $observaciones = $_GET["observaciones"];
    $status = $_GET["status"];
    $fecha_creacion = date("Y-m-d");
    $id_usuario = $_GET["id_usuario"];
    

    //datos para membresia miembro
    $token = md5( $_GET['id_miembro'] . "+" . 
                                    $_GET['id_membresia'] . "+" . 
                                    $_GET['status'] . "+" . 
                                    $_GET['observaciones'] . "+" . 
                                    $_GET['id_usuario'] . "+" . 
                                    $metodo_pago . "+" . 
                                    $fecha_creacion . "+" . 
                                    $_GET['monto']);
                                    
    $id_miembro = $_GET["id_miembro"];
    $fecha_inicio = $_GET["fecha_inicio"];
    $id_membresia = $_GET["id_membresia"];

    $duracion = $_GET["duracion"];
    $fechaActual = new DateTime($fecha_inicio);
    $fechaEnDuracion = clone $fechaActual;
    $fechaEnDuracion->modify('+' . $duracion . ' months');
    $fechaEnDuracion = $fechaEnDuracion->format('Y-m-d');
    
    // Realizar alguna acción con la fecha en duración

    $stmt = $pdo->prepare('INSERT INTO tbl_membresia_miembro (id, id_miembro, id_membresia, fecha_inicio, fecha_fin) 
                            VALUES (:id, :id_miembro, :id_membresia, :fecha_inicio, :fecha_fin)');
    if ($stmt->execute(array(
        ':id' => $token,
        ':id_miembro' => $id_miembro,
        ':id_membresia' => $id_membresia,
        ':fecha_inicio' => $fecha_inicio,
        ':fecha_fin' => $fechaEnDuracion
    ))) {
        $res = "ok";
    } else {
        echo json_encode(["status" => "error"]);
        $pdo = null;
        
    }

    $stmt2 = $pdo->prepare('INSERT INTO tbl_pagos (monto, metodo_pago, observaciones, status, fecha_creacion, id_usuario, id_membresia_miembro) 
                            VALUES (:monto, :metodo_pago, :observaciones, :status, :fecha_creacion, :id_usuario, :token)');
    if ($stmt2->execute(array(
        ':monto' => $monto,
        ':metodo_pago' => $metodo_pago,
        ':observaciones' => $observaciones,
        ':status' => $status,
        ':fecha_creacion' => $fecha_creacion,
        ':id_usuario' => $id_usuario,
        ':token' => $token           
    ))) {
        echo json_encode(["status" => "success"]);
        $pdo = null;
        
    }

} else {
    $pdo = null;
    echo json_encode(["status" => "error"]);
}
