<?php

class Data
{
    public static $calendario = "Calendario gregoriano";

    public static function getData()
    {
        $ano = date('Y'); //Nos da el año actual
        $mes = date('m');
        $dia = date('d');
        return $dia . '/' . $mes . '/' . $ano;
    }

    public static function getCalendar(){
        return self::$calendario;
    }

    public static function getHora(){
        return date('H:i:s');
    }

    public static function getDataHora(){
        $dias_semana = array('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado');
        $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

        $diaTexto=$dias_semana[date('w')];
        $mesTexto=$meses[date('n')-1];
        $dia=date('d');
        $ano=date('Y');

        $texto= "Usamos el calendario: ".self::$calendario."<br>";
        $texto.= "Hoy es {$diaTexto} {$dia} de {$mesTexto} del {$ano} y son las ".self::getHora();
        return $texto;
    }
}