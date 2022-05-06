<!DOCTYPE html>
<html lang="es">

<head>
    <title>Login | Tienda Juegos</title>

    <!--CSS global-->
    <?php require_once('layout/css.php')?>

    <!--CSS propio-->
    <link href="../estilos/login.css" rel="stylesheet">
</head>

<body>
    <main>
        <div id="img_fondo"></div>
        <div class="container d-flex justify-content-center align-items-center" id="login_container">
            <div class="box">
                <h1 class="text-center">Login</h1>
                <form>
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Nombre de usuario:</label>
                        <input type="text" class="d-block input_form w-100" id="usuario" placeholder="Ingresa el nombre de usuario">
                    </div>
                    <div class="mb-3">
                        <label for="clave" class="form-label">Contraseña:</label>
                        <input type="password" class="d-block input_form w-100" id="clave" placeholder="Ingresa la contraseña">
                    </div>
                    <button type="submit" class="btn d-block input_form w-100">Iniciar sesión</button>
                </form>
                <p class="mb-0 mt-3">¿No tienes una cuenta? <a href="registro.php">¡Registrate!</a></p>
            </div>
        </div>
    </main>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
</body>

</html>