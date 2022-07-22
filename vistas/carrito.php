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
                        <?php if($juegos != null && count($juegos) > 0):?>
                            <?php foreach($juegos as $juego): ?>
                                <div class="col-6 col-lg-4 mb-3">
                                    <div class="card carrito-card">
                                        <img src="<?php echo $juego->imagen?>" class="card-img-top">
                                        <img src="<?php echo $juego->logo?>" width="35" heigth="35" class="position-absolute logo-plataforma">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $juego->nombre_juego?></h5>
                                            <p class="card-text">Precio: $<?php echo number_format($juego->precio, 2, '.', ',')?>USD</p>
                                            <a href="controlador-quitar-juego-carrito.php?id=<?php echo $juego->id_juego?>&plat=<?php echo $juego->id_plataforma?>" class="btn d-block boton-catalogo">Quitar</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach?>
                        <?php else:?>
                            <p><?php echo $textoVacio?></p>
                        <?php endif?>
                    </div>
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $nombreCompra?></h5>
                            <?php if($precioTotal > 0):?>
                                <p class="card-text">Precio total: $<?php echo number_format($precioTotal, 2, '.', ',')?>USD</p>
                                <form action="controlador-carrito.php" method="POST">
                                    <button type="submit" name="submit" class="btn d-block boton-catalogo w-100">Comprar</button>
                                </form>
                            <?php endif?>
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