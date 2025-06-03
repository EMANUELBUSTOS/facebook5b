<?php

require_once '../config/database.php';

class Persona {

    private $conn;

    public function __construct() {
        $this->conn = (new Database())->conectar();
    }

    public function guardarPersona($nombre, $fechaNacimiento, $sexo_id, $estadocivil_id, $calle, $ciudad, $pais, $telefono) {
        $sql = "INSERT INTO persona (nombre, fecha_nacimiento, sexo_id, estadocivil_id) 
                VALUES (:nombre, :fecha_nacimiento, :sexo_id, :estadocivil_id)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fecha_nacimiento', $fechaNacimiento);
        $stmt->bindParam(':sexo_id', $sexo_id);
        $stmt->bindParam(':estadocivil_id', $estadocivil_id);
        $stmt->execute();
    
        // Ahora, obtén el ID de la persona recién insertada
        $personaId = $this->conn->lastInsertId();
    
        // Insertar dirección (suponiendo que tienes otra función o aquí mismo)
        $sqlDireccion = "INSERT INTO direccion (persona_id, calle, ciudad, pais)
                         VALUES (:persona_id, :calle, :ciudad, :pais)";
        $stmt = $this->conn->prepare($sqlDireccion);
        $stmt->bindParam(':persona_id', $personaId);
        $stmt->bindParam(':calle', $calle);
        $stmt->bindParam(':ciudad', $ciudad);
        $stmt->bindParam(':pais', $pais);
        $stmt->execute();
    
        // Insertar teléfono
        $sqlTelefono = "INSERT INTO telefono (persona_id, numero_telefonico)
                        VALUES (:persona_id, :telefono)";
        $stmt = $this->conn->prepare($sqlTelefono);
        $stmt->bindParam(':persona_id', $personaId);
        $stmt->bindParam(':telefono', $telefono);
        return $stmt->execute();
    }
    
    public function obtenerPersonas() {
        $sql = "SELECT 
                    p.id, 
                    p.nombre, 
                    p.fecha_nacimiento, 
                    s.descripcion AS sexo, 
                    ec.descripcion AS estado_civil, 
                    d.calle, 
                    d.ciudad, 
                    d.pais, 
                    t.numero_telefonico 
                FROM persona p
                LEFT JOIN sexo s ON p.sexo_id = s.id
                LEFT JOIN estadoCivil ec ON p.estadoCivil_id = ec.id
                LEFT JOIN direccion d ON p.id = d.persona_id
                LEFT JOIN telefono t ON p.id = t.persona_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id)
    {
        // Crear una instancia de la clase Database
        $database = new Database();
        $conn = $database->conectar();  // Obtener la conexión

        $stmt = $conn->prepare("SELECT p.id, p.nombre, p.fecha_nacimiento, p.sexo_id, p.estadocivil_id, 
                                       d.calle, d.ciudad, d.pais, t.numero_telefonico 
                                FROM persona p
                                LEFT JOIN direccion d ON p.id = d.persona_id
                                LEFT JOIN telefono t ON p.id = t.persona_id
                                WHERE p.id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);  // Cambié bind_param() por bindParam() de PDO
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public static function actualizar($data)
    {
        // Crear una instancia de la clase Database
        $database = new Database();
        $conn = $database->conectar();  // Obtener la conexión
    
        $id = $data['id'];
        $nombre = $data['nombre'];
        $sexo = $data['sexo'];
        $estadocivil = $data['estadoCivil'];
        $calle = $data['calle'];
        $ciudad = $data['ciudad'];
        $pais = $data['pais'];
        $telefono = $data['telefono'];
    
        // Actualizar persona
        $stmt = $conn->prepare("UPDATE persona SET nombre = ?, sexo_id = ?, estadocivil_id = ? WHERE id = ?");
        $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(2, $sexo, PDO::PARAM_INT);
        $stmt->bindParam(3, $estadocivil, PDO::PARAM_INT);
        $stmt->bindParam(4, $id, PDO::PARAM_INT);
        $stmt->execute();
    
        // Actualizar dirección
        $stmt = $conn->prepare("UPDATE direccion SET calle = ?, ciudad = ?, pais = ? WHERE persona_id = ?");
        $stmt->bindParam(1, $calle, PDO::PARAM_STR);
        $stmt->bindParam(2, $ciudad, PDO::PARAM_STR);
        $stmt->bindParam(3, $pais, PDO::PARAM_STR);
        $stmt->bindParam(4, $id, PDO::PARAM_INT);
        $stmt->execute();
    
        // Actualizar teléfono
        $stmt = $conn->prepare("UPDATE telefono SET numero_telefonico = ? WHERE persona_id = ?");
        $stmt->bindParam(1, $telefono, PDO::PARAM_STR);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function eliminarPorId($id)
    {
        $conexion = $this->conn;
    
        // Eliminar registros relacionados primero
        $sql1 = "DELETE FROM direccion WHERE persona_id = :id";
        $stmt1 = $conexion->prepare($sql1);
        $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt1->execute();
    
        $sql2 = "DELETE FROM telefono WHERE persona_id = :id";
        $stmt2 = $conexion->prepare($sql2);
        $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt2->execute();
    
        // Luego eliminar la persona
        $sql3 = "DELETE FROM persona WHERE id = :id";
        $stmt3 = $conexion->prepare($sql3);
        $stmt3->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt3->execute();
    }


}
