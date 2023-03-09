<?php
session_start();
include_once('../config.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO tbl_persona (nombre, direccion, fecha_nacimiento, sexo, id_contacto) VALUES (:nombre, :direccion, :fecha_nacimiento, :sexo, :id_contacto)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'] , ':direccion' => $_POST['direccion'] , ':fecha_nacimiento' => $_POST['fecha_nacimiento'], ':sexo' => $_POST['sexo'], ':id_contacto' => $_POST['id_contacto'])) ) ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: personaView.php');
	
?>