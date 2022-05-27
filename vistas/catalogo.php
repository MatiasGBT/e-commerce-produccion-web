<!DOCTYPE html>
<html lang="es">

<head>
    <title>Catálogo | Tienda Juegos</title>

    <!--CSS global-->
    <?php require_once('layout/css.php')?>

    <!--CSS propio-->
    <link href="../estilos/catalogo.css" rel="stylesheet">
</head>

<body>
    <!--BARRA DE NAVEGACIÓN-->
    <?php require_once('layout/navbar.php')?>

    <main>
        <div class="container">
            <h2 class="mt-3 text-center text-md-start">CATÁLOGO DE JUEGOS</h2>
            <div class="row">
                <form class="d-flex mb-3 col-12 col-lg-6" method="POST" action="controlador-catalogo.php">
                    <select class="d-block input_form me-2 w-100" name="ordenador" id="ordenador">
                        <option value="nuevo" <?php if($orden=="nuevo"): echo "selected"?><?php endif?>>Más nuevos primero</option>
                        <option value="viejo" <?php if($orden=="viejo"): echo "selected"?><?php endif?>>Más antiguos primero</option>
                        <option value="menor" <?php if($orden=="menor"): echo "selected"?><?php endif?>>Menor precio</option>
                        <option value="mayor" <?php if($orden=="mayor"): echo "selected"?><?php endif?>>Mayor precio</option>
                        <option value="abcde" <?php if($orden=="abcde"): echo "selected"?><?php endif?>>A-Z</option>
                    </select>
                    <select class="d-block input_form me-2 w-100" name="filtrador" id="filtrador">
                        <option value="all" <?php if($filtro=="all"): echo "selected"?><?php endif?>>Todas las plataformas</option>
                        <option value="play" <?php if($filtro=="play"): echo "selected"?><?php endif?>>PlayStation</option>
                        <option value="xbox" <?php if($filtro=="xbox"): echo "selected"?><?php endif?>>Xbox</option>
                        <option value="nint" <?php if($filtro=="nint"): echo "selected"?><?php endif?>>Nintendo</option>
                    </select>
                    <button class="btn d-block boton-catalogo" type="submit">Filtrar</button>
                </form>

                <form class="d-flex mb-3 col-12 col-lg-6" method="POST" action="controlador-buscar-juego.php">
                    <input class="d-block input_form me-2 w-100" type="search" placeholder="Buscar por nombre" name="nombre" id="nombre" minlength="3">
                    <button class="btn d-block boton-catalogo" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            

            <!--CATALOGO-->
            <div class="row">
            <?php if(count($juegos) > 0):?>

            <?php foreach($juegos as $juego): ?>
                <div class="col-6 col-lg-3 mb-3">
                    <div class="card card-height">
                        <img src="<?php echo $juego->imagen?>" class="card-img-top">
                        <img src="<?php echo $juego->logo?>" width="35" heigth="35" class="position-absolute logo-plataforma">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $juego->nombre_juego?> (<?php echo $juego->nombre_plataforma?>)</h5>
                            <p class="card-text mb-0">Género: <?php echo $juego->nombre_genero?></p>
                            <p class="card-text">Precio: $<?php echo number_format($juego->precio, 2, '.', ',') ?>USD</p>
                            <?php if($juego->stock > 0):?>
                                <a href="juego.html" class="btn d-block boton-catalogo">Agregar al carrito</a>
                            <?php else:?>
                                <a class="btn d-block boton-catalogo-deshabilitado">Sin stock</a>
                            <?php endif?>
                        </div>
                    </div>
                </div>
            <?php endforeach?>

            <?php elseif (count($juegos) == 0 && $mensaje == null):?>
            <p>No se encontraron juegos</p>
            <img src="../imagenes/meme.jpg" alt="" class="d-block mx-auto">

            <?php endif?>
            <?php if($mensaje != null): echo "<p>$mensaje</p>"?><?php endif?>
            <!--FIN DE CATALOGO-->

            <?php if($paginas!=null): ?>
            <nav class="d-flex justify-content-center">
                <ul class="pagination">
                    <?php if($paginas['anterior']): ?>
                        <li class="page-item">
                            <a class="page-link" href="?pag=<?php echo $paginas['primera']?>&ord=<?php echo $orden?>&fil=<?php echo $filtro?>" tabindex="-1"> Primera </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?pag=<?php echo $paginas['anterior']?>&ord=<?php echo $orden?>&fil=<?php echo $filtro?>"> <?php echo $paginas['anterior'] ?> </a>
                        </li>
                        <?php endif ?>
                        <li class="page-item active">
                        <span class="page-link pagina-actual" href="#"><?php if($paginas!=null): echo $paginas['actual']?><?php endif ?></span>
                        </li>
                        <?php if($paginas!=null && $paginas['siguiente']): ?>
                        <li class="page-item">
                            <a class="page-link" href="?pag=<?php echo $paginas['siguiente']?>&ord=<?php echo $orden?>&fil=<?php echo $filtro?>"> <?php echo $paginas['siguiente'] ?> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?pag=<?php echo $paginas['ultima']?>&ord=<?php echo $orden?>&fil=<?php echo $filtro?>"> Última </a>
                        </li>
                    <?php endif ?>
                </ul>
            </nav>
            <?php endif ?>
        </div>
    </main>

    <!--FOOTER-->
    <?php require_once('layout/footer.php')?>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
</body>

</html>