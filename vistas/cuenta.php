<!DOCTYPE html>
<html lang="es">

<head>
    <title>Cuenta | Tienda Juegos</title>

    <!--CSS global-->
    <?php require_once('layout/css.php')?>

    <!--CSS propio-->
    <link href="../estilos/cuenta.css" rel="stylesheet">
</head>

<body>
    <!--BARRA DE NAVEGACIÓN-->
    <?php require_once('layout/navbar.php')?>

    <main>
        <div class="container">
              <header>
                  <h1 class="mt-3 text-center text-md-start">DETALLES DE LA CUENTA</h1>
              </header>

              <!--CREDENCIALES-->
              <section>
                  <h2>ACTUALIZAR CREDENCIALES</h2>
                  <form>
                      <div class="mb-3">
                          <label for="nombre" class="form-label">Nombre de usuario</label>
                          <input type="text" class="d-block input_form" id="nombre" value="PepeArgento" placeholder="Nuevo nombre de usuario">
                        </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="d-block input_form" id="email" value="pepearg@mail.com" placeholder="Nuevo email">
                      </div>
                      <div class="mb-3">
                        <label for="clave" class="form-label">Contraseña</label>
                        <input type="password" class="d-block input_form" id="clave" value="pepe123" placeholder="Nueva contraseña">
                      </div>
                      <button type="submit" class="btn boton-credenciales">Cambiar credenciales</button>
                    </form>
              </section>
              <!--FIN DE CREDENCIALES-->

              <!--HISTORIAL-->
              <section class="mt-3">
                  <h2>HISTORIAL DE COMPRAS</h2>
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Compra</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Precio</th>
                          <th scope="col">Plataforma/s</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Gears 5</td>
                          <td>15/05/2021</td>
                          <td>$39.99USD</td>
                          <td>Xbox</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Marvel Spider-Man Miles Morales + 3</td>
                          <td>24/12/2021</td>
                          <td>$200USD</td>
                          <td>PlayStation + 2</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Horizon Forbidden West</td>
                          <td>03/03/2022</td>
                          <td>$69.99USD</td>
                          <td>PlayStation</td>
                        </tr>
                      </tbody>
                    </table>
              </section>
              <!--FIN DE HISTORIAL-->

              <nav class="d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="" tabindex="-1"> Primera </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="">1</a>
                    </li>
                    <li class="page-item active">
                    <span class="page-link pagina-actual" href="#">2</span>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href=""> Última </a>
                    </li>
                </ul>
              </nav>
        </div>
    </main>

    <!--FOOTER-->
    <?php require_once('layout/footer.php')?>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
</body>

</html>