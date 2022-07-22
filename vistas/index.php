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
            <div id="carruselIndex" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php if( count($imagenesCarrusel) > 0 ):?>

                        <?php foreach($imagenesCarrusel as $carrusel): ?>
                            <div class="carousel-item <?php if(array_values($imagenesCarrusel)[0] == $carrusel): echo"active"?><?php endif?>">
                                <img src="<?php echo $carrusel->imagen?>" class="imagen-carrusel">
                                <div class="carousel-caption d-block">
                                    <h5 class="carrusel-titulo align-middle"><?php echo $carrusel->titulo?></h5>
                                    <p class="carrusel-texto d-none d-md-block"><?php echo $carrusel->texto?></p>
                                </div>
                            </div>
                        <?php endforeach?>

                    <?php else:?>
                        <div class="carousel-item active">
                            <a href="controlador_catalogo.php">
                            <img src="imagenes/carrusel/carrusel_predeterminado.jpg" class="d-block w-100">
                            </a>
                        </div>
                    <?php endif?>
                </div>
                <?php if( count($imagenesCarrusel) > 1 ):?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carruselIndex"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon align-items-center d-flex justify-content-center" aria-hidden="true">
                        <i class="fa-solid fa-angle-left d-none d-md-block"></i>
                    </span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carruselIndex"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon align-items-center d-flex justify-content-center" aria-hidden="true">
                        <i class="fa-solid fa-angle-right d-none d-md-block"></i>
                    </span>
                </button>
                <?php endif?>
            </div>
        </header>
        <!--FIN DE CARRUSEL-->

        <div class="container">
            <h2 class="mt-3 text-center text-md-start">JUEGOS DESTACADOS</h2>

            <!--CATALOGO-->
            <div class="row">
            <?php if( count($juegos) > 0 ):?>

            <?php foreach($juegos as $juego): ?>
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card card-height">
                        <img src="<?php echo $juego->imagen?>" class="card-img-top">
                        <img src="<?php echo $juego->logo?>" width="50" heigth="50" class="position-absolute logo-plataforma">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $juego->nombre_juego?> (<?php echo $juego->nombre_plataforma?>)</h5>
                            <p class="card-text mb-0">Género: <?php echo $juego->nombre_genero?></p>
                            <p class="card-text">Precio: $<?php echo number_format($juego->precio, 2, '.', ',') ?>USD</p>
                            <?php if($juego->stock > 0):?>
                                <a href="controlador-agregar-juego-carrito.php?id=<?php echo $juego->id_juego?>&plat=<?php echo $juego->id_plataforma?>" class="btn d-block boton-catalogo">Agregar al carrito</a>
                            <?php else:?>
                                <a class="btn d-block boton-catalogo-deshabilitado">Sin stock</a>
                            <?php endif?>
                        </div>
                    </div>
                </div>
            <?php endforeach?>

            <?php else:?>
                <p class="text-center">No hay juegos destacados</p>
            <?php endif?>
            <!--FIN DE CATALOGO-->

            <div class="d-flex justify-content-center">
                <a href="controlador-catalogo.php" class="btn d-block boton-catalogo boton-ver-catalogo">Ver catálogo completo</a>
            </div>
            
        </div>
    </main>

    <!--FOOTER-->
    <?php require_once('layout/footer.php')?>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
</body>

</html>