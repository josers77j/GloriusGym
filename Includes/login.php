<?php
include('../config.php');
session_start();
try {
    $user = htmlentities(addslashes($_POST['usuario']));
    $pass = htmlentities(addslashes($_POST['password']));
    $sql = "SELECT * FROM tbl_usuarios WHERE usuario = :usuario and status = 1";
    $resultado = $pdo->prepare($sql);
    $resultado->execute(array(":usuario" => $user));
    $login = $resultado->fetch(PDO::FETCH_ASSOC);
    if ($login && password_verify($pass, $login['password'])) {
        
        $sql2 = "SELECT * FROM tbl_usuarios WHERE usuario = :usuario";
        $resultado2 = $pdo->prepare($sql2);
        $resultado2->execute(array(":usuario" => $user));
        
        $usuario = $resultado2->fetch(PDO::FETCH_ASSOC);
      
        $_SESSION['username'] = $usuario['usuario'];   
        $_SESSION['id_roles'] = $usuario['id_roles'];
        $_SESSION['token'] = $usuario['token'];
        echo $_SESSION['id_roles']; 
        $_SESSION['primer_login'] = true;
        echo "<script> window.location = '../Views/dashboardView.php';</script>";
    } else {
        echo "<script>alert('¡Error al validar el usuario y/o contraseña!'); window.location = '../index.php?error=1';</script>";
        exit;
    }        
    //cierro la conexion
    $pdo = null;
} catch(Exception $e) {
    die($e->getMessage());
}

        
    ?>

    
