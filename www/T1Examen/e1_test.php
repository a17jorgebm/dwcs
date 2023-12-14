<?php
require('e1.php');

$arrayCualquiera = array(4, 7, 4.5, "hola");
$arrPares=isPar($arrayCualquiera);

for($i=0;$i<sizeof($arrayCualquiera);$i++){
    echo $arrayCualquiera[$i]." => ".($arrPares[$i]?'par':'impar')."<br>";
}