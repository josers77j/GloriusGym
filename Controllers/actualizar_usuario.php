<?php

include('../config.php');

// Actualizar el registro en la base de datos
try {

    if (preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['nombre'])) {

        session_start();

        $token = $_GET['token'];
        // Obtener los datos actuales del registro
        $user = $_GET['nombre'];
        $pass = $_GET['password'];
        $id_rol = $_GET['id_roles'];
        $id_empl = $_GET['id_empleados'];
        $status = $_GET['id_status'];
        if ($_SESSION['token'] == $token) {
            $_SESSION['username'] = $user;
        }
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        if (empty($pass)) {
            empleadoSetStatus($token, $pdo, $id_empl);
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
        }
        if (preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['password'])) {
            empleadoSetStatus($token, $pdo, $id_empl);
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
    } else {
        $pdo = null;
        echo json_encode(["status" => "error"]);
    }
} catch (\Throwable $th) {
    $pdo = null;
    echo json_encode(["status" => "error"]);
}

function empleadoSetStatus($token, $pdo, $id_empl)
{

    $tokenUsuario = $token;

    // Preparar la consulta SQL para obtener los datos del usuario
    $consulta = $pdo->prepare("call obtenerUsuariosEdit(:tokenUsuario)");
    $consulta->bindParam(':tokenUsuario', $tokenUsuario, PDO::PARAM_STR);
    // Ejecutar la consulta
    $consulta->execute();
    // Obtener los resultados    
    $id_empleado = $consulta->fetchColumn();
    $consulta->closeCursor();
    echo $id_empleado;



    if ($id_empleado != $id_empl) {
        $statusoff = 0;
        $sql = $pdo->prepare("UPDATE tbl_empleados set status = :status WHERE id = :id");
        $sql->execute([
            'status' => $statusoff,
            'id' => $id_empleado
        ]);
        
        $statuson = 1;
        $sql2 = $pdo->prepare("UPDATE tbl_empleados set status = :status where id = :id_emplNew");
        $sql2->execute([
            'status' => $statuson,
            'id_emplNew' => $id_empl
        ]);
    
        echo "llega";

        echo $id_empleado . "id empleado anterior -";
        echo $id_empl . "id nuevo empleado -";
        echo $statusoff . "status -";
    }
}
