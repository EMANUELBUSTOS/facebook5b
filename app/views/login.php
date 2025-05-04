<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../public/css/LoginStyle.css?v=1.0">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="/facebook5b/public/login" method="POST" onsubmit="return validarFormulario();">
        <div class="input-group">
                <label for="username">Usuario</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="login-btn">Entrar</button>
        </form>
        <div class="message">
            ¿No tienes cuenta? <a href="/facebook5b/public/registroU">Regístrate</a>
        </div>
    </div>
</body>
</html>
