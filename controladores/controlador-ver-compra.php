<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/Compra.php');
require_once('../modelos/CompraJuego.php');
require_once('../helpers/helper_input.php');
require_once('../_autoload.php');

if(!Auth::isAdministrador() && !Auth::isUsuario())
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
$compra = null;
$juegos = null;
if ($id != null) {
    $compra = Compra::findById($cnx, $id);
    $juegos = CompraJuego::findByCompraId($cnx, $id);
}


require_once('../vistas/detalle-compra.php');

unset($cnx);