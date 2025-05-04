<?php

require_once '../config/database.php';

class PersonaModel {
    public static function buscarPorNombre($nombre) {
        $db = new Database();
        $conn = $db->conectar();
    
        $query = "SELECT p.id, p.nombre, s.descripcion AS sexo, ec.descripcion AS estado_civil, 
                         d.calle, d.ciudad, d.pais, t.numero_telefonico
                  FROM persona p
                  LEFT JOIN sexo s ON p.sexo_id = s.id
                  LEFT JOIN estadocivil ec ON p.estadocivil_id = ec.id
                  LEFT JOIN direccion d ON p.id = d.persona_id
                  LEFT JOIN telefono t ON p.id = t.persona_id";
    
        if (!empty($nombre)) {
            $query .= " WHERE p.nombre LIKE :nombre";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':nombre', '%' . $nombre . '%');
        } else {
            $stmt = $conn->prepare($query);
        }
    
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function eliminarCredencial($id) {
        $db = new Database();
        $conn = $db->conectar();
    
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
    }
    
}    

