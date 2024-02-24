<?php

abstract class Notas{
    protected $notas;

    public function __construct($notas){
        $this->notas=$notas;
    }
    public abstract function toString();

    public function getNotas()
    {
        return $this->notas;
    }

    public function setNotas($notas): void
    {
        $this->notas = $notas;
    }


}