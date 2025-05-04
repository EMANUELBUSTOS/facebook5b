document.addEventListener('DOMContentLoaded', function () {
    const registerForm = document.getElementById('registerForm');
    const errorMessageDiv = document.getElementById('error-message');

    // Validación de contraseñas
    registerForm.addEventListener('submit', function (event) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;

        if (password !== confirmPassword) {
            event.preventDefault();
            errorMessageDiv.textContent = 'Las contraseñas no coinciden.';
        } else {
            errorMessageDiv.textContent = '';
        }
    });

    // Mostrar alerta de éxito si viene el parámetro success=true
    const params = new URLSearchParams(window.location.search);
    if (params.get('success') === 'true') {
        alert('¡Registro exitoso!');
        // Limpia el parámetro de la URL sin recargar la página
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});
