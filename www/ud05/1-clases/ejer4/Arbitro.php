<?php

require ("Participante.php");

class Arbitro extends Participante{
    private $anosArbitrados;

    /**
     * @param $anosArbitrados
     */
    public function __construct($nombre,$edad,$anosArbitrados)
    {
        parent::__construct($nombre,$edad);
        $this->anosArbitrados = $anosArbitrados;
    }

    /**
     * @return mixed
     */
    public function getAnosArbitrados()
    {
        return $this->anosArbitrados;
    }

    /**
     * @param mixed $anosArbitrados
     */
    public function setAnosArbitrados($anosArbitrados): void
    {
        $this->anosArbitrados = $anosArbitrados;
    }


}