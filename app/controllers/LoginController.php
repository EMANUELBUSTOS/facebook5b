<?php
require_once '../app/models/Usuario.php';

class LoginController {
    public function mostrarLogin() {
        require_once '../app/views/login.php';
    }

    public function validarLogin() {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Validar usuario especial "AdminLeo"
        if ($username === 'AdminLeo1' && $password === 'AdminLeo1') {
            // Redirigir a un formulario especial para AdminLeo
            header('Location: /facebook5b/public/formulario_admin');
            exit;
        }
    
        // Validación con base de datos
        $usuario = new Usuario();
        $resultado = $usuario->verificarCredenciales($username, $password);
    
        if ($resultado) {
            header('Location: /facebook5b/public/formulario');
        } else {
            echo "<script>alert('Credenciales incorrectas'); window.location.href = '/facebook5b/public/';</script>";
        }
    }
    
}
