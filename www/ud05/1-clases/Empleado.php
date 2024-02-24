<?php

class Empleado{
    public $nombre;
    public $salario;
    public static $numEmpleados=0;

    public function __construct($nombre,$salario){
        if ($salario>2000){
            throw new Exception('El salario no debe ser mayor de 2000€');
        }
        $this->nombre=$nombre;
        $this->salario=$salario;
        self::$numEmpleados++;
    }

    public function getSalario(){
        return $this->salario;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }
}
