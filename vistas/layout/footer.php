<?php
    require_once('../_autoload.php');
?>

<div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top">
            <p class="col-md-4 mb-0 black">&copy; 2022 Tienda Juegos | Contacto: mailfalso@mail.com</p>

            <a href="controlador-inicio.php"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <img src="../imagenes/logo.png" height="50" width="50"></img>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item">
                    <a href="controlador-inicio.php" class="nav-link px-2 black"><i class="fa-solid fa-home"></i> Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="controlador-catalogo.php" class="nav-link px-2 black"><i class="fa-solid fa-gamepad"></i> Catálogo</a>
                </li>
                <?php if(!Auth::isAdministrador()): ?>
                    <li class="nav-item">
                        <a href="controlador-carrito.php" class="nav-link px-2 black"><i class="fa-solid fa-shopping-cart"></i>
                            Carrito</a>
                    </li>
                <?php endif; ?>
                <?php if(!Auth::isAdministrador() && !Auth::isUsuario()): ?>
                    <li class="nav-item">
                        <a href="controlador-cuenta.php" class="nav-link px-2 black"><i class="fa-solid fa-user"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="controlador-cuenta.php" class="nav-link px-2 black"><i class="fa-solid fa-user-plus"></i> Registrarse</a>
                    </li>
                <?php endif; ?>
                <?php if(Auth::isAdministrador() || Auth::isUsuario()): ?>
                    <li class="nav-item">
                        <a href="controlador-cuenta.php" class="nav-link px-2 black"><i class="fa-solid fa-user"></i> Cuenta</a>
                    </li>
                <?php endif; ?>
                <?php if(Auth::isAdministrador()): ?>
                    <li class="nav-item">
                        <a href="controlador-administrador.php" class="nav-link px-2 black"><i class="fa-solid fa-screwdriver-wrench"></i> Admin</a>
                    </li>
                <?php endif; ?>
                <?php if(Auth::isAdministrador() || Auth::isUsuario()): ?>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link px-2 black"><i class="fa-solid fa-user-xmark"></i> Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </footer>
</div>