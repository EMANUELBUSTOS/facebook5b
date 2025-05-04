<?php

require_once '../app/models/PersonaModel.php';

class EditarDatosController {
    // Mostrar la página con todos los datos
    public function index() {
        $personas = PersonaModel::buscarPorNombre('');
        require_once '../app/views/editar_datos.php';
    }
    
    

    // Realizar la búsqueda de personas
    public function buscar() {
        $nombre = $_POST['nombre'] ?? '';
        $personas = PersonaModel::buscarPorNombre($nombre);
        require_once '../app/views/editar_datos.php';
    }

    public function mostrarFormularioModificar($id)
    {
        require_once '../app/models/Persona.php';
        $persona = Persona::obtenerPorId($id);
        require_once '../app/views/modificacion_datos.php';
    }
    
    public function actualizarDatos()
    {
        require_once '../app/models/Persona.php';
        Persona::actualizar($_POST);
        echo "<script>alert('Datos actualizados con éxito.'); window.location.href='editar_datos';</script>";
    }

    public function eliminar($id)
{
    require_once '../app/models/Persona.php';
    $persona = new Persona();
    $persona->eliminarPorId($id);
    
    // Redirige de nuevo a la vista principal
    header('Location: /facebook5b/public/editar_datos');
    exit;
}
    // Este es el método para obtener las credenciales desde la base de datos
    private function obtenerCredenciales($nombre = '') {
        // Conexión a la base de datos
        $db = new Database();
        $conn = $db->connect();
        
        // Preparar la consulta SQL para buscar credenciales por username
        $sql = "SELECT * FROM credenciales WHERE username LIKE :nombre";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':nombre', "%$nombre%");
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Función para mostrar el formulario de edición
    public function mostrarFormularioModificarU($id) {
        // Obtener los datos del usuario con el ID proporcionado
        $usuario = Usuario::obtenerPorIdU($id); // Asegúrate de tener el método adecuado en tu modelo de Usuario.

        if ($usuario) {
            // Mostrar el formulario con los datos del usuario
            require_once '../app/views/editar_credencial.php';
        } else {
            // Si no se encuentra al usuario, redirigir o mostrar un error
            echo "Usuario no encontrado.";
        }
    }

    // Función para actualizar los datos en la base de datos
    public function actualizarDatosU() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'], $_GET['id'])) {
            $id = $_GET['id'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Llamar al modelo para actualizar los datos
            $usuario = new Usuario();
            $usuario->actualizarU($id, $username, $password); // Método que deberías tener en el modelo Usuario para actualizar

            // Redirigir a una página de éxito o de vuelta al listado de usuarios
            header('Location: /facebook5b/public/ver_credenciales');
            exit;
        }
    }

    public function eliminarU($id) {
        // Aquí debes llamar al modelo que maneja la eliminación en la base de datos
        $model = new PersonaModel();  // Asegúrate de incluir el modelo correcto
        $model->eliminarCredencial($id);   // Llama al método para eliminar la credencial

        // Después de eliminar, redirigir de vuelta a la vista de credenciales
        header("Location: ../public/ver_credenciales");
        exit();
    }

}
