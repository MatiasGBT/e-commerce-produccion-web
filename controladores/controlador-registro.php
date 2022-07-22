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

$errores = [];

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nombre = test_input( $_POST['usuario'] ?? null );
    $email = test_input( $_POST['email'] ?? null );
    $contrasena = test_input( $_POST['clave'] ?? null );
    $contrasenaConf = test_input( $_POST['claveConf'] ?? null );

    if ($contrasena != $contrasenaConf) {
        $error = 'Las contraseñas no coinciden';
        $errores['contrasenas'] = $error;
    }
    $usuario = new Usuario();
    $usuario->nombre = $nombre;
    $usuario->email = $email;
    $usuario->contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    $errores = $usuario->validate($cnx);
    if(count($errores) == 0){
        $usuario->save($cnx);
        Auth::create($usuario);
        header('Location: controlador-inicio.php');
    }
}

require_once('../vistas/registro.php');

unset($cnx);