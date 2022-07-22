<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/Usuario.php');
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

if ($id != null) {
    $usuario = Usuario::findById($cnx, $id);
}

if($usuario){
    $usuario->delete($cnx);
    Auth::destroy();
}

header('Location: controlador-inicio.php');

unset($cnx);