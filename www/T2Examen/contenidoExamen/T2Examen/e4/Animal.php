<?php

require_once("Mascota.php");

abstract class Animal implements Mascota{
    private $nombre;
    private $edad;

    public function __construct($nombre,$edad){
        $this->nombre=$nombre;
        $this->edad=$edad;
    }

    abstract public function emitirSonido();

    public function obtenerNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function setEdad($edad){
        $this->edad=$edad;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getEdad(){
        return $this->edad;
    }

}