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
    echo 'Ha ocurrido un error';
    exit;
}

$id = test_input($_REQUEST['id'] ?? null);

$carrusel = ImagenesCarrusel::findById($cnx, $id);

if(isset($_POST['submit']))
{
    $carrusel->titulo = test_input( $_POST['titulo'] ?? $carrusel->titulo);
    $carrusel->texto =  test_input( $_POST['texto'] ?? $carrusel->texto);

    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0 )
    {
        $info = pathinfo($_FILES['imagen']['name']);
        $extension = $info['extension'];
        
        $extensiones_permitidas = array('jpg', 'jpeg');

        if ( in_array($extension, $extensiones_permitidas) ) {
            if (is_file($carrusel->imagen)) {
                unlink($carrusel->imagen);
            }

            $tituloSinEspacios = str_replace(" ", "", $carrusel->titulo);
            $origen = $_FILES['imagen']['tmp_name'];
            $destino = "../imagenes/carrusel/c{$tituloSinEspacios}.{$extension}";

            move_uploaded_file($origen, $destino);

            $carrusel->imagen =  $destino;
            
            $errores = $carrusel->validate();
            if(count($errores) == 0){
                $carrusel->save($cnx);
                header('Location: controlador-administrador.php');
            }
        } else {
            $error = 'La extensión es incorrecta';
            $errores['extension'] = $error;
        }
    }
    $errores = $carrusel->validate();
    if(count($errores) == 0){
        $carrusel->save($cnx);
        header('Location: controlador-administrador.php');
    }
}

$errores = array();

$action = 'controlador-modificar-carrusel.php';

require_once('../vistas/guardar-carrusel.php');

unset($cnx);