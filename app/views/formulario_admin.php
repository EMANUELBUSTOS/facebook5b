<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - AdminLeo</title>
    <link rel="stylesheet" href="/facebook5b/public/css/AdminPanel.css?v=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <h1>Panel de Administración - LEBMA</h1>
</header>

<nav>
    <button onclick="mostrarSeccion('usuarios')">Registro de Usuarios</button>
    <button onclick="mostrarSeccion('datos')">Datos Ingresados</button>
</nav>

<main>
    <section id="usuarios" style="display:block;">
        <h2>Registro de Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>Correo</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody id="tablaUsuarios">
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['username']) ?></td>
                    <td><?= htmlspecialchars($usuario['password']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section id="datos" style="display:none;">
        <h2>Datos Ingresados por Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Sexo</th>
                    <th>Estado Civil</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody id="tablaDatos">
                <?php foreach ($personas as $persona): ?>
                <tr>
                    <td><?= htmlspecialchars($persona['nombre']) ?></td>
                    <td><?= htmlspecialchars($persona['fecha_nacimiento']) ?></td>
                    <td><?= htmlspecialchars($persona['sexo']) ?></td>
                    <td><?= htmlspecialchars($persona['estado_civil']) ?></td>
                    <td><?= htmlspecialchars($persona['calle']) ?>, <?= htmlspecialchars($persona['ciudad']) ?>, <?= htmlspecialchars($persona['pais']) ?></td>
                    <td><?= htmlspecialchars($persona['numero_telefonico']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <a href="/facebook5b/public/" class="btn-regresar">Cerrar Sesión</a>
    <a href="/facebook5b/public/editar_datos" class="boton-editar">Editar Datos</a>
</main>

<script>
function mostrarSeccion(id) {
    document.getElementById('usuarios').style.display = (id === 'usuarios') ? 'block' : 'none';
    document.getElementById('datos').style.display = (id === 'datos') ? 'block' : 'none';
}
</script>

</body>
</html>
