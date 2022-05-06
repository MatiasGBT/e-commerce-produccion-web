<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar | Tienda Juegos</title>

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
                <h1 class="mt-3 text-center text-md-start">HORIZON ZERO DAWN</h1>
            </header>

            <!--JUEGO-->
            <section>
                <h2>DETALLES DEL JUEGO</h2>
                <form enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del juego</label>
                        <input type="text" class="d-block input_form" id="nombre" value="Horizon Zero Dawn"
                            placeholder="Nuevo nombre del juego">
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio (USD)</label>
                        <input type="number" class="d-block input_form" id="precio" value="40"
                            placeholder="Nuevo precio">
                    </div>
                    <div class="mb-3">
                        <label for="categoria1" class="form-label">Categoría 1</label>
                        <br>
                        <select name="select" class="d-block input_form">
                            <option value="acc" selected>Acción</option>
                            <option value="ave">Aventura</option>
                            <option value="has">Hack and Slash</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="categoria1" class="form-label">Categoría 2</label>
                        <br>
                        <select name="select" class="d-block input_form">
                            <option value="acc">Acción</option>
                            <option value="ave" selected>Aventura</option>
                            <option value="has">Hack and Slash</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" accept=".jpg" class="d-block input_form" id="imagen">
                        <p class="mt-1">Tamaño imagen recomendada: 1920x1080p (16:9)</p>
                    </div>
                    <button type="submit" class="btn boton-credenciales">Actualizar juego</button>
                </form>
            </section>
            <!--FIN DE JUEGO-->

        </div>
    </main>

    <!--FOOTER-->
    <?php require_once('layout/footer.php')?>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
</body>

</html>