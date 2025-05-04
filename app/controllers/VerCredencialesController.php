<?php
require_once '../app/models/Usuario.php';

class VerCredencialesController {
    public function index() {
        $usuario = new Usuario();
        $credenciales = $usuario->obtenerCredenciales();

        require '../app/views/ver_credenciales.php';
    }


    
}
