<?php
namespace Petlost\UsuarioBundle\Util;

class Util
{
    static public function getNormal($cadena)
    {
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        $cadena = strtolower($cadena);
        return utf8_encode($cadena);
    }
    
    static public function dateDiff($start, $end)
    {
        $start_ts = strtotime($start); 
        $end_ts = strtotime($end); 
        $diff = $end_ts - $start_ts; 
        return round($diff / 86400); 
    }
}