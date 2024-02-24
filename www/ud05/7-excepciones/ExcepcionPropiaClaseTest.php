<?php

require_once ("ExcepcionPropiaClase.php");
require_once ('ExcepcionPropia.php');

try{
    ExcepcionPropiaClase::testNumber(3);
    echo "Si no es 0 funciona";
}catch (ExcepcionPropia $e){
    echo $e->getMessage();
}

try{
    ExcepcionPropiaClase::testNumber(0);
    echo "Si no es 0 funciona";
}catch (ExcepcionPropia $e){
    echo $e->getMessage();
}