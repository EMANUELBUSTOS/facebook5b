<?php
require_once '../app/models/Usuario.php';

class RegistroController {

    public function mostrarFormularioRegistro() {
        require_once '../app/views/registroU.php';  // Mostrar formulario de registro
    }

    public function guardarRegistro() {
        // Verificar que se hayan enviado los datos
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            // Verificar si las contraseñas coinciden
            if ($password === $confirmPassword) {
                // Crear objeto Usuario y registrar en la base de datos
                $usuario = new Usuario();
                $resultado = $usuario->registrarUsuario($username, $password);  // Pasamos la contraseña sin cifrar

                if ($resultado) {
                    // Redirigir a login después de registrar el usuario
                    header('Location: /facebook5b/public/registroU?success=true');
                    exit();

                } else {
                    echo "Error al registrar el usuario. Intente nuevamente.";
                }
            } else {
                echo "<script>alert('Las contraseñas no coinciden.'); window.location.href = '/facebook5b/public/registroU';</script>";
            }
        } else {
            echo "Error: Todos los campos son obligatorios.";
        }
    }
}
