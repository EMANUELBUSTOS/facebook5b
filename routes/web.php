<?php
session_start();

require_once '../app/controllers/LoginController.php';
require_once '../app/controllers/RegistroController.php';
require_once '../app/controllers/PersonaController.php'; // Incluir el controlador de Persona
require_once '../app/controllers/AdminController.php'; // Incluir el controlador de Admin
require_once '../app/controllers/EditarDatosController.php'; // Agregar el controlador para Editar Datos
require_once '../app/controllers/VerCredencialesController.php';

$uri = $_SERVER['REQUEST_URI'];
$basePath = '/facebook5b/public/';
$route = str_replace($basePath, '', $uri);
$route = strtok($route, '?'); // Quita parámetros GET

$controller = new LoginController();

switch ($route) {
    case '':
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller->mostrarLogin();
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->validarLogin();
        }
        break;

    case 'formulario':
        require_once '../app/views/formulario.php';
        break;

    case 'formulario_admin':
        // Aquí se llama al controlador AdminController para mostrar el formulario de administración
        $controller = new AdminController();
        $controller->mostrarFormularioAdmin(); // Método que maneja la lógica del formulario_admin
        break;

    case 'registroU':
        require_once '../app/views/registroU.php'; // Asegúrate de crear esta vista
        break;

    case 'guardarRegistro':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new RegistroController();
        $controller->guardarRegistro();
    }
        break;

    case 'persona/guardar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Usar el controlador para guardar los datos de la persona
            $controller = new PersonaController();
            $controller->guardarPersona();
        }
        break;

        case 'editar_datos':
            // Controlador para mostrar los datos a editar y buscar
            $controller = new EditarDatosController();
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $controller->index(); // Mostrar la lista de personas
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->buscar(); // Realizar la búsqueda
            }
            break;

        case 'modificacion_datos':
            $controller = new EditarDatosController();
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
                $controller->mostrarFormularioModificar($_GET['id']);
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->actualizarDatos();
            }
            break;

        case 'eliminar_datos':
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $controller = new EditarDatosController();
            $controller->eliminar($_GET['id']);
        }
        break;

        case 'ver_credenciales':
            $controller = new VerCredencialesController();
            $controller->index();
            break;

        case 'modificacion_datosU':
            $controller = new EditarDatosController();
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
                $controller->mostrarFormularioModificarU($_GET['id']);
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->actualizarDatosU();
            }
            break;

        case 'eliminar_datosU':
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
                $controller = new EditarDatosController();
                $controller->eliminarU($_GET['id']);
            }
            break;

    default:
        http_response_code(404);
        echo "Página no encontrada";
}

