<?php

namespace Cotecmar\Servicio;

class ObjectGeneral
{
    protected $id;
    protected $name;
    protected $descripcion;

    function __construct($id, $name, $descripcion)
    {
        $this->id = $id;
        $this->name = $name;
        $this->descripcion = $descripcion;
    }
}
