<?php

require_once('Cnx.php');
require_once('ModeloPadre.php');

class Juego extends ModeloPadre{

    public function __construct()
    {
        parent::__construct(array(
            'id_juego' => null,
            'nombre_juego' => null,
            'precio' => null,
            'imagen' => null,
            'id_genero' => null,
            'fecha_baja' => null,
            'destacado' => null,
            'fecha_lanzamiento' => null
        ));
    }

    public static function listarDestacados(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT j.*, g.*, jp.*, p.*
            FROM juegos j
            INNER JOIN generos g
            ON j.id_genero = g.id_genero
            INNER JOIN juegos_plataformas jp
            ON j.id_juego = jp.id_juego
            INNER JOIN plataformas p
            ON jp.id_plataforma = p.id_plataforma
            WHERE j.destacado = 1
            AND j.fecha_baja IS NULL
            ORDER BY RAND() LIMIT 0,6
        ');
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public static function paginateWithPlataforma(Cnx $cnx, $parametroOrden, $parametroFiltro, $pagina, $cuantos)
    {
        $desde = ($pagina - 1) * $cuantos;

        $textoConsulta = '
        SELECT j.*, g.*, jp.*, p.*
        FROM juegos j
        INNER JOIN generos g
        ON j.id_genero = g.id_genero
        INNER JOIN juegos_plataformas jp
        ON j.id_juego = jp.id_juego
        INNER JOIN plataformas p
        ON jp.id_plataforma = p.id_plataforma
        WHERE j.fecha_baja IS NULL ';

        if ($parametroFiltro != "todos") {
            $textoConsulta = $textoConsulta.'AND p.nombre_plataforma = :filtro ';
        }
        
        $textoConsulta = $textoConsulta.$parametroOrden.' LIMIT :desde, :cuantos';

        $consulta = $cnx->prepare($textoConsulta);

        if ($parametroFiltro != "todos") {
            $consulta->bindValue(':filtro', $parametroFiltro, PDO::PARAM_STR);
        }
        $consulta->bindValue(':desde', $desde, PDO::PARAM_INT);
        $consulta->bindValue(':cuantos', $cuantos, PDO::PARAM_INT);
        
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public static function paginateWithoutPlataforma(Cnx $cnx, $pagina, $cuantos)
    {
        $desde = ($pagina - 1) * $cuantos;

        $consulta = $cnx->prepare('
            SELECT id_juego, nombre_juego, precio, fecha_baja, destacado, fecha_lanzamiento
            FROM juegos
            WHERE juegos.fecha_baja IS NULL
            ORDER BY juegos.fecha_lanzamiento DESC
            LIMIT :desde, :cuantos
        ');
        
        $consulta->bindValue(':desde', $desde, PDO::PARAM_INT);
        $consulta->bindValue(':cuantos', $cuantos, PDO::PARAM_INT);

        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
        
    }

    public static function countWithPlataforma(Cnx $cnx, $parametroFiltro)
    {
        $textoConsulta = '
        SELECT COUNT(1)
        FROM juegos j
        INNER JOIN juegos_plataformas jp
        ON j.id_juego = jp.id_juego
        INNER JOIN plataformas p
        ON jp.id_plataforma = p.id_plataforma
        WHERE fecha_baja IS NULL 
        ';

        if ($parametroFiltro != "todos") {
            $textoConsulta = $textoConsulta.'AND p.nombre_plataforma = :filtro ';
        }

        $consulta = $cnx->prepare($textoConsulta);

        if ($parametroFiltro != "todos") {
            $consulta->bindValue(':filtro', $parametroFiltro, PDO::PARAM_STR);
        }
        $consulta->execute();
        return $consulta->fetchColumn();
    }

    public static function countWithoutPlataforma(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT COUNT(1)
            FROM juegos
            WHERE juegos.fecha_baja IS NULL
        ');
        $consulta->execute();
        return $consulta->fetchColumn();
    }

    public static function findByName(Cnx $cnx, $nombre)
    {
        $nombre = '%'.$nombre.'%';
        
        $consulta = $cnx->prepare('
            SELECT j.*, g.*, jp.*, p.*
            FROM juegos j
            INNER JOIN generos g
            ON j.id_genero = g.id_genero
            INNER JOIN juegos_plataformas jp
            ON j.id_juego = jp.id_juego
            INNER JOIN plataformas p
            ON jp.id_plataforma = p.id_plataforma
            WHERE j.fecha_baja IS NULL
            AND j.nombre_juego LIKE :nombre
        ');
        
        $consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);

        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findByNameWithoutPlataforma(Cnx $cnx, $nombre)
    {
        $nombre = '%'.$nombre.'%';
        
        $consulta = $cnx->prepare('
            SELECT j.*
            FROM juegos j
            WHERE j.fecha_baja IS NULL
            AND j.nombre_juego LIKE :nombre
        ');
        
        $consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);

        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findById(Cnx $cnx, int $id)
    {
        $consulta = $cnx->prepare('
            SELECT *
            FROM juegos
            WHERE id_juego = :id
        ');
        $consulta->bindValue(':id', $id);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Juego');
        return $consulta->fetch();
    }

    public function destacar(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            UPDATE juegos SET
            destacado = 1
            WHERE id_juego = :id
        ');
        $consulta->bindValue(':id', $this->id_juego);
        $consulta->execute();
    }

    public function quitarDestacado(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            UPDATE juegos SET
            destacado = 0
            WHERE id_juego = :id
        ');
        $consulta->bindValue(':id', $this->id_juego);
        $consulta->execute();
    }

    public function delete(Cnx $cnx)
    {
        $fecha = date('Y-m-d H:i:s');
        $consulta = $cnx->prepare('
            UPDATE juegos SET
            fecha_baja = :fecha_baja
            WHERE id_juego = :id
        ');
        $consulta->bindValue(':fecha_baja', $fecha);
        $consulta->bindValue(':id', $this->id_juego);
        $consulta->execute();
    }

    public function validate()
    {
        $errores = array();
        if(!$this->nombre_juego){
            $errores['nombre'] = 'Ingresar un nombre';
        }
        if(!$this->precio){
            $errores['precio'] = 'Ingresar un precio';
        }
        if(!$this->id_genero){
            $errores['genero'] = 'Ingresar un género';
        }
        if(!$this->fecha_lanzamiento){
            $errores['fecha'] = 'Ingresar una fecha de lanzamiento';
        }
        return $errores;
    }

    public function save(Cnx $cnx)
    {
       if($this->id_juego) {
           $this->update($cnx);
       } else {
           $this->insert($cnx);
       }
    }

    private function insert(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            INSERT INTO juegos(nombre_juego, precio, imagen, id_genero, fecha_lanzamiento)
            VALUES(:nombre, :precio, :imagen, :id_genero, :fecha_lanzamiento)
        ');
        $consulta->bindValue(':nombre', $this->nombre_juego);
        $consulta->bindValue(':precio', $this->precio);
        $consulta->bindValue(':imagen', $this->imagen);
        $consulta->bindValue(':id_genero', $this->id_genero);
        $consulta->bindValue(':fecha_lanzamiento', $this->fecha_lanzamiento);
        $consulta->execute();
    }

    private function update(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            UPDATE juegos SET 
            nombre_juego = :nombre_juego,
            precio = :precio,
            imagen = :imagen,
            id_genero = :id_genero,
            fecha_lanzamiento = :fecha_lanzamiento
            WHERE id_juego = :id
        ');            
        $consulta->bindValue(':nombre_juego', $this->nombre_juego);
        $consulta->bindValue(':precio', $this->precio);
        $consulta->bindValue(':imagen', $this->imagen);
        $consulta->bindValue(':id_genero', $this->id_genero);
        $consulta->bindValue(':fecha_lanzamiento', $this->fecha_lanzamiento);
        $consulta->bindValue(':id', $this->id_juego);
        $consulta->execute();
    }

    public static function findLastOne(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT id_juego
            FROM juegos
            WHERE id_juego = (SELECT MAX(id_juego) FROM juegos)
        ');
        $consulta->execute();
        return $consulta->fetch();
    }
}