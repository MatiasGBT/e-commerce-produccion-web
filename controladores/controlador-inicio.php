<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/ImagenesCarrusel.php');
require_once('../modelos/Juego.php');

try{
    $cnx = new Cnx();
}catch(PDOException $e){
    echo 'No se ha podido conectar a la Base de Datos';
    exit;
}

$imagenesCarrusel = ImagenesCarrusel::listarTodos($cnx);
$juegos = Juego::listarDestacados($cnx);

require_once('../vistas/index.php');

unset($cnx);