<?php

include('../config.php');

// Actualizar el registro en la base de datos
try {

    if (preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['nombre'])){
            session_start();
            $token = $_GET['token'];
            // Obtener los datos actuales del registro
            $user = $_GET['nombre'];
            $pass = $_GET['password'];
            $id_rol = $_GET['id_roles'];
            $id_empl = $_GET['id_empleados'];
            $status = $_GET['id_status'];
            $_SESSION['username'] = $user;
            $hash = password_hash($pass, PASSWORD_BCRYPT);
            if (empty($pass)) {
                $stmt = $pdo->prepare("UPDATE tbl_usuarios SET usuario = :usuario, 
                id_roles = :id_rol, 
                id_empleados = :id_empl, 
                status = :status
                 
                WHERE token = :token");
                $stmt->execute([
                    'usuario' => $user,
                    'id_rol' => $id_rol,
                    'id_empl' => $id_empl,
                    'status' => $status,
                    'token' => $token
                ]);
                $pdo = null;
                echo json_encode(["status" => "success"]);
            } if (preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['password'])) {
                $stmt = $pdo->prepare("UPDATE tbl_usuarios SET usuario = :usuario, 
                password = :pass, 
                id_roles = :id_rol, 
                id_empleados = :id_empl, 
                status = :status
                 
                WHERE token = :token");
                $stmt->execute([
                    'usuario' => $user,
                    'pass' => $hash,
                    'id_rol' => $id_rol,
                    'id_empl' => $id_empl,
                    'status' => $status,
                    'token' => $token
                ]);
                $pdo = null;
                echo json_encode(["status" => "success"]);
            }
    }else{
        $pdo = null;
        echo json_encode(["status" => "error"]);

    }

    
} catch (\Throwable $th) {
        $pdo = null;
        echo json_encode(["status" => "error"]);
}
