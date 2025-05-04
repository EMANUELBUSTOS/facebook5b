function confirmarEliminacion(id) {
    const confirmar = confirm("¿Estás seguro de que deseas eliminar este registro?");
    if (confirmar) {
        // Redirige al controlador que maneja la eliminación
        window.location.href = `/facebook5b/public/eliminar_datos?id=${id}`;
    }
}
