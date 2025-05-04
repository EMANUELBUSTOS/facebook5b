document.addEventListener('DOMContentLoaded', function () {
    function validarFormulario(event) {
        var nombre = document.getElementById('nombre').value;
        var fechaNacimiento = document.getElementById('fechaNacimiento').value;
        var sexo = document.getElementById('sexo').value;
        var estadoCivil = document.getElementById('estadoCivil').value;
        var calle = document.getElementById('calle').value;
        var ciudad = document.getElementById('ciudad').value;
        var pais = document.getElementById('pais').value;
        var telefono = document.getElementById('telefono').value;

        if (nombre.trim() === "" || fechaNacimiento === "" || sexo === "" || estadoCivil === "" ||
            calle.trim() === "" || ciudad.trim() === "" || pais.trim() === "" || telefono.trim() === "") {
            alert("Por favor, completa todos los campos.");
            event.preventDefault();
            return false;
        }

        var telefonoRegex = /^[0-9]{10}$/;
        if (!telefonoRegex.test(telefono)) {
            alert("El número de teléfono debe tener 10 dígitos.");
            event.preventDefault();
            return false;
        }

        alert("Datos registrados con éxito.");
        return true;
    }

    document.getElementById('formularioPersona').addEventListener('submit', validarFormulario);
});

