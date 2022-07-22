<?php

require_once('Cnx.php');
require_once('ModeloPadre.php');

class CompraJuego extends ModeloPadre{

    public function __construct()
    {
        parent::__construct(array(
            'id_compras_juegos' => null,
            'id_compra' => null,
            'id_juego' => null,
            'id_plataforma' => null
        ));
    }

    public function insert(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            INSERT INTO compras_juegos(id_compra, id_juego, id_plataforma)
            VALUES(:id_compra, :id_juego, :id_plataforma)
        ');
        $consulta->bindValue(':id_compra', $this->id_compra);
        $consulta->bindValue(':id_juego', $this->id_juego);
        $consulta->bindValue(':id_plataforma', $this->id_plataforma);
        $consulta->execute();
        $this->id_compras_juegos = $cnx->lastInsertId();
    }

    public static function findByCompraId(Cnx $cnx, $id_compra)
    {
        $consulta = $cnx->prepare('
            SELECT j.nombre_juego, j.precio, p.nombre_plataforma FROM compras c
            INNER JOIN compras_juegos cj
            ON c.id_compra = cj.id_compra
            INNER JOIN juegos j
            ON cj.id_juego = j.id_juego
            INNER JOIN plataformas p
            ON cj.id_plataforma = p.id_plataforma
            WHERE c.id_compra = :id
        ');
        $consulta->bindValue(':id', $id_compra);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

}