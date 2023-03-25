<?php

include('../config.php');


if (!isset($_GET['id'])) {
    // $nombre = $_POST['nombre'];
    // $raza = $_POST['raza'];
    // $color = $_POST['color'];
    // $peso = $_POST['peso'];
    // $altura = $_POST['altura'];
    // $sexo = $_POST['sexo'];
    // $fech_nacimiento = $_POST['fech_nacimiento'];

    // $stmt = $pdo->prepare('INSERT INTO mascotas (nombre, raza, color, peso, altura, sexo, fech_nacimiento) VALUES (:nombre, :raza, :color, :peso, :altura, :sexo, :fech_nacimiento)');
    // if ($stmt->execute(array(
    //     ':nombre' => $nombre,
    //     ':raza' => $raza,
    //     ':color' => $color,
    //     ':peso' => $peso,
    //     ':altura' => $altura,
    //     ':sexo' => $sexo,
    //     ':fech_nacimiento' => $fech_nacimiento
    // ))) {
    // } else {
    //     echo "<script>alert('Error al registrar la mascota');</script>";
    // }
    // $conn = null;

} else {
    // $id = $_GET['id'];
    // // Obtener los datos actuales del registro
    // $stmt = $pdo->prepare("SELECT * FROM mascotas WHERE id_mascota = :id");
    // $stmt->execute(['id' => $id]);
    // $mascota = $stmt->fetch(PDO::FETCH_ASSOC);
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     $nombre = $_POST['nombre'];
    //     $raza = $_POST['raza'];
    //     $color = $_POST['color'];
    //     $peso = $_POST['peso'];
    //     $altura = $_POST['altura'];
    //     $sexo = $_POST['sexo'];
    //     $fech_nacimiento = $_POST['fech_nacimiento'];

    //     // Actualizar el registro en la base de datos
    //     $stmt = $pdo->prepare("UPDATE mascotas SET nombre = :nombre, 
    //                                             raza = :raza, 
    //                                             color = :color, 
    //                                             peso = :peso, 
    //                                             altura = :altura, 
    //                                             sexo = :sexo, 
    //                                             fech_nacimiento = :fech_nacimiento 
    //                                             WHERE id_mascota = :id");
    //     $stmt->execute([
    //         'nombre' => $nombre,
    //         'raza' => $raza,
    //         'color' => $color,
    //         'peso' => $peso,
    //         'altura' => $altura,
    //         'sexo' => $sexo,
    //         'fech_nacimiento' => $fech_nacimiento,
    //         'id' => $id
    //     ]);
    // }
}
