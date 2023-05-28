<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Verificar que los campos obligatorios no estén vacíos
  if (preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['nombre']) && 
      preg_match('/^[0-9 ]+$/', $_GET['duracion']) &&
      preg_match('/^[-+]?[0-9]+(\.[0-9]+)?$/', $_GET['costo']) &&
      preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['descripcion']) 
      ) {
    $nombre = filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $duracion = filter_input(INPUT_GET, 'duracion', FILTER_VALIDATE_INT);
    $descripcion = filter_input(INPUT_GET, 'descripcion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $costo = filter_input(INPUT_GET, 'costo', FILTER_VALIDATE_FLOAT);

      $stmt = $pdo->prepare('INSERT INTO tbl_membresias (nombre, descripcion, duracion, costo) VALUES (:nombre, :descripcion, :duracion, :costo)');
      if ($stmt->execute(array(
          ':nombre' => $nombre,
          ':descripcion' => $descripcion,
          ':duracion' => $duracion,
          ':costo' => $costo
           ))) {
        $pdo = null;    
        echo json_encode(["status" => "success"]);
      } else {
        echo json_encode(["status" => "error general"]);
      }

    
        } else {
    echo json_encode(["status" => "error preg match"]);

  }
}




