<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/Usuario.php');
require_once('../modelos/Compra.php');
require_once('../helpers/helper_input.php');
require_once('../helpers/helper_paginador.php');
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

$nombre = Auth::getNombre();
$email = Auth::getEmail();
$id = (int) Auth::getIdUsuario();
$usuario = Usuario::findById($cnx, $id);
$errores = array();

if(isset($_POST['submit']))
{
    $usuario->nombre = test_input( $_POST['nombre'] ?? null );
    $usuario->email =  test_input( $_POST['email'] ?? null );
    $contrasena = test_input( $_POST['clave'] ?? null );
    if ($contrasena != null) {
        $usuario->contrasena =  password_hash($contrasena, PASSWORD_DEFAULT);
    }

    $errores = $usuario->validateSinContrasena($cnx);
    if(count($errores) == 0){
        $usuario->save($cnx);
        Auth::create($usuario);
        header('Location: controlador-login.php');
    }
}

$pag = $_GET['pag'] ?? 1;
$registros_por_pagina = 8;
$compras = Compra::paginate($cnx, $pag, $registros_por_pagina, Auth::getIdUsuario());
$cantidad_registros = Compra::count($cnx, Auth::getIdUsuario());
$paginas = paginador($pag, $cantidad_registros, $registros_por_pagina);

require_once('../vistas/cuenta.php');