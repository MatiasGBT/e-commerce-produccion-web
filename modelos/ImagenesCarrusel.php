<?php

require_once('Cnx.php');
require_once('ModeloPadre.php');

class ImagenesCarrusel extends ModeloPadre{

    public function __construct()
    {
        parent::__construct(array(
            'id_imagen' => null,
            'titulo' => null,
            'texto' => null,
            'imagen' => null,
            'fecha_baja' => null
        ));
    }

    public static function listarTodos(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT c.*
            FROM imagenes_carrusel c
            WHERE c.fecha_baja IS NULL
            ORDER BY c.id_imagen DESC
        ');
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findById(Cnx $cnx, int $id)
    {
        $consulta = $cnx->prepare('
            SELECT *
            FROM imagenes_carrusel
            WHERE id_imagen = :id
        ');
        $consulta->bindValue(':id', $id);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ImagenesCarrusel');
        return $consulta->fetch();
    }

    public function delete(Cnx $cnx)
    {
        $fecha = date('Y-m-d H:i:s');
        $consulta = $cnx->prepare('
            UPDATE imagenes_carrusel SET
            fecha_baja = :fecha_baja
            WHERE id_imagen = :id
        ');
        $consulta->bindValue(':fecha_baja', $fecha);
        $consulta->bindValue(':id', $this->id_imagen);
        $consulta->execute();
    }

    public function validate()
    {
        $errores = array();
        if(!$this->titulo){
            $errores['titulo'] = 'Ingresar un titulo';
        }
        if(!$this->texto){
            $errores['texto'] = 'Ingresar un texto';
        }
        return $errores;
    }

    public function save(Cnx $cnx)
    {
       if($this->id_imagen) {
           $this->update($cnx);
       } else {
           $this->insert($cnx);
       }
    }

    private function insert(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            INSERT INTO imagenes_carrusel(titulo, texto, imagen)
            VALUES(:titulo, :texto, :imagen)
        ');
        $consulta->bindValue(':titulo', $this->titulo);
        $consulta->bindValue(':texto', $this->texto);
        $consulta->bindValue(':imagen', $this->imagen);
        $consulta->execute();
    }

    private function update(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            UPDATE imagenes_carrusel SET 
            titulo = :titulo,
            texto = :texto,
            imagen = :imagen
            WHERE id_imagen = :id
        ');            
        $consulta->bindValue(':titulo', $this->titulo);
        $consulta->bindValue(':texto', $this->texto);
        $consulta->bindValue(':imagen', $this->imagen);
        $consulta->bindValue(':id', $this->id_imagen);
        $consulta->execute();
    }
}