<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/Juego.php');
require_once('../modelos/ImagenesCarrusel.php');
require_once('../helpers/helper_paginador.php');

try{
    $cnx = new Cnx();
}catch(PDOException $e){
    echo 'No se ha podido conectar a la Base de Datos';
    exit;
}

$imagenesCarrusel = ImagenesCarrusel::listarTodos($cnx);

$nombre = $_POST['nombre'] ?? null;
if ($nombre == null) {
    $pag = $_GET['pag'] ?? 1;
    $registros_por_pagina = 8;
    
    $juegos = Juego::paginateWithoutPlataforma($cnx, $pag, $registros_por_pagina);
    
    $cantidad_registros = Juego::countWithoutPlataforma($cnx);
    
    $paginas = paginador($pag, $cantidad_registros, $registros_por_pagina);
} else {
    $juegos = Juego::findByNameWithoutPlataforma($cnx, $nombre);
    $paginas = null;
}

require_once('../vistas/administrador.php');

unset($cnx);