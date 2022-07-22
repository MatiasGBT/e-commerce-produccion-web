<?php

require_once('Cnx.php');
require_once('ModeloPadre.php');

class CompraUsuario extends ModeloPadre{

    public function __construct()
    {
        parent::__construct(array(
            'id_compras_usuario' => null,
            'id_compra' => null,
            'id_usuario' => null
        ));
    }

    public function insert(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            INSERT INTO compras_usuarios(id_compra, id_usuario)
            VALUES(:id_compra, :id_usuario)
        ');
        $consulta->bindValue(':id_compra', $this->id_compra);
        $consulta->bindValue(':id_usuario', $this->id_usuario);
        $consulta->execute();
        $this->id_compras_usuarios = $cnx->lastInsertId();
    }

}