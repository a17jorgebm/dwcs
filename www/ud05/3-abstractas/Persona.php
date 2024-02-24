<?php

abstract class Persona{
    private $id;
    protected $nombre;
    protected $apellidos;
    
    public abstract function __construct($nombre,$apellidos);
    public abstract function getNombre() : String;
    public abstract function getApellidos() : String;

    public abstract function setNombre($nombre);
    public abstract function setApellidos($apellidos);

    public abstract function accion();

}