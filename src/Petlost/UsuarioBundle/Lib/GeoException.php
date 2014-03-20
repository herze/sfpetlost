<?php

namespace Petlost\UsuarioBundle\Lib;

class GeoException extends \RuntimeException
{
    public function __construct($message = null, \Exception $previous = null, $code = 0)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function badJSonString()
    {
      return new GeoException("Bad JSon string");
    }

    public static function badGeoType()
    {
      return new GeoException("Bad geo type");
    }

    public static function badCoordinates($lon, $lat)
    {
      return new GeoException("Bad coordinates: " . $lon . " " . $lat);
    }
}