<?php
namespace Petlost\UsuarioBundle\Lib;

use Petlost\UsuarioBundle\Lib\GeoException;

class Point {
  private $lat;
  private $lon;
  public static $SRID = '4326';

  private function __construct($lon, $lat) {
    $this->lat = $lat;
    $this->lon = $lon;
  }
  
  public function setLongitude($lon) {
    $this->lon = $lon;
  }
  
  public function getLongitude() {
    return $this->lon;
  }

  public function setLatitude($lat) {
    $this->lat = $lat;
  }

  public function getLatitude() {
    return $this->lat;
  }

  public function toGeoJson(){
    $array = array("type" => "Point", "coordinates" => array ($this->lon, $this->lat));
    return \json_encode($array);
  }

  /**
   *
   * @return string 
   */
  public function toWKT() {
    return 'SRID='.self::$SRID.';POINT('.$this->lon.' '.$this->lat.')';
  }

  /**
   *
   * @param string $geojson
   * @return Point 
   */
  public static function fromGeoJson($geojson) 
  {
    $a = json_decode($geojson);
    //check if the geojson string is correct
    if ($a == null or !isset($a->type) or !isset($a->coordinates)){
      throw GeoException::badJsonString();
    }

    if ($a->type != "Point"){
      throw GeoException::badGeoType();
    } else {
      $lon = $a->coordinates[0];
      $lat = $a->coordinates[1];
      return Point::fromLonLat($lon, $lat);
    }

  }
  
  /**
   *
   * @return string
   */
  public function __toString() {
    return $this->lon . ' ' . $this->lat;
  }

  /**
   *
   * @return array
   */
  public function toArray() {
    return array($this->lon, $this->lat);
  }

  public static function fromLonLat($lon, $lat)
  {
    if (($lon > -180.0 && $lon < 180.0) && ($lat > -90.0 && $lat < 90.0))
    {
      return new Point($lon, $lat);
    } else {
      throw GeoException::badCoordinates($lon, $lat);
    }
  }
}

?>
