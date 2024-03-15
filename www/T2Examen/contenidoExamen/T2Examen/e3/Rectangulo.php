<?php

namespace e3;

require("Figura.php");

class Rectangulo extends Figura
{
    private $ancho;
    private $alto;

    function __construct($ancho,$alto){
        $this->ancho=$ancho;
        $this->alto=$alto;
    }

    public function dibujar(){
        echo "$this->ancho de ancho y $this->alto de alto";
    }

    public function agrandar($factor){
        $this->ancho*=$factor;
        $this->alto*=$factor;
    }

    public function encoger($factor){
        $this->ancho/=$factor;
        $this->alto/=$factor;
    }
}
