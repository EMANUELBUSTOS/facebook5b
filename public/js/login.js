function validarFormulario() {
    const usuario = document.getElementById('username').value;
    const contrasena = document.getElementById('password').value;

    if (usuario.trim() === '' || contrasena.trim() === '') {
        alert('Por favor, completa todos los campos');
        return false;
    }
    return true;
}
