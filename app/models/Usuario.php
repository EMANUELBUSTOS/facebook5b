<?php
require_once '../config/database.php';

class Usuario {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function verificarCredenciales($username, $password) {
        $sql = "SELECT * FROM usuarios WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // Asegúrate de usar hash en producción
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function registrarUsuario($username, $password) {
        // Insertar el usuario en la base de datos sin encriptar la contraseña
        $sql = "INSERT INTO usuarios (username, password) VALUES (:username, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);  // Aquí no ciframos la contraseña

        // Ejecutar la consulta
        return $stmt->execute();  // Devuelve true si la inserción fue exitosa
    }
    
    public function obtenerUsuarios() {
        $sql = "SELECT username, password FROM usuarios";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerCredenciales() {
        $sql = "SELECT id, username, password FROM usuarios";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorIdU($id) {
        // Crear una instancia de Database y obtener la conexión
        $database = new Database();
        $db = $database->conectar();  // Usamos el método no estático
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarU($id, $username, $password) {
        // Crear una instancia de Database y obtener la conexión
        $database = new Database();
        $db = $database->conectar();  // Usamos el método no estático
        $stmt = $db->prepare("UPDATE usuarios SET username = ?, password = ? WHERE id = ?");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $id);
        return $stmt->execute();
    }
    
}
