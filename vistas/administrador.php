<!DOCTYPE html>
<html lang="es">

<head>
    <title>Panel de administrador | Tienda Juegos</title>

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
                <h1 class="mt-3 text-center text-md-start">PANEL DE ADMINISTRADOR</h1>
            </header>

            <!--CARRUSEL-->
            <section class="mt-3">
                <h2>EDITAR CARRUSEL PÁGINA PRINCIPAL</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="d-none d-md-table-cell">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Texto</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if( count($juegos) > 0 ):?>
                        <?php foreach($imagenesCarrusel as $carrusel): ?>
                        <tr>
                            <td scope="row" class="py-0 d-none d-md-table-cell"><?php echo $carrusel->id_imagen?></td>
                            <td class="py-0"><?php echo $carrusel->titulo?></td>
                            <td class="py-0"><?php echo $carrusel->texto?></td>
                            <td class="p-0">
                                <div class="row m-0">
                                    <a href="controlador-modificar-carrusel.php?id=<?php echo $carrusel->id_imagen?>" class="boton-crud boton-editar col-6">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" class="boton-crud boton-eliminar col-6" onclick="eliminarImagenCarrusel('controlador-eliminar-carrusel.php?id=<?php echo $carrusel->id_imagen?>')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach?>
                    <?php endif?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <a href="controlador-agregar-carrusel.php" class="btn btn-success">Agregar</a>
                </div>
            </section>
            <!--FIN DE CARRUSEL-->

            <!--CATÁLOGO-->
            <section class="mt-3">
                <h2>EDITAR CATÁLOGO DE JUEGOS</h2>
                <form class="d-flex mb-3 col-12 col-lg-6" method="POST" action="controlador-administrador.php">
                    <input class="d-block input_form me-2 w-100" type="search" placeholder="Buscar por nombre" name="nombre" id="nombre" minlength="3">
                    <button class="btn d-block boton-catalogo" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="d-none d-md-table-cell">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col" class="d-none d-md-table-cell">Precio</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if( count($juegos) > 0 ):?>
                        <?php foreach($juegos as $juego): ?>
                        <tr>
                            <td scope="row" class="py-0 d-none d-md-table-cell"><?php echo $juego->id_juego?></td>
                            <td class="py-0"><?php echo $juego->nombre_juego?></td>
                            <td class="py-0 d-none d-md-table-cell">$<?php echo $juego->precio?>USD</td>
                            <td class="p-0">
                                <div class="row m-0">
                                    <?php if($juego->destacado == 0):?>
                                    <a href="#" class="boton-crud boton-destacar col-4" onclick="destacarJuego('controlador-destacar-juego.php?id=<?php echo $juego->id_juego?>')">
                                        <i class="fa-solid fa-star"></i>
                                    </a>
                                    <?php else:?>
                                    <a href="#" class="boton-crud boton-quitar-destacado col-4" onclick="quitarDestacadoJuego('controlador-quitar-destacado-juego.php?id=<?php echo $juego->id_juego?>')">
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                    </a>
                                    <?php endif?>
                                    <a href="controlador-modificar-juego.php?id=<?php echo $juego->id_juego?>" class="boton-crud boton-editar col-4">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" class="boton-crud boton-eliminar col-4" onclick="eliminarJuego('controlador-eliminar-juego.php?id=<?php echo $juego->id_juego?>')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach?>
                    <?php endif?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <a href="controlador-agregar-juego.php" class="btn btn-success">Agregar</a>
                </div>
            </section>
            <!--FIN DE CATÁLOGO-->

            <?php if($paginas != null): ?>
            <nav class="d-flex justify-content-center">
                <ul class="pagination">
                    <?php if($paginas['anterior']): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginas['primera'] ?>" tabindex="-1"> Primera </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginas['anterior'] ?>"> <?php echo $paginas['anterior'] ?> </a>
                    </li>
                    <?php endif ?>
                    <li class="page-item active">
                    <span class="page-link pagina-actual" href="#"><?php echo $paginas['actual'] ?></span>
                    </li>
                    <?php if($paginas['siguiente']): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginas['siguiente'] ?>"> <?php echo $paginas['siguiente'] ?> </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginas['ultima'] ?>"> Última </a>
                    </li>
                    <?php endif ?>
                </ul>
            </nav>
            <?php endif ?>

            <!--USUARIOS-->
            <section class="mt-3">
                <h2>GESTIONAR USUARIOS</h2>
                <p>Busca un usuario para gestionarlo</p>
                <form class="d-flex mb-3 col-12 col-lg-6" method="POST" action="controlador-administrador.php">
                    <input class="d-block input_form me-2 w-100" type="search" placeholder="Buscar por nombre" name="username" id="username" required>
                    <button class="btn d-block boton-catalogo" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <?php if( $usuario ):?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="d-none d-md-table-cell">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gestionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row" class="py-0 d-none d-md-table-cell"><?php echo $usuario->id_usuario?></td>
                            <td class="py-0"><?php echo $usuario->nombre?></td>
                            <td class="py-0"><?php echo $usuario->email?></td>
                            <td class="p-0">
                                <div class="row m-0">
                                    <?php if($usuario->id_rol == 2):?>
                                        <a href="#" class="boton-crud boton-destacar col-6" onclick="hacerAdmin('controlador-hacer-admin.php?id=<?php echo $usuario->id_usuario?>')">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </a>
                                    <?php else:?>
                                        <a href="#" class="boton-crud boton-quitar-destacado col-6" onclick="quitarAdmin('controlador-quitar-admin.php?id=<?php echo $usuario->id_usuario?>')">
                                            <i class="fa-solid fa-user"></i>
                                        </a>
                                    <?php endif?>
                                    <?php if($usuario->fecha_baja != null):?>
                                        <a href="#" onclick="restaurarUsuario('controlador-restaurar-usuario.php?id=<?php echo $usuario->id_usuario?>')" class="boton-crud boton-restaurar col-6">
                                            <i class="fa-solid fa-reply"></i>
                                        </a>
                                    <?php else:?>
                                        <a href="#" class="boton-crud boton-eliminar col-6" onclick="eliminarUsuario('controlador-eliminar-usuario.php?id=<?php echo $usuario->id_usuario?>')">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    <?php endif?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php endif?>
                <?php if($errorUsuario != null):?>
                    <p><?php echo $errorUsuario?></p>
                <?php endif?>
            </section>
            <!--FIN DE USUARIOS-->
        </div>
    </main>

    <!--FOOTER-->
    <?php require_once('layout/footer.php')?>

    <!--SCRIPTS-->
    
    <?php require_once('layout/js.php')?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../scripts/administrador.js"></script>
</body>

</html>