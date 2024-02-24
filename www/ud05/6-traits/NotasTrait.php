<?php
require ('CalculosCentroEstudios.php');
require ('MostrarCalculos.php');

class NotasTrait{
    use CalculosCentroEstudios;
    use MostrarCalculos;

    private $notas;

    public function __construct($notas){
        $this->notas=$notas;
    }
}