<?php

require_once('ModeloPadre.php');
require_once('Rol.php');

class Usuario extends ModeloPadre
{

    public function __construct()
    {
        $fecha = date('Y-m-d H:i:s');
        parent::__construct(array(
            'id_usuario' => null,
            'nombre' => null,
            'email' => null,
            'contrasena' => null,
            'id_rol' => null,
            'fecha_alta' => $fecha,
            'fecha_baja' => null
        ));
    }

    public function hashContrasena($contrasena)
    {
        $this->contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    }

    public function validate($cnx)
    {
        $errores = array();
        if( !$this->nombre ) $errores['nombre'] = 'Ingresar un nombre';
        if( !$this->validateUsername($cnx) ) $errores['nombre'] = 'El nombre de usuario ya esta ocupado';
        if( !filter_var($this->email, FILTER_VALIDATE_EMAIL) ) $errores['email'] = 'Ingresar un correo electrónico válido';
        if( !$this->validateEmail($cnx) ) $errores['email'] = 'El correo electrónico le pertenece a otra persona';
        if( !$this->contrasena ) $errores['contrasena'] = 'Ingresar una contraseña.';
        return $errores;
    }

    public function validateSinContrasena($cnx)
    {
        $errores = array();
        if( !$this->nombre ) $errores['nombre'] = 'Ingresar un nombre';
        if( !$this->validateUsername($cnx) ) $errores['nombre'] = 'El nombre de usuario ya esta ocupado';
        if( !filter_var($this->email, FILTER_VALIDATE_EMAIL) ) $errores['email'] = 'Ingresar un correo electrónico válido';
        if( !$this->validateEmail($cnx) ) $errores['email'] = 'El correo electrónico le pertenece a otra persona';
        return $errores;
    }

    private function validateUsername($cnx)
    {
        if($this->id_usuario){
            $consulta = $cnx->prepare('
                SELECT COUNT(1)
                FROM usuarios
                WHERE nombre = :nombre
                AND id_usuario <> :id
            ');
            $consulta->bindValue(':id', $this->id_usuario);
        } else {
            $consulta = $cnx->prepare('
                SELECT COUNT(1)
                FROM usuarios
                WHERE nombre = :nombre
            ');
        }        
        $consulta->bindValue(':nombre', $this->nombre);
        $consulta->execute();
        $cantidad = $consulta->fetchColumn();
        return $cantidad < 1;
    }
    
    private function validateEmail($cnx)
    {
        if($this->id_usuario){
            $consulta = $cnx->prepare('
                SELECT COUNT(1)
                FROM usuarios
                WHERE email = :email
                AND id_usuario <> :id
            ');
            $consulta->bindValue(':id', $this->id_usuario);
        } else {
            $consulta = $cnx->prepare('
                SELECT COUNT(1)
                FROM usuarios
                WHERE email = :email
            ');
        }        
        $consulta->bindValue(':email', $this->email);
        $consulta->execute();
        $cantidad = $consulta->fetchColumn();
        return $cantidad < 1;
    }

    public function save(Cnx $cnx)
    {
        if($this->id_usuario){
            $this->update($cnx);
        } else {
            $this->insert($cnx);
        }
    }

    private function insert(Cnx $cnx)
    {
        $fecha = date('Y-m-d H:i:s');
        $consulta = $cnx->prepare('
            INSERT INTO usuarios(nombre, email, contrasena, id_rol, fecha_alta)
            VALUES(:nombre, :email, :contrasena, :id_rol, :fecha_alta)
        ');
        $consulta->bindValue(':nombre', $this->nombre);
        $consulta->bindValue(':email', $this->email);
        $consulta->bindValue(':contrasena', $this->contrasena);
        $consulta->bindValue(':id_rol', Rol::USUARIO);
        $consulta->bindValue(':fecha_alta', $fecha);
        $consulta->execute();
        $this->id_usuario = $cnx->lastInsertId();
    }

    private function update(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            UPDATE usuarios SET 
                nombre = :nombre,
                email = :email,
                contrasena = :contrasena
            WHERE id_usuario = :id
        ');
        $consulta->bindValue(':nombre', $this->nombre);
        $consulta->bindValue(':email', $this->email);
        $consulta->bindValue(':contrasena', $this->contrasena);
        $consulta->bindValue(':id', $this->id_usuario);
        $consulta->execute();
    }

    public static function findById(Cnx $cnx, int $id)
    {
        $consulta = $cnx->prepare('
            SELECT *
            FROM usuarios
            WHERE id_usuario = :id
        ');
        $consulta->bindValue(':id', $id);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Usuario');
        return $consulta->fetch();
    }

    public static function findByUsername(Cnx $cnx, string $nombre)
    {
        $consulta = $cnx->prepare('
            SELECT *
            FROM usuarios
            WHERE nombre = :nombre
            AND fecha_baja IS NULL
        ');
        $consulta->bindValue(':nombre', $nombre);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Usuario');
        return $consulta->fetch();
    }

    public static function findByUsernameWithoutFechaBaja(Cnx $cnx, string $nombre)
    {
        $consulta = $cnx->prepare('
            SELECT *
            FROM usuarios
            WHERE nombre = :nombre
        ');
        $consulta->bindValue(':nombre', $nombre);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Usuario');
        return $consulta->fetch();
    }

    public static function login(Cnx $cnx, $nombre, $contrasena)
    {
        $usuario = self::findByUsername($cnx, $nombre);
        if($usuario and password_verify($contrasena, $usuario->contrasena)) {
            return $usuario;
        } else {
            return false;
        }
    }

    public function delete(Cnx $cnx)
    {
        $fecha = date('Y-m-d H:i:s');
        $consulta = $cnx->prepare('
            UPDATE usuarios SET
            fecha_baja = :fecha_baja
            WHERE id_usuario = :id
        ');
        $consulta->bindValue(':fecha_baja', $fecha);
        $consulta->bindValue(':id', $this->id_usuario);
        $consulta->execute();
    }

    public function hacerAdmin(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            UPDATE usuarios SET
            id_rol = 1
            WHERE id_usuario = :id
        ');
        $consulta->bindValue(':id', $this->id_usuario);
        $consulta->execute();
    }

    public function quitarAdmin(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            UPDATE usuarios SET
            id_rol = 2
            WHERE id_usuario = :id
        ');
        $consulta->bindValue(':id', $this->id_usuario);
        $consulta->execute();
    }

    public function restaurar(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            UPDATE usuarios SET
            fecha_baja = NULL
            WHERE id_usuario = :id
        ');
        $consulta->bindValue(':id', $this->id_usuario);
        $consulta->execute();
    }
}