<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Credenciales</title>
    <link rel="stylesheet" href="../public/css/EditarDatos.css?v=1.0">
</head>
<body>
    <div class="container">
        <h1>Ver y Gestionar Credenciales</h1>

        <!-- Formulario de búsqueda por username -->
        <form method="POST" action="" class="search-form">
            <input type="text" name="buscar_usuario" placeholder="Buscar por nombre de usuario"
                value="<?= isset($_POST['buscar_usuario']) ? htmlspecialchars($_POST['buscar_usuario']) : '' ?>">
            <button type="submit" name="buscar">Buscar</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Filtrar resultados si se buscó algo
                if (isset($_POST['buscar'])) {
                    $filtro = trim($_POST['buscar_usuario']);
                    $credenciales_filtradas = array_filter($credenciales, function($row) use ($filtro) {
                        return stripos($row['username'], $filtro) !== false;
                    });
                } else {
                    $credenciales_filtradas = $credenciales;
                }
                ?>

                <?php if (!empty($credenciales_filtradas)): ?>
                    <?php foreach ($credenciales_filtradas as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['username']) ?></td>
                            <td><?= htmlspecialchars($row['password']) ?></td>
                            <td>
                            <a href="modificacion_datosU?id=<?= $row['id'] ?>">Editar</a>
                            <a href="#" onclick="confirmarEliminacion(<?= $row['id'] ?>)">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="3" class="no-usuarios">No hay credenciales registradas.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <a href="editar_datos" class="btn regresar">Regresar</a>
    </div>
 <script src="../public/js/verCredencial.js"></script>
</body>
</html>
