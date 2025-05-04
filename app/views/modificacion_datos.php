<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos</title>
    <link rel="stylesheet" href="/facebook5b/public/css/ModificacionDatos.css?v=1.0">
</head>
<body>
    <div class="container">
        <h1>Editar Datos del Usuario</h1>
        <form method="POST" action="modificacion_datos">
            <input type="hidden" name="id" value="<?php echo $persona['id']; ?>">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $persona['nombre']; ?>" required>

            <label for="sexo">Sexo:</label>
            <select name="sexo" id="sexo" required>
                <option value="1" <?php if($persona['sexo_id'] == 1) echo 'selected'; ?>>Masculino</option>
                <option value="2" <?php if($persona['sexo_id'] == 2) echo 'selected'; ?>>Femenino</option>
            </select>

            <label for="estadoCivil">Estado Civil:</label>
            <select name="estadoCivil" id="estadoCivil" required>
                <option value="1" <?php if($persona['estadocivil_id'] == 1) echo 'selected'; ?>>Soltero</option>
                <option value="2" <?php if($persona['estadocivil_id'] == 2) echo 'selected'; ?>>Casado</option>
                <option value="3" <?php if($persona['estadocivil_id'] == 3) echo 'selected'; ?>>Divorciado</option>
                <option value="4" <?php if($persona['estadocivil_id'] == 4) echo 'selected'; ?>>Unido</option>
                <option value="5" <?php if($persona['estadocivil_id'] == 5) echo 'selected'; ?>>Viudo</option>
            </select>

            <label for="calle">Calle:</label>
            <input type="text" id="calle" name="calle" value="<?php echo $persona['calle']; ?>" required>

            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" value="<?php echo $persona['ciudad']; ?>" required>

            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" value="<?php echo $persona['pais']; ?>" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $persona['numero_telefonico']; ?>" required>

            <button type="submit">Actualizar Datos</button>
        </form>

        <!-- Botón de regreso -->
        <a href="editar_datos" class="regresar">Regresar a la lista de usuarios</a>
    </div>
</body>
</html>

