<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Credenciales - Panel Admin</title>
    <link rel="stylesheet" href="../public/css/editar_credenciales.css?v=1.0">
</head>
<body>
    <div class="container">
        <h1>Editar Credenciales de Usuario</h1>

        <?php if (isset($mensaje)) : ?>
            <div class="alert <?= $mensaje['tipo'] ?>">
                <?= htmlspecialchars($mensaje['texto']) ?>
            </div>
        <?php endif; ?>

        <form action="modificacion_datosU?id=<?= htmlspecialchars($usuario['id']) ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?= htmlspecialchars($usuario['username']) ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?= htmlspecialchars($usuario['password']) ?>" required>

            <label>
                <input type="checkbox" id="show-password"> Mostrar Contraseña
            </label>

            <button type="submit">Actualizar Credenciales</button>
        </form>

        <a href="ver_credenciales" class="btn regresar">Regresar al Panel</a>
    </div>

    <script src="../public/js/editar_credenciales.js"></script>
</body>
</html>

