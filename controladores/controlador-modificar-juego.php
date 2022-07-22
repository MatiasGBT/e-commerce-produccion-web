<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/Juego.php');
require_once('../modelos/Genero.php');
require_once('../modelos/JuegoPlataforma.php');
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
$juego = Juego::findById($cnx, $id);
$generos = Genero::all($cnx);

$errores = array();

if(isset($_POST['submit']))
{
    $juego->nombre_juego = test_input( $_POST['nombre'] ?? null );
    $juego->precio =  test_input( $_POST['precio'] ?? null );
    $juego->id_genero =  test_input( $_POST['genero'] ?? null );
    $juego->fecha_lanzamiento =  test_input( $_POST['fecha'] ?? null );

    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0 )
    {
        $info = pathinfo($_FILES['imagen']['name']);
        $extension = $info['extension'];
        
        $extensiones_permitidas = array('jpg', 'jpeg');

        if ( in_array($extension, $extensiones_permitidas) ) {
            if (is_file($juego->imagen)) {
                unlink($juego->imagen);
            }

            $nombreSinEspacios = str_replace(" ", "", $juego->nombre_juego);
            $origen = $_FILES['imagen']['tmp_name'];
            $destino = "../imagenes/juegos/{$nombreSinEspacios}.{$extension}";

            move_uploaded_file($origen, $destino);

            $juego->imagen = $destino;
        } else {
            $error = 'La extensión es incorrecta';
            $errores['extension'] = $error;
        }
    }

    $play = test_input( $_POST['stockPlay'] ?? null );
    if ($play != -1 && $play != null) {
        if (JuegoPlataforma::exists($cnx, 1, $juego->id_juego)[0]) {
            JuegoPlataforma::update($cnx, 1, $juego->id_juego, $play);
        } else {
            JuegoPlataforma::insert($cnx, 1, $juego->id_juego, $play);
        }
    }
    $xbox = test_input( $_POST['stockXbox'] ?? null );
    if ($xbox != -1 && $xbox != null) {
        if (JuegoPlataforma::exists($cnx, 2, $juego->id_juego)[0]) {
            JuegoPlataforma::update($cnx, 2, $juego->id_juego, $xbox);
        } else {
            JuegoPlataforma::insert($cnx, 2, $juego->id_juego, $xbox);
        }
    }
    $nint = test_input( $_POST['stockNint'] ?? null );
    if ($nint != -1 && $nint != null) {
        if (JuegoPlataforma::exists($cnx, 3, $juego->id_juego)[0]) {
            JuegoPlataforma::update($cnx, 3, $juego->id_juego, $nint);
        } else {
            JuegoPlataforma::insert($cnx, 3, $juego->id_juego, $nint);
        }
    }

    $errores = $juego->validate();
    if(count($errores) == 0){
        $juego->save($cnx);

        header('Location: controlador-administrador.php');
    }
}

$action = 'controlador-modificar-juego.php';

require_once('../vistas/guardar-juego.php');

unset($cnx);