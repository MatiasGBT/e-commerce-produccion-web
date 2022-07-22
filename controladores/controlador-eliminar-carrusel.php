<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/ImagenesCarrusel.php');
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

if ($id != null) {
    $carrusel = ImagenesCarrusel::findById($cnx, $id);
}

if (is_file($carrusel->imagen)) {
    unlink($carrusel->imagen);
}

if ($carrusel) {
    $carrusel->delete($cnx);
}

header('Location: controlador-administrador.php');

unset($cnx);