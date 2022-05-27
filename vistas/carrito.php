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
                                <img src="../imagenes/juegos/HorizonZeroDawn.jpg" class="card-img-top">
                                <img src="../imagenes/plataformas/logo-play.png" width="35" heigth="35" class="position-absolute logo-plataforma">
                                <div class="card-body">
                                    <h5 class="card-title">Horizon Zero Dawn</h5>
                                    <p class="card-text">Precio: $19.99USD</p>
                                    <a href="#" class="btn d-block boton-catalogo">Quitar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <div class="card carrito-card">
                                <img src="../imagenes/juegos/HorizonForbiddenWest.jpg" class="card-img-top">
                                <img src="../imagenes/plataformas/logo-play.png" width="35" heigth="35" class="position-absolute logo-plataforma">
                                <div class="card-body">
                                    <h5 class="card-title">Horizon Forbidden West</h5>
                                    <p class="card-text">Precio: $69.99USD</p>
                                    <a href="#" class="btn d-block boton-catalogo">Quitar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <div class="card carrito-card">
                                <img src="../imagenes/juegos/GodofWar.jpg" class="card-img-top">
                                <img src="../imagenes/plataformas/logo-play.png" width="35" heigth="35" class="position-absolute logo-plataforma">
                                <div class="card-body">
                                    <h5 class="card-title">God of War</h5>
                                    <p class="card-text">Precio: $19.99USD</p>
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
                            <p class="card-text">Precio total: $109.97USD</p>
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