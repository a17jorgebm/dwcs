<?php

require_once ("Animal.php");

class Gato extends Animal{
    public function emitirSonido(){
        echo "Miau, miau";
    }
}