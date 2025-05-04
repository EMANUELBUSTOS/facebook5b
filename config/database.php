<?php

class Database {
    private $host = "localhost";
    private $db_name = "facebook5b";
    private $username = "facebook5b";
    private $password = "facebook5b";
    public $conn;

    public function conectar() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            die("Error de conexión: " . $exception->getMessage());
        }

        return $this->conn;
    }
}


