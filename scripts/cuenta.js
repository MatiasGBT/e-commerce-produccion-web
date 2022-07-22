function cambiarCredenciales() {
    Swal.fire({
      title: '¿Seguro/a que desea cambiar las credenciales?',
      text : 'Tendrás que volver a iniciar sesión en el sistema',
      icon: 'question',
      showCancelButton: true,
      cancelButtonColor: '#d1052a',
      confirmButtonColor: '#00aae4',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Confirmar'
    }).then((result) => {
      if (result.isConfirmed) {
        var nombre = document.querySelector("#nombre");
        var email = document.querySelector("#email");
        var contrasena = document.querySelector("#clave");
        var submit = document.querySelector("#btn-submit");
        var quieroCambiar = document.querySelector("#btn-quiero-cambiar");
        nombre.disabled = false;
        email.disabled = false;
        contrasena.disabled = false;
        submit.disabled = false;
        quieroCambiar.disabled = true;
      }
    });
  }

  function eliminarCuenta(p_url_eliminar) {
    Swal.fire({
      title: '¿Seguro/a que desea eliminar su cuenta?',
      text : 'Podrás contactarte con un usuario administrador para recuperarla',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#d1052a',
      confirmButtonColor: '#00aae4',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Confirmar'
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = p_url_eliminar;
      }
    });
  }