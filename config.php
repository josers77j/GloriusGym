<?php
$host = 'localhost';
$dbname = 'gloriusgym_sv';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}

$status = $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS);
if ($status === false) {
    die('Error de conexión');
}
?>



