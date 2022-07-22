<?php
    require_once('../_autoload.php');
?>

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
                  <button type="button" id="btn-quiero-cambiar" onclick="cambiarCredenciales()" class="btn boton-credenciales mb-3">Quiero cambiar mis credenciales</button>
                  <?php if(count($errores) > 0): ?>
                    <ul>
                      <?php foreach($errores as $error): ?>
                          <li class="text text-danger"> <?php echo $error ?> </li>
                      <?php endforeach ?>
                    </ul>
                  <?php endif; ?>
                  <form action="controlador-cuenta.php" method="POST">
                      <div class="mb-3">
                          <label for="nombre" class="form-label">Nombre de usuario</label>
                          <input type="text" class="d-block input_form" id="nombre" name="nombre" disabled
                            value="<?php echo $nombre?>" placeholder="Nuevo nombre de usuario">
                        </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="d-block input_form" id="email" name="email" disabled
                          value="<?php echo $email?>" placeholder="Nuevo email">
                      </div>
                      <div class="mb-3">
                        <label for="clave" class="form-label">Contraseña</label>
                        <input type="password" class="d-block input_form" id="clave" name="clave" disabled
                          placeholder="Nueva contraseña">
                        <p>Deja vacío este campo si no deseas cambiar la contraseña actual</p>
                      </div>
                      <button type="submit" id="btn-submit" name="submit" class="btn boton-credenciales" disabled>Cambiar credenciales</button>
                    </form>
              </section>
              <!--FIN DE CREDENCIALES-->

              <!--HISTORIAL-->
              <?php if(!Auth::isAdministrador()): ?>
                <section class="mt-3">
                    <h2>HISTORIAL DE COMPRAS</h2>
                    <?php if(count($compras) > 0): ?>
                      <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Compra</th>
                              <th scope="col">Fecha</th>
                              <th class="py-0 d-none d-md-table-cell" scope="col">Total</th>
                              <th scope="col">Detalles</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php foreach($compras as $compra): ?>
                                <tr>
                                  <td class="py-0"><?php echo $compra->nombre_compra?></td>
                                  <td class="py-0"><?php echo $compra->fecha_compra?></td>
                                  <td class="py-0 d-none d-md-table-cell">$<?php echo number_format($compra->total, 2, '.', ',') ?>USD</td>
                                  <td class="p-0">
                                    <a href="controlador-ver-compra.php?id=<?php echo $compra->id_compra?>" class="boton boton-ver">
                                      <i class="fa-solid fa-eye"></i>
                                    </a>
                                  </td>
                                </tr>
                              <?php endforeach?>
                          </tbody>
                        </table>
                      <?php else:?>
                        <p>No has realizado ninguna compra</p>
                      <?php endif;?>
                </section>
              <?php endif;?>
              <!--FIN DE HISTORIAL-->

              <?php if($paginas != null and count($compras) > 0): ?>
                <nav class="d-flex justify-content-center">
                  <ul class="pagination">
                      <?php if($paginas['anterior']): ?>
                      <li class="page-item">
                          <a class="page-link" href="?pag=<?php echo $paginas['primera'] ?>" tabindex="-1"> Primera </a>
                      </li>
                      <li class="page-item">
                          <a class="page-link" href="?pag=<?php echo $paginas['anterior'] ?>"> <?php echo $paginas['anterior'] ?> </a>
                      </li>
                      <?php endif ?>
                      <li class="page-item active">
                      <span class="page-link pagina-actual" href="#"><?php echo $paginas['actual'] ?></span>
                      </li>
                      <?php if($paginas['siguiente']): ?>
                      <li class="page-item">
                          <a class="page-link" href="?pag=<?php echo $paginas['siguiente'] ?>"> <?php echo $paginas['siguiente'] ?> </a>
                      </li>
                      <li class="page-item">
                          <a class="page-link" href="?pag=<?php echo $paginas['ultima'] ?>"> Última </a>
                      </li>
                      <?php endif ?>
                  </ul>
                </nav>
              <?php endif;?>

              <!--DANGER ZONE-->
              <div class="alert alert-danger <?php if(Auth::isAdministrador()): echo "mt-3"?><?php endif;?>">
                <h2>Zona peligrosa</h2>
                <button type="button" class="btn boton-credenciales" onclick="eliminarCuenta('controlador-eliminar-cuenta.php?id=<?php echo $id?>')">
                  Eliminar cuenta
                </button>
            </div>
            <!--FIN DE DANGER ZONE-->
        </div>
    </main>

    <!--FOOTER-->
    <?php require_once('layout/footer.php')?>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../scripts/cuenta.js"></script>
</body>

</html>