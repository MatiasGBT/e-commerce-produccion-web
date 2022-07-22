<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/Juego.php');
require_once('../modelos/Compra.php');
require_once('../modelos/CompraJuego.php');
require_once('../modelos/JuegoPlataforma.php');
require_once('../modelos/CompraUsuario.php');
require_once('../_autoload.php');

if(Auth::isAdministrador())
{
    header('Location: controlador-inicio.php');
}

try{
    $cnx = new Cnx();
}catch(PDOException $e){
    echo 'No se ha podido conectar a la Base de Datos';
    exit;
}

Auth::createCarrito();

$textoVacio = 'Agrega juegos al carrito desde la pestaña <a href="controlador-catalogo.php">Catálogo</a>';

$juegos = Auth::getJuegos();
$nombreCompra = "Agrega objetos al carrito para comprar";
$precioTotal = 0;

if ($juegos != null) {
    $totalJuegos = count($juegos);
    if ($totalJuegos > 1) {
        $nombreCompra = reset($juegos)->nombre_juego." + ".count($juegos)-1;
    } else {
        $nombreCompra = reset($juegos)->nombre_juego;
    }
    foreach ($juegos as $juego) {
        $precioTotal += $juego->precio;
    }
}

if(isset($_POST['submit'])) {
    if(!Auth::isUsuario()) {
        header('Location: controlador-login.php');
    } else {
        $compra = insertCompra($nombreCompra, $precioTotal, $cnx);
        insertCompraJuego($compra, $juegos, $cnx);
        insertCompraUsuario($compra, $cnx);
        Auth::restoreCarrito();
        $juegos = null;
        $textoVacio = 'Tu compra se realizo con éxito, ¡muchas gracias!<br>Podes ver los detalles en la pestaña <a href="controlador-cuenta.php">Cuenta</a>';
    }
}

require_once('../vistas/carrito.php');

function insertCompra($nombreCompra, $precioTotal, $cnx) {
    $compra = new Compra();
    $compra->nombre_compra = $nombreCompra;
    $compra->total = $precioTotal;
    $compra->insert($cnx);
    return $compra;
}

function insertCompraJuego($compra, $juegos, $cnx) {
    $compraJuego = new CompraJuego();
    foreach ($juegos as $juego) {
        $compraJuego->id_compra = $compra->id_compra;
        $compraJuego->id_juego = $juego->id_juego;
        $compraJuego->id_plataforma = $juego->id_plataforma;
        $compraJuego->insert($cnx);
        $juegoPlataforma = JuegoPlataforma::findByTwoIds($cnx, $compraJuego->id_juego, $compraJuego->id_plataforma);
        $juegoPlataforma->stock --;
        $juegoPlataforma->restarStock($cnx);
        $compraJuego = new CompraJuego();
    }
}

function insertCompraUsuario($compra, $cnx) {
    $compraUsuario = new CompraUsuario();
    $compraUsuario->id_compra = $compra->id_compra;
    $compraUsuario->id_usuario = Auth::getIdUsuario();
    $compraUsuario->insert($cnx);
}