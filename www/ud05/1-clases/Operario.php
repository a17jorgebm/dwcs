<?php

require ("Empleado.php");

class Operario extends Empleado{
    private $turno;

    public function __construct($nombre,$salario,$turno){
        parent::__construct($nombre,$salario);
        self::setTurno($turno);
    }

    public function setTurno($turno){
        if ($turno!='diurno' && $turno!='nocturno'){
            throw new Exception('El turno solo puede tomar 2 valores: nocturno o diurno');
        }
        $this->turno=$turno;
    }

    public function getTurno(){
        return $this->turno;
    }
}