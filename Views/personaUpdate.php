<?php
	session_start();
	include_once('../config.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$nombre = $_POST['nombre'];
			$direccion = $_POST['direccion'];
			$fecha_nac = $_POST['fecha_nacimiento'];
			$sexo = $_POST['sexo'];
			$id_cont = $_POST['id_contacto'];

			$sql = "UPDATE tbl_persona SET nombre = '$nombre', direccion = '$direccion', fecha_nacimiento = '$fecha_nac', sexo = '$sexo', id_contacto = '$id_cont' WHERE id = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Persona actualizada correctamente' : 'No fue posible actualizar a la persona';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Es necesario Completar el Formulario';
	}

	header('location: personaView.php');

?>