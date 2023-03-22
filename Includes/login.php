<?php
include('../config.php');
session_start();

$user = $_POST['usuario'];
$pass = $_POST['password'];

$sql = "SELECT * FROM tbl_usuarios WHERE usuario = :username AND password = :password";
$stmt = $pdo->prepare($sql);

    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':password', $pass);

    if ($stmt->execute()) {
        
        // Si hay un resultado, el usuario existe y la contraseña es correcta. 
        if ($stmt->rowCount() > 0) {
            // Iniciar sesión o hacer lo que sea necesario. 
            $_SESSION['username'] = $user;
            echo "<script>alert('¡Usuario y contraseña Correctos!'); window.location = '../Views/principalView.php';</script>";
            exit;
        } else {
            // El usuario no existe o la contraseña es incorrecta. 
            echo "<script>alert('¡Usuario y contraseña incorrectos!'); window.location = '../index.php?error=1';</script>";
            exit;
        }
    } else {
        echo "<script>alert('¡Error al validar el usuario y/o contraseña!'); window.location = '../index.php?error=1';</script>";
        exit;
    }
    ?>
