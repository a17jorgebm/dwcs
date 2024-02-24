<?php

require ("Participante.php");
class Jugador extends Participante
{
    private $posicion;

    /**
     * @param $posicion
     */
    public function __construct($nombre,$edad,$posicion)
    {
        parent::__construct($nombre,$edad);
        $this->posicion = $posicion;
    }

    /**
     * @return mixed
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * @param mixed $posicion
     */
    public function setPosicion($posicion): void
    {
        $this->posicion = $posicion;
    }


}