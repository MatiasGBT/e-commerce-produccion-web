<?php

session_start();

class Auth 
{
    public static function create(Usuario $usuario)
    {
        $_SESSION['auth'] = array(
            'id_usuario' => $usuario->id_usuario,
            'nombre' => $usuario->nombre,
            'email' => $usuario->email,
            'id_rol' => $usuario->id_rol
        );
    }

    public static function validate()
    {
        return $_SESSION['auth'] ?? false;
    }

    public static function validateCarrito()
    {
        return $_SESSION['carrito'] ?? false;
    }

    public static function getIdUsuario()
    {
        return ( self::validate() ) ? $_SESSION['auth']['id_usuario'] : null;
    }

    public static function getNombre()
    {
        return ( self::validate() ) ? $_SESSION['auth']['nombre'] : null;
    }

    public static function getEmail()
    {
        return ( self::validate() ) ? $_SESSION['auth']['email'] : null;
    }

    public static function isAdministrador()
    {
        return ( self::validate() and $_SESSION['auth']['id_rol'] == Rol::ADMINISTRADOR );
    }

    public static function isUsuario()
    {
        return ( self::validate() and $_SESSION['auth']['id_rol'] == Rol::USUARIO );
    }

    public static function createCarrito() {
        if (!Auth::validateCarrito()) {
            $_SESSION['carrito'] = array();
        }
    }

    public static function restoreCarrito() {
        if (Auth::validateCarrito()) {
            $_SESSION['carrito'] = array();
        }
    }

    public static function getJuegos()
    {
        return ( self::validateCarrito() ) ? $_SESSION['carrito'] : null;
    }

    public static function addGame(Object $juego) {
        if (!in_array($juego, $_SESSION['carrito'])) {
            array_push($_SESSION['carrito'], $juego);
        }
    }

    public static function quitGame(Object $juego) {
        if (($indice = array_search($juego, $_SESSION['carrito'])) !== false) {
            unset($_SESSION['carrito'][$indice]);
        }
    }

    public static function destroy()
    {
        unset( $_SESSION['auth'] );
        unset( $_SESSION['carrito'] );
    }
}