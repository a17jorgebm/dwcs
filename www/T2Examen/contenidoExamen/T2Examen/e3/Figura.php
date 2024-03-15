<?php

namespace e3;

abstract class Figura
{
    // Método abstracto para dibujar la figura
    abstract public function dibujar();
    
    // Método abstracto para agrandar la figura
    abstract public function agrandar($factor);
    
    // Método abstracto para encoger la figura
    abstract public function encoger($factor);
}
