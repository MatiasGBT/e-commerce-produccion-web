<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agregar carrusel | Tienda Juegos</title>

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
                <?php if($carrusel->titulo == null):?>
                    <h1 class="mt-3 text-center text-md-start">AGREGAR IMAGEN CARRUSEL</h1>
                <?php else:?>
                    <h1 class="mt-3 text-center text-md-start">EDITAR <?php echo $carrusel->titulo?></h1>
                <?php endif?>
            </header>

            <section>
                <ul>
                    <?php foreach($errores as $error): ?>
                        <li class="text text-danger"> <?php echo $error ?> </li>
                    <?php endforeach ?>
                </ul>
                <form method="POST" enctype="multipart/form-data" action="<?php echo $action?>">
                    <input type="hidden" name="id" value="<?php echo $carrusel->id_imagen?>">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="d-block input_form" id="titulo" name="titulo" required
                            placeholder="Ingresa el titulo del carrusel" value="<?php if($carrusel != null): echo $carrusel->titulo?><?php endif?>">
                    </div>
                    <div class="mb-3">
                        <label for="texto" class="form-label">Texto</label>
                        <input type="text" class="d-block input_form" id="texto" name="texto" required
                            placeholder="Ingresa el titulo del carrusel" value="<?php if($carrusel != null): echo $carrusel->texto?><?php endif?>">
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" accept=".jpg" class="d-block input_form" id="imagen" name="imagen" required>
                        <p class="mt-1 mb-0">Tamaño imagen recomendada: 1024x417p</p>
                        <?php if($carrusel->titulo != null):?>
                            <p class="">No cargues ninguna imagen si queres que quede la que ya esta puesta</p>
                        <?php endif?>
                    </div>
                    <button type="submit" name="submit" class="btn boton-credenciales">Guardar</button>
                </form>
            </section>

        </div>
    </main>

    <!--FOOTER-->
    <?php require_once('layout/footer.php')?>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
</body>

</html>