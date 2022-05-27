<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/Juego.php');
require_once('../helpers/helper_input.php');
require_once('../helpers/helper_paginador.php');

try{
    $cnx = new Cnx();
}catch(PDOException $e){
    echo 'No se ha podido conectar a la Base de Datos';
    exit;
}

$pag = $_GET['pag'] ?? 1;
$registros_por_pagina = 8;

$orden = $_GET['ord'] ?? null;
if ($orden == null) {
    $orden = test_input( $_POST["ordenador"] ?? null);
}
if ($orden == null || $orden == "nuevo") {
    $orden = "nuevo";
    $parametroOrden = 'ORDER BY j.fecha_lanzamiento DESC';
}
else if ($orden == "viejo") {
    $parametroOrden = 'ORDER BY j.fecha_lanzamiento ASC';
}
else if ($orden == "menor") {
    $parametroOrden = 'ORDER BY j.precio ASC, j.nombre_juego';
}
else if ($orden == "mayor") {
    $parametroOrden = 'ORDER BY j.precio DESC, j.nombre_juego';
}
else if ($orden == "abcde") {
    $parametroOrden = 'ORDER BY j.nombre_juego';
}

$filtro = $_GET['fil'] ?? null;
if ($filtro == null) {
    $filtro = test_input( $_POST["filtrador"] ?? null );
}
if ($filtro == null || $filtro == "all") {
    $filtro = "all";
    $parametroFiltro = "todos";
}
else if ($filtro == "play") {
    $parametroFiltro = "PlayStation";
}
else if ($filtro == "xbox") {
    $parametroFiltro = "Xbox";
}
else if ($filtro == "nint") {
    $parametroFiltro = 'Nintendo Switch';
}

$juegos = Juego::paginateWithPlataforma($cnx, $parametroOrden, $parametroFiltro, $pag, $registros_por_pagina);

$cantidad_registros = Juego::countWithPlataforma($cnx, $parametroFiltro);

$paginas = paginador($pag, $cantidad_registros, $registros_por_pagina);

$mensaje = null;

require_once('../vistas/catalogo.php');

unset($cnx);