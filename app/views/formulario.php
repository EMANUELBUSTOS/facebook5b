<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Principal</title>
    <link rel="stylesheet" href="/facebook5b/public/css/FormularioU.css?v=1.0">
</head>
<body>
    <div class="container"> <!-- Aquí está el cambio -->
        <h2>Formulario de Registro de Persona</h2>
        <form action="/facebook5b/public/persona/guardar" method="POST" id="formularioPersona">
            <label for="nombre">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" required>

            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo_id" required>
                <option value="">Seleccione</option>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
            </select>

            <label for="estadoCivil">Estado Civil:</label>
            <select id="estadoCivil" name="estadocivil_id" required>
                <option value="">Seleccione</option>
                <option value="1">Soltero</option>
                <option value="2">Casado</option>
                <option value="3">Divorciado</option>
                <option value="4">Unido</option>
                <option value="5">Viudo</option>
            </select>

            <label for="calle">Calle:</label>
            <input type="text" id="calle" name="calle" required>

            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" required>

            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" required>

            <label for="telefono">Número de Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>

            <input type="submit" value="Registrar Persona">
        </form>

        <a href="/facebook5b/public/" class="BtnRe">Cerrar Sesión</a>
    </div>
    <script src="/facebook5b/public/js/formulario.js"></script>

</body>
</html>
