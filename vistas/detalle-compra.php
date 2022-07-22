<!DOCTYPE html>
<html lang="es">

<head>
    <title>Carrito | Tienda Juegos</title>

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
                <h1 class="mt-3 text-center text-md-start"><?php echo $compra->nombre_compra?></h1>
            </header>

            <div class="container">
                <div class="row">
                    <div class="list-group col-12 col-md-6 mb-3 mb-md-0">
                        <div class="list-group-item list-group-item-action active" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Juego/s</h5>
                            </div>
                        </div>
                        <?php if($juegos != null and count($juegos) > 0): ?>
                            <?php foreach($juegos as $juego): ?>
                                <div class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $juego->nombre_juego?></h5>
                                        <small class="text-muted">$<?php echo number_format($juego->precio, 2, '.', ',')?>USD</small>
                                    </div>
                                    <small class="text-muted"><?php echo $juego->nombre_plataforma?></small>
                                </div>
                            <?php endforeach?>
                        <?php endif;?>
                    </div>

                    <div class="list-group col-12 col-md-6">
                        <div class="list-group-item list-group-item-action active" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Datos de la compra</h5>
                            </div>
                        </div>
                        <?php if($compra != null): ?>
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Fecha</h5>
                                </div>
                                <small class="text-muted"><?php echo $compra->fecha_compra?></small>
                            </div>
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Total</h5>
                                </div>
                                <small class="text-muted">$<?php echo number_format($compra->total, 2, '.', ',')?>USD</small>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--FOOTER-->
    <?php require_once('layout/footer.php')?>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
</body>

</html>