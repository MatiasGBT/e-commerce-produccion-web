<?php

require_once('Cnx.php');
require_once('ModeloPadre.php');

class JuegoPlataforma extends ModeloPadre{

    public function __construct()
    {
        parent::__construct(array(
            'id_juegos_plataformas' => null,
            'id_juego' => null,
            'id_categoria' => null,
            'stock' => null
        ));
    }

    public static function listarDestacados(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT jp.*, j.*, c.*, jc.*, p.*
            FROM juegos_plataformas jp
            INNER JOIN juegos j
            ON jp.id_juego = j.id_juego
            INNER JOIN plataformas p
            ON jp.id_plataforma = p.id_plataforma
            INNER JOIN juegos_categorias jc
            ON j.id_juego = jc.id_juego
            INNER JOIN categorias c
            ON jc.id_categoria = c.id_categoria
            WHERE j.destacado = 1
            GROUP BY (j.id_juego)
        ');
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public static function insert(Cnx $cnx, $idPlataforma, $idJuego, $stock)
    {
        $consulta = $cnx->prepare('
            INSERT INTO juegos_plataformas(id_juego, id_plataforma, stock)
            VALUES(:idJuego, :idPlataforma, :stock)
        ');
        $consulta->bindValue(':idJuego', $idJuego);
        $consulta->bindValue(':idPlataforma', $idPlataforma);
        $consulta->bindValue(':stock', $stock);
        $consulta->execute();
    }

    public static function exists(Cnx $cnx, $idPlataforma, $idJuego)
    {
        $consulta = $cnx->prepare('
            SELECT * FROM juegos_plataformas
            WHERE id_juego = :id_juego
            AND id_plataforma = :id_plataforma
        ');
        $consulta->bindValue(':id_juego', $idJuego);
        $consulta->bindValue(':id_plataforma', $idPlataforma);
        $consulta->execute();
        return $consulta->fetch();
    }

    public static function update(Cnx $cnx, $idPlataforma, $idJuego, $stock)
    {
        $consulta = $cnx->prepare('
            UPDATE juegos_plataformas SET 
            stock = :stock
            WHERE id_juego = :id_juego
            AND id_plataforma = :id_plataforma
        ');
        $consulta->bindValue(':stock', $stock);
        $consulta->bindValue(':id_juego', $idJuego);
        $consulta->bindValue(':id_plataforma', $idPlataforma);
        $consulta->execute();
    }
}