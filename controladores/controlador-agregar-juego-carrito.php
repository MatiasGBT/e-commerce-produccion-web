<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/Juego.php');
require_once('../helpers/helper_input.php');
require_once('../_autoload.php');

try{
    $cnx = new Cnx();
}catch(PDOException $e){
    echo 'No se ha podido conectar a la Base de Datos';
    exit;
}

Auth::createCarrito();
$id_juego = test_input( $_GET['id'] ?? null );
$id_plataforma = test_input( $_GET['plat'] ?? null );
$juego = null;

if ($id_juego != null && $id_plataforma != null) {
    $juego = (object)Juego::findByIdCarrito($cnx, $id_juego, $id_plataforma);
}

if($juego != null){
    Auth::addGame($juego);
}

header('Location: controlador-carrito.php');

unset($cnx);