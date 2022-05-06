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
                <form>
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Nombre de usuario:</label>
                        <input type="text" class="d-block input_form w-100" id="usuario" placeholder="Ingresa el nombre de usuario">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="d-block input_form w-100" id="email" placeholder="Ingresa el email">
                    </div>
                    <div class="mb-3">
                        <label for="clave" class="form-label">Contraseña:</label>
                        <input type="password" class="d-block input_form w-100" id="clave" placeholder="Ingresa la contraseña">
                    </div>
                    <div class="mb-3">
                        <label for="claveConf" class="form-label">Confirmar contraseña:</label>
                        <input type="password" class="d-block input_form w-100" id="claveConf" placeholder="Ingresa la contraseña nuevamente">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="check">
                        <label class="form-check-label" for="exampleCheck1">He leído y acepto el contrato de licencia</label>
                      </div>
                    <button type="submit" class="btn d-block input_form w-100">Registrarse</button>
                </form>
            </div>
        </div>
    </main>

    <!--SCRIPTS-->
    <?php require_once('layout/js.php')?>
</body>

</html>