<?php

namespace Cotecmar\Servicio;

class Main
{

    public static function gerencias()
    {
        return [
            new ObjectGeneral(1, 'PCTMAR', 'Presidencia'),
            new ObjectGeneral(2, 'VPEXE', 'Vicepresidencia Ejecutiva'),
            new ObjectGeneral(3, 'VPT&O', 'Vicepresidencia Tecnologia y Operaciones'),
            new ObjectGeneral(4, 'GEFAD', 'Gerencia Financiera y Administrativa'),
            new ObjectGeneral(5, 'GETHU', 'Gerencia de Talento Humano'),
            new ObjectGeneral(6, 'GEMAM', 'Gerencia Mamonal'),
            new ObjectGeneral(7, 'GEBOC', 'Gerencia Bocagrande'),
            new ObjectGeneral(8, 'GECON', 'Gerencia Contrucciones'),
            new ObjectGeneral(9, 'GEDIN', 'Gerencia Diseño e Ingenieria'),
            new ObjectGeneral(10, 'GECTI', 'Gerencia Ciencia Tecnologia e Innovación')
        ];
    }

    public static function hola()
    {
        return 'hola';
    }
}
