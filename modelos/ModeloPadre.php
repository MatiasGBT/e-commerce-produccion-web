<?php

abstract class ModeloPadre
{

    private array $data;

    public function __construct($p_data)
    {
        $this->data = $p_data;
    }

    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->data))
        {
            $this->data[$name] = $value;
        }
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

}