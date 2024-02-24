<?php

require_once ('CalculosCentroEstudios.php');
require_once ('Notas.php');

class NotasDaw extends Notas implements CalculosCentroEstudios{
    public function numeroAprobados() :int{
        $numAprobados=0;
        foreach ($this->notas as $nota){
            if ($nota>=5){$numAprobados++;}
        }
        return $numAprobados;
    }
    public function numeroDeSuspensos() :int{
        $numSuspensos=0;
        foreach ($this->notas as $nota){
            if ($nota>=5){$numSuspensos++;}
        }
        return $numSuspensos;
    }

    public function notaMedia() :int|float{
        return array_sum($this->notas)/count($this->notas);
    }

    public function toString(){
        $listaDeNotas = "";
        foreach ($this->getNotas() as $nota) {
            $listaDeNotas .= "[$nota]";
        }
        return $listaDeNotas;
    }
}