<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="/facebook5b/public/css/stylesRegister.css?v=1.0">
</head>
<body>

    <div class="container">
        <h2>Formulario de Registro</h2>
        <form id="registerForm" action="/facebook5b/public/guardarRegistro" method="POST">
        <div class="input-group">
                <label for="username">Nombre de Usuario</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="input-group">
                <label for="confirm_password">Confirmar Contraseña</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <div id="error-message" class="error-message"></div>

            <button type="submit" id="submit" class="btn">Registrar</button>
        </form>
        <a href="/facebook5b/public/" class="btn regresar-btn">Regresar a Login</a>
    </div>

    <script src="/facebook5b/public/js/Registro.js"></script>
</body>
</html>
