<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    if ($_SESSION['id_roles'] != 1) {
        header("Location: ../Views/principalView.php");
        exit();        
    }
} else {
    // Si la variable de sesión no existe, redirige al usuario al formulario de inicio de sesión
    header("Location: ../index.php");
    exit();
}
?>
