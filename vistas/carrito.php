<!DOCTYPE html>
<html lang="es">

<head>
    <title>Carrito | Tienda Juegos</title>

    <!--CSS global-->
    <?php require_once('layout/css.php')?>

    <!--CSS propio-->
    <link href="../estilos/carrito.css" rel="stylesheet">
</head>

<body>
    <!--BARRA DE NAVEGACIÓN-->
    <?php require_once('layout/navbar.php')?>

    <main>
        <div class="container">
            <header>
                <h1 class="mt-3 text-center text-md-start">CARRITO DE COMPRAS</h1>
            </header>

            <!--CARRITO-->
            <div class="row">
                <div class="col-12 col-md-8 mb-3">
                    <div class="row">

                        <div class="col-6 col-lg-4 mb-3">
                            <div class="card carrito-card">
                                <img src="../imagenes/juegos/Juego1.jpg" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">Horizon Zero Dawn</h5>
                                    <p class="card-text">Precio: $40USD</p>
                                    <a href="#" class="btn d-block boton-catalogo">Quitar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <div class="card carrito-card">
                                <img src="../imagenes/juegos/Juego2.jpg" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">Horizon Forbidden West</h5>
                                    <p class="card-text">Precio: $60USD</p>
                                    <a href="#" class="btn d-block boton-catalogo">Quitar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <div class="card carrito-card">
                                <img src="../imagenes/juegos/Juego3.jpg" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">God of War</h5>
                                    <p class="card-text">Precio: $40USD</p>
                                    <a href="#" class="btn d-block boton-catalogo">Quitar</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Horizon Zero Dawn + 2</h5>
                            <p class="card-text">Precio total: $140USD</p>
                            <a href="#" class="btn d-block boton-catalogo">Comprar</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--FIN DE CARRITO-->

        </div>
    </main>

    <!--FOOTER-->
    <?php require_once('layout/footer.php')?>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
</body>

</html>