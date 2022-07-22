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

$juego = new Juego();
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
            $nombreSinEspacios = str_replace(" ", "", $juego->nombre_juego);
            $origen = $_FILES['imagen']['tmp_name'];
            $destino = "../imagenes/juegos/{$nombreSinEspacios}.{$extension}";

            move_uploaded_file($origen, $destino);

            $juego->imagen =  $destino;
        } else {
            $error = 'La extensión es incorrecta';
            $errores['extension'] = $error;
        }
    }

    $errores = $juego->validate();
    if(count($errores) == 0){
        $juego->save($cnx);
        $idJuego = Juego::findLastOne($cnx);

        $play = test_input( $_POST['stockPlay'] ?? null );
        if ($play != null) {
            JuegoPlataforma::insert($cnx, 1, $idJuego[0], $play);
        }
        $xbox = test_input( $_POST['stockXbox'] ?? null );
        if ($xbox != null) {
            JuegoPlataforma::insert($cnx, 2, $idJuego[0], $xbox);
        }
        $nint = test_input( $_POST['stockNint'] ?? null );
        if ($nint != null) {
            JuegoPlataforma::insert($cnx, 3, $idJuego[0], $nint);
        }

        header('Location: controlador-administrador.php');
    }
}

$action = 'controlador-agregar-juego.php';

require_once('../vistas/guardar-juego.php');

unset($cnx);