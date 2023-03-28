
<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Si la variable de sesión no existe, redirige al usuario al formulario de inicio de sesión
    header("Location: ../index.php");
    exit();
}
?>
