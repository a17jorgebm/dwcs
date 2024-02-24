<?php

trait MostrarCalculos{
    public function saludo(){
        echo "Bienvenido al centro de cálculo";
    }

    public function showCalculusStudyCenter($aprobados,$suspensos,$media){
        echo "Aprobados: {$aprobados}<br>";
        echo "Suspensos: {$suspensos}<br>";
        echo "Media: ".sprintf("%.2f",$media)."<br>";
    }
}