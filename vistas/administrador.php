<!DOCTYPE html>
<html lang="es">

<head>
    <title>Panel de administrador | Tienda Juegos</title>

    <!--CSS global-->
    <?php require_once('layout/css.php')?>

    <!--CSS propio-->
    <link href="../estilos/administrador.css" rel="stylesheet">
</head>

<body>
    <!--BARRA DE NAVEGACIÓN-->
    <?php require_once('layout/navbar.php')?>

    <main>
        <div class="container">
            <header>
                <h1 class="mt-3 text-center text-md-start">PANEL DE ADMINISTRADOR</h1>
            </header>

            <!--CARRUSEL-->
            <section class="mt-3">
                <h2>EDITAR CARRUSEL PÁGINA PRINCIPAL</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Texto</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Horizon Forbidden West</td>
                            <td>Las aventuras de Aloy continúan</td>
                            <td>
                                <div class="row">
                                    <a href="editar.php" class="boton-crud boton-editar"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="eliminar.php" class="boton-crud boton-eliminar"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>God of War</td>
                            <td>Vuelve el Dios de la Guerra</td>
                            <td>
                                <div class="row">
                                    <a href="editar.php" class="boton-crud boton-editar"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="eliminar.php" class="boton-crud boton-eliminar"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Horizon Zero Dawn</td>
                            <td>Descubre el pasado de Aloy</td>
                            <td>
                                <div class="row">
                                    <a href="editar.php" class="boton-crud boton-editar"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="eliminar.php" class="boton-crud boton-eliminar"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <a href="agregar.php" class="btn btn-success">Agregar</a>
                </div>
            </section>
            <!--FIN DE CARRUSEL-->

            <!--CATÁLOGO-->
            <section class="mt-3">
                <h2>EDITAR CATÁLOGO DE JUEGOS</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Compra</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Horizon Zero Dawn</td>
                            <td>$40USD</td>
                            <td>
                                <div class="row">
                                    <a href="editar.php" class="boton-crud boton-editar"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="eliminar.php" class="boton-crud boton-eliminar"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Horizon Forbidden West</td>
                            <td>$60USD</td>
                            <td>
                                <div class="row">
                                    <a href="editar.php" class="boton-crud boton-editar"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="eliminar.php" class="boton-crud boton-eliminar"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>God of War</td>
                            <td>$40USD</td>
                            <td>
                                <div class="row">
                                    <a href="editar.php" class="boton-crud boton-editar"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="eliminar.php" class="boton-crud boton-eliminar"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Juego 4</td>
                            <td>$40USD</td>
                            <td>
                                <div class="row">
                                    <a href="editar.php" class="boton-crud boton-editar"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="eliminar.php" class="boton-crud boton-eliminar"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Juego 5</td>
                            <td>$60USD</td>
                            <td>
                                <div class="row">
                                    <a href="editar.php" class="boton-crud boton-editar"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="eliminar.php" class="boton-crud boton-eliminar"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Juego 6</td>
                            <td>$40USD</td>
                            <td>
                                <div class="row">
                                    <a href="editar.php" class="boton-crud boton-editar"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="eliminar.php" class="boton-crud boton-eliminar"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <a href="agregar.php" class="btn btn-success">Agregar</a>
                </div>
            </section>
            <!--FIN DE CATÁLOGO-->

        </div>
    </main>

    <!--FOOTER-->
    <?php require_once('layout/footer.php')?>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
</body>

</html>