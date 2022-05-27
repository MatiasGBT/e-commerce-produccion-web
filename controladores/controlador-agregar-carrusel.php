<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/ImagenesCarrusel.php');
require_once('../helpers/helper_input.php');

try{
    $cnx = new Cnx();
}catch(PDOException $e){
    echo 'Ha ocurrido un error';
    exit;
}

$carrusel = new ImagenesCarrusel();

$errores = array();

if(isset($_POST['submit']))
{
    $carrusel->titulo = test_input( $_POST['titulo'] ?? null );
    $carrusel->texto =  test_input( $_POST['texto'] ?? null );

    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0 )
    {
        $info = pathinfo($_FILES['imagen']['name']);
        $extension = $info['extension'];
        
        $extensiones_permitidas = array('jpg', 'jpeg');

        if ( in_array($extension, $extensiones_permitidas) ) {
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
}

$action = 'controlador-agregar-carrusel.php';

require_once('../vistas/guardar-carrusel.php');

unset($cnx);