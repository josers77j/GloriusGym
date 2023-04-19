<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Verificar que los campos obligatorios no estén vacíos
    if (preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['nombre']) && 
        preg_match('/^[0-9 ]+$/', $_GET['telefono']) &&
        preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['direccion']) &&       
        filter_var($_GET['correo'], FILTER_VALIDATE_EMAIL) &&
        preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $_GET['salario']) 
        ) {
  
      if (!filter_var($_GET['correo'], FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error email"]);
      } else {
        
        $id = $_GET['id'];
        // Obtener los datos actuales del registro
        $nombre = filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $telefono = filter_input(INPUT_GET, 'telefono', FILTER_VALIDATE_INT);
        $direccion = filter_input(INPUT_GET, 'direccion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $correo = filter_input(INPUT_GET, 'correo', FILTER_SANITIZE_EMAIL);
        $fecha = $_GET['fecha'];
        $salario = filter_input(INPUT_GET, 'salario', FILTER_VALIDATE_FLOAT);
        $fecha_reg = $_GET['fecha_reg'];
        
        
        // Actualizar el registro en la base de datos
        $stmt = $pdo->prepare("UPDATE tbl_empleados SET nombre = :nombre, 
                                                      direccion = :direccion, 
                                                      telefono = :telefono, 
                                                      correo = :correo, 
                                                      fecha_nac = :fecha_nac, 
                                                      salario = :salario, 
                                                      fecha_reg = :fecha_reg
                                                       
                                                      WHERE id = :id");
        $stmt->execute([
            'nombre' => $nombre,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'correo' => $correo,
            'fecha_nac' => $fecha,
            'salario' => $salario,
            'fecha_reg' => $fecha_reg,
            'id' => $id
        ]);

        $pdo = null;
      
        echo json_encode(["status" => "success"]);
      }
          } else {
      echo json_encode(["status" => "error"]);
  
    }
  }
