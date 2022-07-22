<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrarse | Tienda Juegos</title>
    
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
                <h1 class="text-center">Registrarse</h1>
                <form action="controlador-registro.php" method="post">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Nombre de usuario:</label>
                        <input type="text" class="d-block input_form w-100" id="usuario" name="usuario" placeholder="Ingresa el nombre de usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="d-block input_form w-100" id="email" name="email" placeholder="Ingresa el email" required>
                    </div>
                    <div class="mb-3">
                        <label for="clave" class="form-label">Contraseña:</label>
                        <input type="password" class="d-block input_form w-100" id="clave" name="clave" placeholder="Ingresa la contraseña" required>
                    </div>
                    <div class="mb-3">
                        <label for="claveConf" class="form-label">Confirmar contraseña:</label>
                        <input type="password" class="d-block input_form w-100" id="claveConf" name="claveConf" placeholder="Ingresa la contraseña nuevamente" required>
                    </div>
                    <?php if(!$errores): ?>
                        <div class="mb-3">
                            <p class="text-center">Al registrarte aceptas el contrato de licencia</p>
                        </div>
                    <?php endif; ?>
                    <ul>
                        <?php foreach($errores as $error): ?>
                            <li class="text text-danger"> <?php echo $error ?> </li>
                        <?php endforeach ?>
                    </ul>
                    <button type="submit" class="btn d-block input_form w-100">Registrarse</button>
                    <p class="mb-0 mt-3 text-center">¿Ya tienes una cuenta? <a href="controlador-login.php">Login</a></p>
                </form>
            </div>
        </div>
    </main>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
</body>

</html>