<?php

require_once('Cnx.php');
require_once('ModeloPadre.php');

class Compra extends ModeloPadre{

    public function __construct()
    {
        parent::__construct(array(
            'id_compra' => null,
            'nombre_compra' => null,
            'total' => null,
            'fecha_compra' => null
        ));
    }

    public static function findById(Cnx $cnx, int $id)
    {
        $consulta = $cnx->prepare('
            SELECT *
            FROM compras
            WHERE id_compra = :id
        ');
        $consulta->bindValue(':id', $id);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Compra');
        return $consulta->fetch();
    }

    public function insert(Cnx $cnx)
    {
        $fecha = date('Y-m-d H:i:s');
        $consulta = $cnx->prepare('
            INSERT INTO compras(nombre_compra, total, fecha_compra)
            VALUES(:nombre, :total, :fecha)
        ');
        $consulta->bindValue(':nombre', $this->nombre_compra);
        $consulta->bindValue(':total', $this->total);
        $consulta->bindValue(':fecha', $fecha);
        $consulta->execute();
        $this->id_compra = $cnx->lastInsertId();
    }

    public static function paginate(Cnx $cnx, $pagina, $cuantos, $id_usuario)
    {
        $desde = ($pagina - 1) * $cuantos;
        $textoConsulta = '
        SELECT c.*
        FROM compras c
        INNER JOIN compras_usuarios cu
        ON c.id_compra = cu.id_compra
        WHERE cu.id_usuario = :id
        ORDER BY c.fecha_compra DESC
        LIMIT :desde, :cuantos
        ';
        $consulta = $cnx->prepare($textoConsulta);
        $consulta->bindValue(':id', $id_usuario, PDO::PARAM_INT);
        $consulta->bindValue(':desde', $desde, PDO::PARAM_INT);
        $consulta->bindValue(':cuantos', $cuantos, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public static function count(Cnx $cnx, $id_usuario)
    {
        $textoConsulta = '
        SELECT COUNT(1)
        FROM compras c
        INNER JOIN compras_usuarios cu
        ON c.id_compra = cu.id_compra
        WHERE cu.id_usuario = :id
        ';
        $consulta = $cnx->prepare($textoConsulta);
        $consulta->bindValue(':id', $id_usuario, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchColumn();
    }
}