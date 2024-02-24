<?php

trait CalculosCentroEstudios{
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
}
