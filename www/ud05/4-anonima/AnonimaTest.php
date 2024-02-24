<?php
$base=2;
$altura=3;
$clase=new class($base,$altura){
    private $base;
    private $altura;
    public function __construct($base,$altura){
        $this->base=$base;
        $this->altura=$altura;
    }

    public function area(){
        return ($this->base*$this->altura)/2;
    }

    public function perimetro(){
        return 2*$this->base+2*$this->altura;
    }
};

echo "Area: ".$clase->area()."<br>";
echo "Perímetro: ".$clase->perimetro();