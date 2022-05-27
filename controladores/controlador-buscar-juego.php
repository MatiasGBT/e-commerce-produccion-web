<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/Juego.php');
require_once('../helpers/helper_input.php');

try{
    $cnx = new Cnx();
}catch(PDOException $e){
    echo 'No se ha podido conectar a la Base de Datos';
    exit;
}

$nombre = test_input( $_POST["nombre"] ?? null );
$juegos = array();
$mensaje = null;

if ($nombre != null && strlen($nombre) >= 3) {
    $juegos = Juego::findByName($cnx, $nombre);
} else if (strlen($nombre) < 3) {
    $mensaje = "Por favor, escriba al menos 3 letras en el buscador.";
}

$paginas = null;

$orden = "nuevo";
$filtro = "all";

require_once('../vistas/catalogo.php');

unset($cnx);