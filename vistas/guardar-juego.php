<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agregar juego | Tienda Juegos</title>

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
                <?php if($juego->nombre_juego == null):?>
                    <h1 class="mt-3 text-center text-md-start">AGREGAR VIDEOJUEGO</h1>
                <?php else:?>
                    <h1 class="mt-3 text-center text-md-start">EDITAR <?php echo $juego->nombre_juego?></h1>
                <?php endif?>
            </header>

            <section>
                <ul>
                    <?php foreach($errores as $error): ?>
                        <li class="text text-danger"> <?php echo $error ?> </li>
                    <?php endforeach ?>
                </ul>
                <form method="POST" enctype="multipart/form-data" action="<?php echo $action?>">
                    <input type="hidden" name="id" value="<?php echo $juego->id_juego?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="d-block input_form" id="nombre" name="nombre" required
                            placeholder="Ingresa el nombre del juego" value="<?php if($juego != null): echo $juego->nombre_juego?><?php endif?>">
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio (USD)</label>
                        <input type="number" class="d-block input_form" id="precio" name="precio" step="0.01" required
                            placeholder="Ingresa el precio del juego" value="<?php if($juego != null): echo $juego->precio?><?php endif?>">
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" accept=".jpg" class="d-block input_form" id="imagen" name="imagen">
                        <p class="mt-1 mb-0">Tamaño imagen recomendada: 1920x1080p</p>
                        <?php if($juego->nombre_juego != null):?>
                            <p>No cargues ninguna imagen si queres que quede la que ya esta puesta</p>
                        <?php endif?>
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Género</label>
                        <select class="d-block input_form" name="genero" id="genero">
                            <?php foreach($generos as $genero): ?>
                                <option value="<?php echo $genero->id_genero?>" <?php if($juego != null && $juego->id_genero == $genero->id_genero): echo "selected"?><?php endif?>>
                                    <?php echo $genero->nombre_genero?>
                                </option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de lanzamiento</label>
                        <input type="date" class="d-block input_form" id="fecha" name="fecha" required
                            placeholder="Ingresa la fecha de lanzamiento del juego" value="<?php if($juego->fecha_lanzamiento != null): echo $juego->fecha_lanzamiento?><?php endif?>">
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" id="play-check" name="play-check" class="checkbox">
                        <label for="play-check">PlayStation</label>
                        
                        <input type="number" class="d-block input_form" name="stockPlay" id="stockPlay" disabled="true"
                            placeholder="Ingresa el stock para la plataforma PlayStation" value="<?php if($juego->nombre_juego != null): echo -1?><?php endif?>">
                        <?php if($juego->nombre_juego != null): ?>
                        <p>Coloca -1 si no queres modificar el stock<br>
                        o agregarlo a esta plataforma (si no es parte)</p>
                        <?php endif?>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" id="xbox-check" name="xbox-check" class="checkbox">
                        <label for="xbox-check">Xbox</label>

                        <input type="number" class="d-block input_form" name="stockXbox" id="stockXbox" disabled="true"
                            placeholder="Ingresa el stock para la plataforma Xbox" value="<?php if($juego->nombre_juego != null): echo -1?><?php endif?>">
                        <?php if($juego->nombre_juego != null): ?>
                        <p>Coloca -1 si no queres modificar el stock<br>
                        o agregarlo a esta plataforma (si no es parte)</p>
                        <?php endif?>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" id="nint-check" name="nint-check" class="checkbox">
                        <label for="nint-check">Nintendo Switch</label>

                        <input type="number" class="d-block input_form" name="stockNint" id="stockNint" disabled="true"
                            placeholder="Ingresa el stock para la plataforma Nintendo" value="<?php if($juego->nombre_juego != null): echo -1?><?php endif?>">
                        <?php if($juego->nombre_juego != null): ?>
                        <p>Coloca -1 si no queres modificar el stock<br>
                        o agregarlo a esta plataforma (si no es parte)</p>
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
    <script src="../scripts/guardar-juego.js"></script>
</body>

</html>