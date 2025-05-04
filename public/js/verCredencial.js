function confirmarEliminacion(id) {
    const confirmar = confirm("¿Estás seguro de que deseas eliminar este registro?");
    if (confirmar) {
        window.location.href = `/facebook5b/public/eliminar_datosU?id=${id}`;
    }
}