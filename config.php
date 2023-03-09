<?php

class connection{


private $server = "mysql:host=localhost;dbname=gloriusgym_sv";
private $username = "root";
private $password = "";
private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
protected $pdo;

public function open(){
    try {
        $this->pdo = new PDO($this->server, $this->username, $this->password, $this->options);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->pdo;
    } catch (PDOException $e) {
        die ("error de conexion: " . $e->getMessage());
    }
}

public function close(){
    $this->pdo = null;
}


}








?>