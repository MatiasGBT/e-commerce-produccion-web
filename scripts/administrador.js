function eliminarImagenCarrusel(p_url_eliminar) {
  Swal.fire({
    title: '¿Seguro/a que desea eliminar esta portada del carrusel?',
    text: 'Esta acción no se puede deshacer',
    icon: 'warning',
    showCancelButton: true,
    cancelButtonColor: '#d1052a',
    confirmButtonColor: '#00aae4',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Eliminar'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = p_url_eliminar;
    }
  });
}

function destacarJuego(p_url_eliminar) {
      Swal.fire({
        title: '¿Destacar juego?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#00aae4',
        cancelButtonColor: '#d1052a',
        cancelButtonText: 'No',
        confirmButtonText: 'Sí'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = p_url_eliminar;
        }
      });
}

function quitarDestacadoJuego(p_url_eliminar) {
    Swal.fire({
      title: '¿Quitar el juego de la lista de destacados?',
      icon: 'question',
      showCancelButton: true,
      cancelButtonColor: '#d1052a',
      confirmButtonColor: '#00aae4',
      cancelButtonText: 'No',
      confirmButtonText: 'Sí'
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = p_url_eliminar;
      }
    });
}

function eliminarJuego(p_url_eliminar) {
  Swal.fire({
    title: '¿Seguro/a que desea eliminar el juego?',
    text: 'Esta acción no se puede deshacer',
    icon: 'warning',
    showCancelButton: true,
    cancelButtonColor: '#d1052a',
    confirmButtonColor: '#00aae4',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Eliminar'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = p_url_eliminar;
    }
  });
}