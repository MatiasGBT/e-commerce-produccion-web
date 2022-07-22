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

function hacerAdmin(p_url_eliminar) {
  Swal.fire({
    title: '¿Seguro/a que desea convertir a este usuario en administrador?',
    text: 'Podrás revertir esta acción',
    icon: 'warning',
    showCancelButton: true,
    cancelButtonColor: '#d1052a',
    confirmButtonColor: '#00aae4',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Convertir'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = p_url_eliminar;
    }
  });
}

function quitarAdmin(p_url_eliminar) {
  Swal.fire({
    title: '¿Seguro/a que desea quitarle los permisos de administrador a este usuario?',
    text: 'Podrás revertir esta acción',
    icon: 'warning',
    showCancelButton: true,
    cancelButtonColor: '#d1052a',
    confirmButtonColor: '#00aae4',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Quitar permisos'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = p_url_eliminar;
    }
  });
}

function restaurarUsuario(p_url_eliminar) {
  Swal.fire({
    title: '¿Seguro/a que desea restaurar a este usuario?',
    text: 'Podrás revertir esta acción',
    icon: 'question',
    showCancelButton: true,
    cancelButtonColor: '#d1052a',
    confirmButtonColor: '#00aae4',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Restaurar'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = p_url_eliminar;
    }
  });
}

function eliminarUsuario(p_url_eliminar) {
  Swal.fire({
    title: '¿Seguro/a que desea eliminar a este usuario?',
    text: 'Podrás revertir esta acción',
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