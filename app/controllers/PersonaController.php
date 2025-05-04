<?php

require_once '../app/models/Persona.php';

class PersonaController {

    public function mostrarFormulario() {
        require_once '../app/views/formulario.php';
    }

    public function guardarPersona() {
        // Verificar que se hayan enviado los datos
        if (isset($_POST['nombre']) && isset($_POST['fechaNacimiento']) && isset($_POST['sexo_id']) && isset($_POST['estadocivil_id']) && isset($_POST['calle']) && isset($_POST['ciudad']) && isset($_POST['pais']) && isset($_POST['telefono'])) {
            $nombre = $_POST['nombre'];
            $fechaNacimiento = $_POST['fechaNacimiento'];
            $sexo_id = $_POST['sexo_id'];
            $estadocivil_id = $_POST['estadocivil_id'];
            $calle = $_POST['calle'];
            $ciudad = $_POST['ciudad'];
            $pais = $_POST['pais'];
            $telefono = $_POST['telefono'];
    
            // Crear objeto Persona y guardar en la base de datos
            $persona = new Persona();
            $resultado = $persona->guardarPersona($nombre, $fechaNacimiento, $sexo_id, $estadocivil_id, $calle, $ciudad, $pais, $telefono);
    
            if ($resultado) {
                // Redirigir a algún lugar después de guardar los datos
                header('Location: /facebook5b/public/formulario');
            } else {
                echo "Error al registrar la persona.";
            }
        } else {
            echo "Error: Todos los campos son obligatorios.";
        }
    }
    
}
