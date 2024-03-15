<?php

require_once ("Animal.php");

class Perro extends Animal{
    public function emitirSonido(){
        echo "Guau, guau";
    }
}