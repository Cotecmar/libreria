<?php

namespace Cotecmar\Servicio;

use Illuminate\Support\Str;
use Carbon\Carbon;

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

    public static function CONTARFECHASEnMes($fechainicio, $fechafinal)
    {
        return (($fechafinal->year - $fechainicio->year) * 12) + $fechafinal->month - $fechainicio->month;
    }

    public static function FechaConvertirSAP($fecha)
    {
        $año = substr($fecha, 0, 4);
        $mes = substr($fecha, 4, 2);
        $dia = substr($fecha, 6, 2);
        $fechaMin = Carbon::createFromDate($año, $mes, $dia);
        return $fechaMin;
    }

    public static function ConvertirFechaNumero($fecha)
    {
        $año = $fecha->year;
        $mes = self::RellenarCerrosIzquierda($fecha->month, 2);
        $dia = self::RellenarCerrosIzquierda($fecha->day, 2);
        return ($año . $mes . $dia);
    }

    public static function RellenarCerrosIzquierda($numero, $longitud)
    {
        if (Str::length($numero) < $longitud) {
            return self::RellenarEspaciosVariable("0", $longitud - Str::length($numero)) . $numero;
        }
        return substr($numero, 0, $longitud);
    }

    public static function RellenarEspaciosVariable($variable, $longitud)
    {
        $var = "";
        do {
            $var = $var . $variable;
        } while (Str::length($var) < $longitud);
        return substr($var, 0, $longitud);
    }
}
