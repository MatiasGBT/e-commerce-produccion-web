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
                <form action="controlador-login.php" method="post">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Nombre de usuario:</label>
                        <input type="text" class="d-block input_form w-100" id="usuario" name="usuario" placeholder="Ingresa el nombre de usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="clave" class="form-label">Contraseña:</label>
                        <input type="password" class="d-block input_form w-100" id="clave" name="clave" placeholder="Ingresa la contraseña" required>
                    </div>
                    <?php if($error): ?>
                        <div class="alert alert-danger"> <?php echo $error ?> </div>
                    <?php endif; ?>
                    <button type="submit" class="btn d-block input_form w-100">Iniciar sesión</button>
                </form>
                <p class="mb-0 mt-3 text-center">¿No tienes una cuenta? <a href="controlador-registro.php">¡Registrate!</a></p>
            </div>
        </div>
    </main>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
</body>

</html>