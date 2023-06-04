

<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Verificar que los campos obligatorios no estén vacíos
    if (
        preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['nombre']) &&
        preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]+$/', $_GET['direccion']) &&
        filter_var($_GET['correo'], FILTER_VALIDATE_EMAIL) &&
        preg_match('/^[0-9 ]+$/', $_GET['telefono'])
    ) {
        $id = $_GET['id'];
        // Obtener los datos actuales del registro
        $nombre = filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $direccion = filter_input(INPUT_GET, 'direccion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $telefono = filter_input(INPUT_GET, 'telefono', FILTER_VALIDATE_INT);
        $correo = filter_input(INPUT_GET, 'correo', FILTER_SANITIZE_EMAIL);
        $fecha = $_GET["fecha_reg"];


        // Actualizar el registro en la base de datos
        $stmt = $pdo->prepare("UPDATE tbl_miembros SET nombre = :nombre, 
                                              direccion = :direccion, 
                                              telefono = :telefono, 
                                              correo = :correo,
                                              fecha_registro = :fecha
                                               
                                              WHERE id = :id");
        $stmt->execute([
            'nombre' => $nombre,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'correo' => $correo,
            'fecha' => $fecha,
            'id' => $id
        ]);

        $pdo = null;

        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}
