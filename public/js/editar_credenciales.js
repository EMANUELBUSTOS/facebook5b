document.getElementById('show-password').addEventListener('change', function() {
    var passwordField = document.getElementById('password');
    passwordField.type = this.checked ? 'text' : 'password';
});

document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita envío inmediato

    // Crear mensaje flotante
    const successMsg = document.createElement('div');
    successMsg.className = 'floating-alert success';
    successMsg.textContent = '✔️ Credenciales actualizadas correctamente';

    // Agregar al body
    document.body.appendChild(successMsg);

    // Animación: eliminar después de 3 segundos
    setTimeout(() => {
        successMsg.classList.add('fade-out');
    }, 2500); // empieza a desaparecer

    setTimeout(() => {
        successMsg.remove();
        // Finalmente enviar el formulario
        event.target.submit();
    }, 3500); // desaparece y envía
});
