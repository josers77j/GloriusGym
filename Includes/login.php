<?php
include('../config.php');
session_start();
    try {
        //verifico los datos del login
        $user=htmlentities(addslashes($_POST['usuario']));
        $pass=htmlentities(addslashes($_POST['password']));//variable auxiliar para comprobar que el usuario existe o no
        $contador = 0;//almaceno la consulta SQL en una variable
        $sql = "SELECT * FROM tbl_usuarios WHERE usuario = :usuario";
        //preparo la consulta SQL
        $resultado=$pdo->prepare($sql);
        //ejecucion de la consulta
        $resultado->execute(array(":usuario"=>$user));
        //resultado en un array asociativo tipo while
        while($login=$resultado->fetch(PDO::FETCH_ASSOC)) {
        if(password_verify($pass, $login['password'])) {

        $contador++;
        }
        }
        
        if ($contador>0) {
            $_SESSION['username'] = $user;
            $_SESSION['primer_login'] = true;
            echo "<script> window.location = '../Views/principalView.php';</script>";
        } else {
            echo "<script>alert('¡Error al validar el usuario y/o contraseña!'); window.location = '../index.php?error=1';</script>";
            exit;
        }
        
        //cierro la conexion
        $conexion = null;
        } catch(Exception $e) {
        die($e->getMessage());
        }
        
    ?>

    
