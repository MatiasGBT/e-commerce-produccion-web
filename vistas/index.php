<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio | Tienda Juegos</title>

    <!--CSS global-->
    <?php require_once('layout/css.php')?>

    <!--CSS propio-->
    <link href="../estilos/index.css" rel="stylesheet">
</head>

<body>
    <!--BARRA DE NAVEGACIÓN-->
    <?php require_once('layout/navbar.php')?>

    <main>
        <!--CARRUSEL-->
        <header>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../imagenes/carrusel/img1.jpg" class="d-block w-100">
                        <div class="carousel-caption d-block">
                            <h5 class="carrusel-titulo align-middle">Horizon Forbidden West</h5>
                            <p class="carrusel-texto d-none d-md-block">Las aventuras de Aloy continúan</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../imagenes/carrusel/img2.jpg" class="d-block w-100">
                        <div class="carousel-caption d-block">
                            <h5 class="carrusel-titulo">God of War</h5>
                            <p class="carrusel-texto d-none d-md-block">Vuelve el Dios de la Guerra</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../imagenes/carrusel/img3.jpg" class="d-block w-100">
                        <div class="carousel-caption d-block">
                            <h5 class="carrusel-titulo">Horizon Zero Dawn</h5>
                            <p class="carrusel-texto d-none d-md-block">Descubre el pasado de Aloy</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon align-items-center d-flex justify-content-center" aria-hidden="true">
                        <i class="fa-solid fa-angle-left d-none d-md-block"></i>
                    </span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon align-items-center d-flex justify-content-center" aria-hidden="true">
                        <i class="fa-solid fa-angle-right d-none d-md-block"></i>
                    </span>
                </button>
            </div>
        </header>
        <!--FIN DE CARRUSEL-->

        <div class="container">
            <h2 class="mt-3 text-center text-md-start">CATÁLOGO DE JUEGOS</h2>

            <!--CATALOGO-->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card card-height">
                        <img src="../imagenes/juegos/Juego1.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Horizon Zero Dawn</h5>
                            <p class="card-text mb-0">Categorías: Acción, Aventura</p>
                            <p class="card-text">Precio: $40USD</p>
                            <a href="juego.html" class="btn d-block boton-catalogo">Agregar al carrito</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card card-height">
                        <img src="../imagenes/juegos/Juego2.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Horizon Forbidden West</h5>
                            <p class="card-text mb-0">Categorías: Acción, Aventura</p>
                            <p class="card-text">Precio: $60USD</p>
                            <a href="juego.html" class="btn d-block boton-catalogo">Agregar al carrito</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card card-height">
                        <img src="../imagenes/juegos/Juego3.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">God of War</h5>
                            <p class="card-text mb-0">Categorías: Acción, Hack and Slash</p>
                            <p class="card-text">Precio: $40USD</p>
                            <a href="juego.html" class="btn d-block boton-catalogo">Agregar al carrito</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card card-height">
                        <img src="../imagenes/juegos/Juego3.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Juego 4</h5>
                            <p class="card-text mb-0">Categorías: Acción, Hack and Slash</p>
                            <p class="card-text">Precio: $40USD</p>
                            <a href="juego.html" class="btn d-block boton-catalogo">Agregar al carrito</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card card-height">
                        <img src="../imagenes/juegos/Juego2.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Juego 5</h5>
                            <p class="card-text mb-0">Categorías: Acción, Aventura</p>
                            <p class="card-text">Precio: $60USD</p>
                            <a href="juego.html" class="btn d-block boton-catalogo">Agregar al carrito</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card card-height">
                        <img src="../imagenes/juegos/Juego1.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Juego 6</h5>
                            <p class="card-text mb-0">Categorías: Acción, Aventura</p>
                            <p class="card-text">Precio: $40USD</p>
                            <a href="juego.html" class="btn d-block boton-catalogo">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--FIN DE CATALOGO-->

        </div>
    </main>

    <!--FOOTER-->
    <?php require_once('layout/footer.php')?>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
</body>

</html>