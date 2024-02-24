<?php

class Alien{
    private static $numberOfAliens;
    private $nombre;

    public function __construct($nombre){
        $this->nombre=$nombre;
        self::$numberOfAliens++;
    }

    public static function getNumberOfAliens(){
        return self::$numberOfAliens;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }


}