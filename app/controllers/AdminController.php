<?php

require_once '../app/models/Usuario.php';
require_once '../app/models/Persona.php';
require_once '../config/database.php';

class AdminController {
    public function mostrarFormularioAdmin() {
        // Crear una instancia de la clase Database
        $database = new Database();
        $db = $database->conectar(); // Llamada al método no estático conectar()

        // Obtener los usuarios
        $query = "SELECT * FROM usuarios";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $persona = new Persona();
        $personas = $persona->obtenerPersonas();

        // Pasar los datos a la vista
        require_once '../app/views/formulario_admin.php';
    }
}
