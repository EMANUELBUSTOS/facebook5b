<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar y Eliminar Datos - Panel Admin</title>
    <link rel="stylesheet" href="/facebook5b/public/css/EditarDatos.css?v=1.0">
</head>
<body>
    <div class="container">
        <h1>Panel de Administrador: Editar y Eliminar Datos</h1>

        <!-- Formulario de búsqueda -->
        <form method="POST" action="/facebook5b/public/editar_datos" class="search-form">
            <input type="text" name="nombre" placeholder="Buscar por nombre" 
                value="<?= isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '' ?>">
            <button type="submit" name="buscar">Buscar</button>
        </form>

        <!-- Mostrar los resultados -->
        <?php if (!empty($personas)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Estado Civil</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($personas as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['nombre']) ?></td>
                        <td><?= htmlspecialchars($p['sexo']) ?></td>
                        <td><?= htmlspecialchars($p['estado_civil']) ?></td>
                        <td><?= htmlspecialchars($p['calle']) . ', ' . htmlspecialchars($p['ciudad']) . ', ' . htmlspecialchars($p['pais']) ?></td>
                        <td><?= htmlspecialchars($p['numero_telefonico']) ?></td>
                        <td>
                        <a href="modificacion_datos?id=<?php echo $p['id']; ?>">Editar</a>
                        <a href="#" onclick="confirmarEliminacion(<?= $p['id'] ?>)">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-usuarios">No se encontraron resultados.</div>
        <?php endif; ?>

        <a href="formulario_admin" class="btn regresar">Regresar al Panel</a>
        <a href="ver_credenciales" class="ver-credenciales">Ver Credenciales</a>
    </div>

    <script src="/facebook5b/public/js/editar_datos.js"></script>
</body>
</html>
