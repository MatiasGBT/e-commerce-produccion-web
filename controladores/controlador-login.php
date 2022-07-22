<?php

require_once('../modelos/Cnx.php');
require_once('../modelos/Usuario.php');
require_once('../helpers/helper_input.php');
require_once('../_autoload.php');

if(Auth::validate()) {
    Auth::destroy();
}

try{
    $cnx = new Cnx();
}catch(PDOException $e){
    echo 'Error';
    exit;
}

$error = null;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nombre = test_input( $_POST['usuario'] ?? null );
    $contrasena = test_input( $_POST['clave'] ?? null );

    $usuario = Usuario::login($cnx, $nombre, $contrasena);

    if($usuario){
        Auth::create($usuario);
        header('Location: controlador-inicio.php');
    } else {
        $error = 'Los datos ingresados son incorrectos';
    }
}

require_once('../vistas/login.php');

unset($cnx);