<?php

interface CalculosCentroEstudios{
    public function numeroAprobados() :int;
    public function numeroDeSuspensos() :int;
    public function notaMedia() :int|float;
}