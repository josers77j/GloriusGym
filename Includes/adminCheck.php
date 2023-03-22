<?php
include('config.php');

$queryAd = $pdo->prepare('SELECT * FROM usuario WHERE nombre_usuario LIKE ' . "'$username'");
$queryAd->execute();
$admin = $queryAd->fetchAll(PDO::FETCH_OBJ);
$id_rol  = $admin[0]->id_roles;
//el 1 significa el id de la variable admin, si el registro del rol administrador es distinto, habria que modificar la condicion usando el id respectivo asignado al administrador, y asi evitar que un usuario cualquiera pueda tener acceso a funciones claves
if (!($id_rol == 1)) {
    header("location: principal.php");
}

?>