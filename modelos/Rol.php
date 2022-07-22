<?php

require_once('ModeloPadre.php');

class Rol extends ModeloPadre
{

    const ADMINISTRADOR = 1;
    const USUARIO = 2;

    public function __construct()
    {
        parent::__construct(array(
            'id_rol' => null,
            'nombre' => null
        ));
    }

}