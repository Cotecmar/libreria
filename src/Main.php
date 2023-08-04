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

    public static function gerenciasSAP($gerenciaSAP)
    {
        if ($gerenciaSAP == 'FADM') //	GERENCIA FINANCIERA Y ADMINISTRATIVA	
            return array_fill_keys(Main::gerencias(), function ($gerencia) {
                return $gerencia->id == 4;
            });
        else if ($gerenciaSAP == 'VICE') //	VICEPRESIDENCIA EJECUTIVA	
            return array_fill_keys(Main::gerencias(), function ($gerencia) {
                return $gerencia->id == 2;
            });
        else if ($gerenciaSAP == 'DING') //	GERENCIA DISEÑO E INGENIERIA	
            return array_fill_keys(Main::gerencias(), function ($gerencia) {
                return $gerencia->id == 9;
            });
        else if ($gerenciaSAP == 'BGDE') //	GERENCIA PLANTA BOCAGRANDE	
            return array_fill_keys(Main::gerencias(), function ($gerencia) {
                return $gerencia->id == 7;
            });
        else if ($gerenciaSAP == 'MNAL') //	GERENCIA PLANTA MAMONAL	
            return array_fill_keys(Main::gerencias(), function ($gerencia) {
                return $gerencia->id == 6;
            });
        else if ($gerenciaSAP == 'VICO') //	VICEPRESIDENCIA TECNOLOGICA Y DE OPERACIONES	
            return array_fill_keys(Main::gerencias(), function ($gerencia) {
                return $gerencia->id == 3;
            });
        else if ($gerenciaSAP == 'PRES') //	PRESIDENCIA	
            return array_fill_keys(Main::gerencias(), function ($gerencia) {
                return $gerencia->id == 1;
            });
        else if ($gerenciaSAP == 'CTIN') //	GERENCIA DE CIENCIA, TECNOLOGIA E INNOVACION	
            return array_fill_keys(Main::gerencias(), function ($gerencia) {
                return $gerencia->id == 10;
            });
        else if ($gerenciaSAP == 'CONS') //	GERENCIA CONSTRUCCIONES	
            return array_fill_keys(Main::gerencias(), function ($gerencia) {
                return $gerencia->id == 8;
            });
        else if ($gerenciaSAP == 'THUM') //	GERENCIA TALENTO HUMANO	
            return array_fill_keys(Main::gerencias(), function ($gerencia) {
                return $gerencia->id == 5;
            });
        return '';
    }


    public static function contarFechasEnMes($fechainicio, $fechafinal)
    {
        return (($fechafinal->year - $fechainicio->year) * 12) + $fechafinal->month - $fechainicio->month;
    }

    public static function fechaConvertirSAP($fecha)
    {
        $año = substr($fecha, 0, 4);
        $mes = substr($fecha, 4, 2);
        $dia = substr($fecha, 6, 2);
        $fechaMin = Carbon::createFromDate($año, $mes, $dia);
        return $fechaMin;
    }

    public static function convertirFechaNumero($fecha)
    {
        $año = $fecha->year;
        $mes = self::rellenarCerrosIzquierda($fecha->month, 2);
        $dia = self::rellenarCerrosIzquierda($fecha->day, 2);
        return ($año . $mes . $dia);
    }

    public static function rellenarCerrosIzquierda($numero, $longitud)
    {
        if (Str::length($numero) < $longitud) {
            return self::rellenarEspaciosVariable("0", $longitud - Str::length($numero)) . $numero;
        }
        return substr($numero, 0, $longitud);
    }

    public static function rellenarEspaciosVariable($variable, $longitud)
    {
        $var = "";
        do {
            $var = $var . $variable;
        } while (Str::length($var) < $longitud);
        return substr($var, 0, $longitud);
    }
}
