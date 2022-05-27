<?php

require_once('Cnx.php');
require_once('ModeloPadre.php');

class Genero extends ModeloPadre{

    public function __construct()
    {
        parent::__construct(array(
            'id_genero' => null,
            'nombre_genero' => null
        ));
    }

    public static function all(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT g.*
            FROM generos g
        ');
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
}