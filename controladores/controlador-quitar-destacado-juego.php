<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/Juego.php');
require_once('../helpers/helper_input.php');
require_once('../_autoload.php');

if(!Auth::isAdministrador())
{
    header('Location: controlador-login.php');
}

try{
    $cnx = new Cnx();
}catch(PDOException $e){
    echo 'No se ha podido conectar a la Base de Datos';
    exit;
}

$id = test_input( $_GET['id'] ?? null );

$juego = Juego::findById($cnx, $id);

if($juego){
    $juego->quitarDestacado($cnx);
}

header('Location: controlador-administrador.php');

unset($cnx);