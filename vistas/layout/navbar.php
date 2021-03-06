<?php
    require_once('../_autoload.php');
?>

<nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="controlador-inicio.php">
                <img src="../imagenes/logo.svg" width="50" height="50" class="d-inline-block align-text-center">
                Tienda Juegos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                <span class="fa-solid fa-bars-staggered"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-home" href="controlador-inicio.php"><i class="fa-solid fa-home"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-catalogo" href="controlador-catalogo.php"><i class="fa-solid fa-gamepad"></i> Catálogo</a>
                    </li>
                    <?php if(!Auth::isAdministrador()): ?>
                        <li class="nav-item">
                            <a class="nav-link nav-carrito" href="controlador-carrito.php"><i class="fa-solid fa-shopping-cart"></i> Carrito</a>
                        </li>
                    <?php endif; ?>
                    <?php if(!Auth::isAdministrador() && !Auth::isUsuario()): ?>
                        <li class="nav-item">
                            <a class="nav-link nav-cuenta" href="controlador-login.php"><i class="fa-solid fa-user"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-cuenta" href="controlador-registro.php"><i class="fa-solid fa-user-plus"></i> Registrarse</a>
                        </li>
                    <?php endif; ?>
                    <?php if(Auth::isAdministrador() || Auth::isUsuario()): ?>
                        <li class="nav-item">
                            <a class="nav-link nav-cuenta" href="controlador-cuenta.php"><i class="fa-solid fa-user"></i> Cuenta</a>
                        </li>
                    <?php endif; ?>
                    <?php if(Auth::isAdministrador()): ?>
                        <li class="nav-item">
                            <a class="nav-link nav-administrar" href="controlador-administrador.php"><i class="fa-solid fa-screwdriver-wrench"></i> Administrar</a>
                        </li>
                    <?php endif; ?>
                    <?php if(Auth::isAdministrador() || Auth::isUsuario()): ?>
                        <li class="nav-item">
                            <a class="nav-link nav-logout" href="controlador-logout.php"><i class="fa-solid fa-user-xmark"></i> Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
</nav>