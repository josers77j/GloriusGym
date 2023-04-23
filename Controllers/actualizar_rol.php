<?php
include('../config.php');
if (preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['nombre'])&&
    preg_match('/^[0-9 ]+$/', $_GET['status'])) {
        $id = $_GET['id'];
        // Obtener los datos actuales del registro
        $nombre = $_GET['nombre'];
        $status = $_GET['status'];
        
        // Actualizar el registro en la base de datos
        $stmt = $pdo->prepare("UPDATE tbl_roles SET nombre = :nombre, 
                                                      status = :status
                                                       
                                                      WHERE id = :id");
        $stmt->execute([
            'nombre' => $nombre,
            'status' => $status,
            'id' => $id
        ]);
        
        echo json_encode(["status" => "success"]);
}else{
    echo json_encode(["status" => "error"]);
}

